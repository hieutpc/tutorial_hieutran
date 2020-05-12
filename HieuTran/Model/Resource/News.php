<?php
// Resource Model


namespace Tutorial\HieuTran\Model\Resource;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class News extends AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('tutorial_hieutran_post', 'id');
    }
}