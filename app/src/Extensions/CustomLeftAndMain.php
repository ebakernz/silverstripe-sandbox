<?php

namespace Skeletor\Extensions;

use SilverStripe\Admin\CMSMenu;
use SilverStripe\Admin\LeftAndMainExtension;

class CustomLeftAndMain extends LeftAndMainExtension
{

    private static $menu_icon = 'app/cms/icons/shopify_glyph.svg';

    public function init()
    {
        // unique identifier for this item. Will have an ID of Menu-$ID
        $id = 'ShopifyProducts';

        // your 'nice' title
        $title = 'Product Admin';
        $iconClass = 'shopify_glyph';

        // the link you want to item to go to
        $link = 'https://emmas-sandbox-store.myshopify.com/admin/products?selectedView=all';

        // priority controls the ordering of the link in the stack. The
        // lower the number, the lower in the list
        $priority = -2;

        // Add your own attributes onto the link. In our case, we want to
        // open the link in a new window (not the original)
        $attributes = [
            'target' => '_blank'
        ];

        CMSMenu::add_link($id, $title, $link, $priority, $attributes, $iconClass);
    }
}