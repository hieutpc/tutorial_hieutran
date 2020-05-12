<?php
// This file will run first when you call http://localhost/magento2/hieutran or http://localhost/magento2/hieutran/index/index
// We will create a controller to call the layout file .xml
// We have to declare the PageFactory and create it in execute method to render view.

namespace Tutorial\HieuTran\Controller\Index;

use Magento\Framework\App\Action\Action;

// Dependency Injection

class Index extends Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }

    // /**
    //  * @var \Tutorial\HieuTran\Model\NewsFactory
    //  */
    // protected $_modelNewsFactory;

    // /**
    //  * @param Context $context
    //  * @param NewsFactory $modelNewsFactory
    //  */
    // public function __construct(
    //     Context $context,
    //     NewsFactory $modelNewsFactory
    // ) {
    //     parent::__construct($context);
    //     $this->_modelNewsFactory = $modelNewsFactory;
    // }

    // public function execute()
    // {
    //     /**
    //      * When Magento get your model, it will generate a Factory class
    //      * for your model at var/generaton folder and we can get your
    //      * model by this way
    //      */
    //     $newsModel = $this->_modelNewsFactory->create();

    //     // Load the item with ID is 1
    //     $item = $newsModel->load(1);
    //     var_dump($item->getData());

    //     // Get news collection
    //     $newsCollection = $newsModel->getCollection();
    //     // Load all data of collection
    //     var_dump($newsCollection->getData());
    // }

}