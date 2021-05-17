<?php

namespace Skeletor\Elemental;

use SilverStripe\Dev\Debug;
use Swordfox\Shopify\Client;
use Swordfox\Shopify\Model\Product;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use Swordfox\Shopify\Model\Collection;
use DNADesign\Elemental\Models\BaseElement;

class ShopifyCollectionElement extends BaseElement
{
    private static $table_name = 'ShopifyCollectionElement';

    private static $singular_name = 'Shopify Collection Element';

    private static $plural_name = 'Shopify Collection Elements';

    private static $description = 'Show all products from a collection.';

    // Class of icon - image added through cms.scss
    private static $icon = 'shopify-icon';

    private static $db = [
        'DisplayPageFullWidth' => 'Boolean',
    ];

    private static $has_one = [
        'Collection' => Collection::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('CollectionID');

        $fields->addFieldToTab('Root.Main', DropdownField::create('CollectionID', 'Collection', Collection::get()->map('ID', 'Title'))->setEmptyString('Select collection'));
        $fields->addFieldToTab('Root.Main', CheckboxField::create('DisplayPageFullWidth', 'Display Page Full Width?'));
        
        return $fields;
    }

    /**
     * @inheritDoc
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Shopify Collection');
    }

    public function URLEncode($url='')
    {
        return urlencode($url);
    }

    public function CollectionProducts() {
        $collection = Collection::get()->byID($this->CollectionID);
        if($products = $collection->Products()) return $products;
    }
    
    public function StorefrontAccessToken() {
        return Config::inst()->get(Client::class, 'storefront_access_token');
    }

    public function ShopifyDomain() {
        return Config::inst()->get(Client::class, 'shopify_domain');
    }
    
}
