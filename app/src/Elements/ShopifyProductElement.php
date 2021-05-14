<?php

namespace Skeletor\Elemental;

use Swordfox\Shopify\Client;
use Swordfox\Shopify\Model\Product;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\FieldType\DBField;
use DNADesign\Elemental\Models\BaseElement;

class ShopifyProductElement extends BaseElement
{
    private static $table_name = 'ShopifyProductElement';

    private static $singular_name = 'Shopify Product Element';

    private static $plural_name = 'Shopify Product Elements';

    private static $description = 'One product with buy button.';

    // Class of icon - image added through cms.scss
    private static $icon = 'shopify-icon';

    private static $db = [
        'DisplayPageFullWidth' => 'Boolean',
    ];

    private static $has_one = [
        'Product' => Product::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Products');

        $fields->addFieldToTab('Root.Main', DropdownField::create('Product', 'Product', Product::get()->map('ID', 'Title'))->setEmptyString('Select product'));
        $fields->addFieldToTab('Root.Main', CheckboxField::create('DisplayPageFullWidth', 'Display Page Full Width?'));
        
        return $fields;
    }

    /**
     * @inheritDoc
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Shopify Product');
    }

    public function URLEncode($url='')
    {
        return urlencode($url);
    }
    
    public function StorefrontAccessToken() {
        return Config::inst()->get(Client::class, 'storefront_access_token');
    }

    public function ShopifyDomain() {
        return Config::inst()->get(Client::class, 'shopify_domain');
    }
    
}
