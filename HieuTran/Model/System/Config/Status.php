<?php
// This file is used to get News status options

namespace Tutorial\HieuTran\Model\System\Config;

use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface
{
    const ENABLED = 1;
    const DISABLED = 0;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            self::ENABLED => __('Enabled'),
            self::DISABLED => __('Disabled'),
        ];

        return $options;
    }
}
