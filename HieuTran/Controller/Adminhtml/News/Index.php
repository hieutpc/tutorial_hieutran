<?php
// This is the index action
namespace Tutorial\HieuTran\Controller\Adminhtml\News;

use Tutorial\HieuTran\Controller\Adminhtml\News;

class Index extends News
{
    /**
     * @return void
     */
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Tutorial_HieuTran::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('HieuTran News'));

        return $resultPage;
    }
}