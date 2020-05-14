<?php
namespace Tutorial\HieuTran\Model\ResourceModel\Faq;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    // protected $_eventPrefix = 'tutorial_hieutran_faq_collection';
    // protected $_eventObject = 'faq_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Tutorial\HieuTran\Model\Faq', 'Tutorial\HieuTran\Model\ResourceModel\Faq');
    }

}
