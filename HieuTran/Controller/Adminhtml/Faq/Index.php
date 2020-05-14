<?php

namespace Tutorial\HieuTran\Controller\Adminhtml\Faq;

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Mapped eBay Order List page.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Tutorial_HieuTran::faq_list');
        $resultPage->getConfig()->getTitle()->prepend(__('Faq List'));
        return $resultPage;
    }

    /**
     * Check Order Import Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tutorial_HieuTran::faq_list');
    }
}

// class Index extends \Magento\Backend\App\Action
// {
//     // old Index class
//     protected $resultPageFactory = false;

//     public function __construct(
//         \Magento\Backend\App\Action\Context $context,
//         \Magento\Framework\View\Result\PageFactory $resultPageFactory
//     ) {
//         parent::__construct($context);
//         $this->resultPageFactory = $resultPageFactory;
//     }

//     public function execute()
//     {
//         /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
//         $resultPage = $this->resultPageFactory->create();
//         $resultPage->getConfig()->getTitle()->prepend((__('Faqs')));

//         return $resultPage;
//     }

// }