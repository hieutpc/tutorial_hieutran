<?php

namespace Tutorial\HieuTran\Model\ResourceModel\FaqStore;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(
            'Tutorial\HieuTran\Model\FaqStore',
            'Tutorial\HieuTran\Model\ResourceModel\FaqStore'
        );
    }

}

// Namespace\Module\Model\ResourceModel\Modelname\Relation\Store