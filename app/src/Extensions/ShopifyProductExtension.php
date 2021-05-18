<?php

namespace Skeletor\Extensions;

use SilverStripe\Dev\Debug;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\ArrayData;
use SilverStripe\ORM\DataExtension;
use Swordfox\Shopify\Model\Product;
use Swordfox\Shopify\Model\Collection;

class ShopifyProductExtension extends DataExtension {

    public function RelatedProducts() {
        if($this->owner->Collections()->exists()) {
            $collectionsIDs = implode(', ', $this->owner->Collections()->column('ID'));
            $related = Product::get()->filter(['Collections.ID'=> [$collectionsIDs]])->exclude('ID', $this->owner->ID);
            if($related) return $related->limit(3);
        }
    }

    public function ProductsWithTag() {
        if($this->owner->Tags()->exists()) {
            $tagIDs = implode(', ', $this->owner->Tags()->column('ID'));
            $products = Product::get()->filter(['Tags.ID'=> [$tagIDs]])->exclude('ID', $this->owner->ID);
            if($products) return $products;
        }
    }

}