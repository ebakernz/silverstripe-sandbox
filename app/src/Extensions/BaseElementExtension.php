<?php

namespace Skeletor\Extensions;

use SilverStripe\ORM\DataExtension;

class BaseElementExtension extends DataExtension
{
    /**
     * @return string
     */
    public function ElementCacheKey()
    {
        $fragments = [
            'elemental_block',
            $this->owner->ID,
            $this->owner->LastEdited
        ];
        return implode('-_-', $fragments);
    }
}
