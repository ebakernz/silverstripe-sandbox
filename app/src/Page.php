<?php

use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Control\Director;
use SilverStripe\Core\ClassInfo;
use SilverStripe\Core\Config\Config;
use SilverStripe\ElementalBannerBlock\Block\BannerBlock;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use SilverStripe\SiteConfig\SiteConfig;
use Skeletor\Extensions\SiteConfigExtension;

class Page extends SiteTree
{
    private static $table_name = 'Page';

    private static $db = [
        'MetaTitle' => 'Text',
        'MetaKeywords' => 'Text',
        'ShowDebugTools' => 'Boolean(true)'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        if ($fields->fieldByName('Root.Main.Metadata.MetaDescription')) {
            $fields->insertBefore(
                'MetaDescription',
                TextField::create('MetaTitle', 'Meta Title')
                    ->setRightTitle('Customised title for use in search engines. Defaults to the page title.'),
            );
            $fields->insertBefore('MetaDescription', TextareaField::create('MetaKeywords', 'Meta Keywords'));
        }

        return $fields;
    }

    /**
     * Add additional page settings fields
     * @return FieldList
     */
    public function getSettingsFields()
    {
        $fields = parent::getSettingsFields();
        $fields->addFieldToTab('Root.Settings',
            CheckBoxField::create('ShowDebugTools', 'Show CMS debug controls on front end?')->setDescription('This is can can also be disabled globally in site settings.'));
        return $fields;
    }

    /**
     * Get this object's controller
     *
     * @return string|false
     */
    public function MyController()
    {
        if ($controller_name = Config::inst()->get(static::class, 'controller_name')) {
            $controller = $controller_name;
        } else {
            $class = ClassInfo::ShortName($this->getClassName());
            $controller = sprintf('%sController', $class);
        }
        if (class_exists($controller)) {
            return new $controller();
        }
        return false;
    }

    /**
     * Get an inherited 'thing'
     * This multi-purpose method allows us to iterate up the site tree to get a property or method.
     * Usage: $Inherited('BannerImage') or $Inherited('Colour'), etc
     *
     * @param String $property
     * @return Array
     **/
    public function Inherited($property = null)
    {
        $page = $this;

        // Identify whether the requested property is a property or a method()
        $is_method = $page->hasMethod($property);

        while ($page->ParentID > 0) {
            if ($is_method) {
                if ($page->$property() && $page->$property()->exists()) {
                    break;
                }
            } elseif ($page->$property !== null) {
                break;
            }
            $page = $page->Parent();
        }

        if ($is_method) {
            $property = $page->$property();
        } else {
            $property = $page->$property;
        }

        return $property;
    }

    /**
     * Get a page type by ClassName
     * Returns the *first* page instance of this ClassName
     *
     * @param string $class_name
     * @return DataObject|false
     **/
    public function PageType($class_name)
    {
        if ($page = SiteTree::get()->Filter('ClassName', $class_name)->first()) {
            return $page;
        }
        return false;
    }


    /**
     * Get a page link by ClassName
     *
     * @param string $class_name
     * @return string | false
     */
    public function PageLink($class_name)
    {
        if ($page = $this->PageType($class_name)) {
            return $page->Link();
        }
        return false;
    }


    /**
     * Get logo set in site config if it exists
     *
     * @return Image|false
     */
    public function Logo()
    {
        return $this->getLogoFromSiteConfig(SiteConfig::current_site_config());
    }

    /**
     * Get logo set in site config if it exists
     *
     * @param $site_config
     * @return Image|false
     */
    public function getLogoFromSiteConfig($site_config)
    {
        return $site_config->Logo() ?: false;
    }


    /**
     * Return image to use in og:image meta tag
     * Default to site logo if it exists, otherwise return false.
     *
     * Override this as needed in page classes to dish up a relevant image.
     * For instance, a news item may have a featured image, so on
     * that page class this function could return the featured image.
     *
     * @return Image|false
     */
    public function OgImage()
    {
        return $this->Logo();
    }

    /**
     * @inheritDoc
     */
    public function MetaComponents()
    {
        $tags = parent::MetaComponents();

        $tags['viewport'] = [
            'attributes' => [
                'name' => 'viewport',
                'content' => 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no',
            ],
        ];

        if ($this->MetaKeywords) {
            $tags['keywords'] = [
                'attributes' => [
                    'name' => 'keywords',
                    'content' => $this->MetaKeywords,
                ],
            ];
        }
        if ($this->NoIndexMetaTag()) {
            $tags['robotsNoIndex'] = [
                'attributes' => [
                    'name' => 'robots',
                    'content' => 'noindex, nofollow',
                ],
            ];
        }
        if ($this->MetaDescription) {
            $tags['ogDescription'] = [
                'attributes' => [
                    'property' => 'og:description',
                    'content' => $this->MetaDescription,
                ],
            ];
        }

        return $tags;
    }


    /**
     * Check which domains are excluded
     *
     * @return bool
     */
    public function NoIndexMetaTag()
    {
        foreach (Config::inst()->get(SiteConfigExtension::class, 'noindex_domains') as $domain) {
            if (strpos(Director::protocolAndHost(), $domain) !== false) {
                return true;
            }
        }
        return false;
    }
}
