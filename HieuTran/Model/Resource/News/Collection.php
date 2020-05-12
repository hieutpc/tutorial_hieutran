<?php

// The collection model is considered a resource model which allow us to filter and fetch a collection table data.

namespace Tutorial\HieuTran\Model\Resource\News;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Tutorial\HieuTran\Model\News',
            'Tutorial\HieuTran\Model\Resource\News'
        );
    }
}