<?php
namespace Tutorial\HieuTran\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_faqFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Tutorial\HieuTran\Model\FAQFactory $faqFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_faqFactory = $faqFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $faq = $this->_faqFactory->create();
        $collection = $faq->getCollection();
        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}
