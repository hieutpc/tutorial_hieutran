<?php

namespace Tutorial\HieuTran\Controller\Adminhtml\Faq;

use Magento\Framework\Controller\ResultFactory;
use Tutorial\HieuTran\Logger\Logger;

class AddRow extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;
    private $log;

    /**
     * @var \Tutorial\HieuTran\Model\FaqFactory
     */
    private $faqFactory;
    private $_faqStoreFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry,
     * @param \Tutorial\HieuTran\Model\FaqFactory $faqFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Tutorial\HieuTran\Model\FaqFactory $faqFactory,
        \Tutorial\HieuTran\Model\FaqStoreFactory $faqStoreFactory,
        Logger $log

    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->faqFactory = $faqFactory;
        $this->log = $log;
        $this->_faqStoreFactory = $faqStoreFactory;
    }

    /**
     * Mapped Faq List page.
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        // $rowId = (int) $this->getRequest()->getParam('id');
        $rowId = (int) $this->getRequest()->getParam('id');
        
        $rowData = $this->faqFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();
            // if (!$rowData->getEntityId()) {
            if (!$rowData->getId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('hieutran/faq/rowdata');
                return;
            }
        }

        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Row Data ') . $rowTitle : __('Add Row Data');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tutorial_HieuTran::add_row');
    }
}
