<?php

namespace Tutorial\HieuTran\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Tutorial\HieuTran\Model\ResourceModel\Faq\CollectionFactory;

class MassDisable extends \Magento\Backend\App\Action
{
    /**
     * Massactions filter.​_
     * @var Filter
     */
    protected $_filter;

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @param Context           $context
     * @param Filter            $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {

        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $recordDis = 0;

        foreach ($collection->getItems() as $record) {
            $record->setId($record->getId());
            $record->setStatus('0');
            $record->save();
            $recordDis++;
            // $this->messageManager->addSuccess(__('Record getId %1: ', $record->getId()));
            // $this->messageManager->addSuccess(__('Record %1: ', $record));
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been disabled.', $recordDis));

        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }

    /**
     * Check Category Map recode delete Permission.
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tutorial_HieuTran::row_data_disable');
    }
}