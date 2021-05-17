<?php

namespace Skeletor\Extensions;

use SilverStripe\Dev\Debug;
use SilverStripe\ORM\DataExtension;
use Swordfox\Shopify\Model\Product;

class ShopifyProductExtension extends DataExtension {

    public function RelatedProducts() {
        if($this->owner->Collections()->exists()) {
            $collectionsIDs = implode(', ', $this->owner->Collections()->column('ID'));
            $related = Product::get()->filter(['Collections.ID'=> [$collectionsIDs]])->exclude('ID', $this->owner->ID);
            if($related) return $related->limit(4);
        }
    }

}