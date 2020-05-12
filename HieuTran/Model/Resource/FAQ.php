<?php

// Resource Model

namespace Tutorial\HieuTran\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class FAQ extends AbstractDB
{
    /**
     * Define main table
     */
    protected $_idFieldName = 'id';

    protected $_date;

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        $resultPrefix = null
    ) {
        parent::__construct($context);
        $this->_date = $date;
    }

    protected function _construct()
    {
        $this->_init('tutorial_hieutran_post', 'id');
    }
}
