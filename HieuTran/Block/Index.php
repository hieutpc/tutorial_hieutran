<?php

namespace Tutorial\HieuTran\Block;

use Magento\Framework\View\Element\Template\Context;
use Tutorial\HieuTran\Model\FaqFactory;

/**
 * Test List block
 */

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_faqFactory;

    public function __construct(
        Context $context,
        FaqFactory $faqFactory
    ) {
        $this->_faqFactory = $faqFactory;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(
            $this->_scopeConfig->getValue(
                'tutorial/hieutran_general/general/display_title',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            )
        );
        $faqPerTab = (int) $this->_scopeConfig->getValue(
            'tutorial/hieutran_general/general/display_number_faq',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        // $this->pageConfig->getTitle()->set(__('TABLE '));

        if ($this->getFaqCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'tutorial.faq.pager'
                // )->setAvailableLimit([5=>5,10=>10,15=>15])->setShowPerPage(true)->setCollection(
            )->setAvailableLimit([$faqPerTab => $faqPerTab])->setShowPerPage(true)->setCollection(
                $this->getFaqCollection()
            );
            $this->setChild('pager', $pager);
            $this->getFaqCollection()->load();
        }
        return parent::_prepareLayout();
    }

    public function getFaqCollection()
    {
        $faqPerTab = (int) $this->_scopeConfig->getValue('tutorial/hieutran_general/general/display_number_faq', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest()->getParam('limit') : $faqPerTab;

        $faq = $this->_faqFactory->create();
        $collection = $faq->getCollection();
        $collection->addFieldToFilter('Status', '1'); // if you want to use filter
        //$collection->setOrder('test_id','ASC'); // if you want to set collection order
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);

        return $collection;
    }

    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
