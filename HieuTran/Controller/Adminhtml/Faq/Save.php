<?php

namespace Tutorial\HieuTran\Controller\Adminhtml\Faq;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Tutorial\HieuTran\Model\FaqFactory
     */
    var $faqFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Tutorial\HieuTran\Model\FaqFactory $faqFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Tutorial\HieuTran\Model\FaqFactory $faqFactory
    ) {
        parent::__construct($context);
        $this->faqFactory = $faqFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('hieutran/faq/addrow');
            return;
        }
        try {
            $rowData = $this->faqFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('hieutran/faq/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tutorial_Faq::save');
    }
}
