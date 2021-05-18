<?php

namespace Skeletor\Extensions;

use SilverStripe\ORM\DataObject;
use SilverStripe\Control\Director;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\HTTPRequest;
use Swordfox\Shopify\Model\ProductTag;

class ShopifyPageExtension extends DataExtension
{

    // private static $allowed_actions = [
    //     'tag'
    // ];

    // public function tag(HTTPRequest $request)
    // {
    //     $start = ($request->getVar('start') ? $request->getVar('start') : 0);
    //     $sort = ($request->getVar('sort') ? $request->getVar('sort') : null);

    //     if (!$urlSegment = $request->param('ID')) {
    //         $this->httpError(404);
    //     }

    //     /** @var Tag $Tag */
    //     if (!$Tag = DataObject::get_one(ProductTag::class, ['URLSegment' => $urlSegment])) {
    //         $this->httpError(404);
    //     }

    //     $this->SelectedTag = null;

    //     if ($tagSegment = $request->param('OtherID') and $tag = DataObject::get_one(ProductTag::class, ['URLSegment' => $tagSegment])) {
    //         $this->SelectedTag = $tag;

    //         $this->MetaTitle = $tag->Title.' - '.$Collection->Title.' - '.$this->Title;

    //         $Products = $Collection->Products()
    //             ->innerJoin('ShopifyProduct_Tags', 'ShopifyProduct.ID = ShopifyProduct_Tags.ShopifyProductID AND ShopifyProduct_Tags.ShopifyProductTagID = '.$tag->ID);
    //     } else {
    //         $this->MetaTitle = $Tag->Title.' - '.$this->Title;

    //         $Products = $Tag->Products();
    //     }

    //     if ($sort) {
    //         switch ($sort) {
    //             case 'title':
    //                 $sortvar = 'Title';
    //                 break;

    //             case 'titledesc':
    //                 $sortvar = 'Title DESC';
    //                 break;

    //             case 'created':
    //                 $sortvar = 'Created';
    //                 break;

    //             default:
    //                 $sortvar = 'Created DESC';
    //                 break;
    //         }

    //         $Products = $Products->sort($sortvar);
    //     }

    //     if ($this->hide_if_no_image) {
    //         $Products = $Products->where('OriginalSrc IS NOT NULL');
    //     }

    //     if ($this->hide_out_of_stock) {
    //         $Products = $Products->innerJoin('ShopifyProductVariant', 'ShopifyProductVariant.ProductID = ShopifyProduct.ID AND Inventory > 0');
    //     }

    //     $Collection->ItemsLeft = $Products->count() - ($start + $this->owner->PageLimit);

    //     $Collection->ProductsPaginated = PaginatedList::create(
    //         $Products,
    //         $this->getRequest()
    //     )->setPageLength($this->owner->PageLimit);

    //     $this->extend('updateCollectionView', $Collection);

    //     if (Director::is_ajax() or $this->request->getVar('Ajax')=='1') {
    //         return $Collection->customise(array('Ajax'=>1, 'MobileOrTablet'=>$this->owner->MobileOrTablet, 'start'=>$start, 'SelectedTag'=>$this->SelectedTag))->renderwith('Swordfox/Shopify/Includes/CollectionInner');
    //     } else {
    //         return $this->render($Collection);
    //     }
    // }
}