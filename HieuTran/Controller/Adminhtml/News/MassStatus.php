<?php
 
namespace Tutorial\HieuTran\Controller\Adminhtml\News;
 
use Tutorial\HieuTran\Controller\Adminhtml\News;
use Tutorial\HieuTran\Model\NewsFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
 
class MassStatus extends News
{
    protected $resNewFactory;
    public function __construct(
        Context $context, Registry $coreRegistry,
        PageFactory $resultPageFactory,
        NewsFactory $newsFactory,
        \Tutorial\HieuTran\Model\Resource\NewsFactory $resNewFactory
    )
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $newsFactory);
        $this->resNewFactory = $resNewFactory;
    }
 
    /**
     * @return void
     */
    public function execute()
    {
        // Get IDs of the selected facilities
        $newIds = $this->getRequest()->getParam('news',array());
        $status = $this->getRequest()->getParam('status',0);
        if(count($newIds))
        {
            foreach ($newIds as $newId) {
                try {
                    $newModel = $this->newsFactory->create();
                    $resNew = $this->resNewFactory->create();
                    $newModel->setStatus($status)->setId($newId);
                    $resNew->save($newModel);
                } catch (\Exception $e) {
                    $this->messageManager->addError($e->getMessage());
                }
            }
        }
        if (count($newIds)) {
            $this->messageManager->addSuccess(
                __('A total of %1 record(s) were updated.', count($newIds))
            );
        }
 
        $this->_redirect('*/*/index');
    }
}