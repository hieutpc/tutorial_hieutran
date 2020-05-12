<?php

namespace Tutorial\HieuTran\Controller\Adminhtml\FAQ;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Tutorial\HieuTran\Model\Resource\FAQ\CollectionFactory;

class AddRow extends Action
{
    private $coreRegistry;

    private $faqFactory;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Tutorial\HieuTran\Model\FAQFactory $faqFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->faqFactory = $faqFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->faqFactory->create();
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();
            if ($rowData->getEntityId()) {
                $this->messageManager->addErrorMessage(__('Row data no longer exist'));
                $this->_redirect('hieutran/faq/rowdata');
                return;
            }
        }
        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit row data') . $rowTitle : __('Add row data');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tutorial_HieuTran::add_row');
    }

    /**
     * Get form action URL.
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        if ($this->hasFormActionUrl()) {
            return $this->getData('form_action_url');
        }

        return $this->getUrl('*/*/save');
    }
}
