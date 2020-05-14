<?php
namespace Tutorial\HieuTran\Model\ResourceModel;

/**
 * HieuTran Faq mysql resource.
 */
class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $_date;

    /**
     * Construct.
     *
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\DateTime       $date
     * @param string|null                                       $resourcePrefix
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        $resourcePrefix = null
    ) {
        parent::__construct($context, $resourcePrefix);
        $this->_date = $date;
    }

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('tt_hieutran_records', 'entity_id');
    }
}



// class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
// {

//     public function __construct(
//         \Magento\Framework\Model\ResourceModel\Db\Context $context
//     ) {
//         parent::__construct($context);
//     }

//     protected function _construct()
//     {
//         $this->_init('tutorial_hieutran_post', 'id');
//     }

// }

// _init() function to define the table name and primary key for that table