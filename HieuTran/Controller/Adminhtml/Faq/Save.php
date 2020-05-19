<?php

namespace Tutorial\HieuTran\Controller\Adminhtml\Faq;

use Magento\MediaStorage\Model\File\Uploader;
use Tutorial\HieuTran\Logger\Logger;
use Tutorial\HieuTran\Model\FaqFactory;
use Tutorial\HieuTran\Model\FaqStoreFactory;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Tutorial\HieuTran\Model\FaqFactory
     */
    public $faqFactory;
    public $faqStoreFactory;

    protected $uploaderFactory;
    protected $log;

    /**
     * @param \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Tutorial\HieuTran\Model\FaqFactory $faqFactory
     * @param FaqStoreFactory $faqStoreFactory
     * @param Logger $log
     */
    public function __construct(
        \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory,
        \Magento\Backend\App\Action\Context $context,
        FaqStoreFactory $faqStoreFactory,
        FaqFactory $faqFactory,
        Logger $log
    ) {
        parent::__construct($context);
        $this->faqFactory = $faqFactory;
        $this->faqStoreFactory = $faqStoreFactory;
        $this->log = $log;
        $this->uploaderFactory = $uploaderFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $obs_title = [];
        $data = $this->getRequest()->getPostValue();
        $this->log->info('data: ' . json_encode($data));

        // $data = $this->getRequest()->getPostValue();
        // $this->log->info('data: ' . json_encode($data));

        if (!$data) {
            $this->_redirect('hieutran/faq/addrow');
            return;
        }

        try {
            $obs_title[0] = 'install';
            $faqData = $this->faqFactory->create();
            $faqStoreData = $this->faqStoreFactory->create();
            // 
            // $this->log->info('faq store data: ' . json_encode($faqStoreData->getData()));

            //   set data for faq_table
            $faqData->setData('title', $data['title']);
            $faqData->setData('description', $data['description']);
            $faqData->setData('status', $data['status']);
            $store_id = $data['store_id'];
            $this->log->info(' store id: ' . json_encode($store_id));

            // edit row
            if (isset($data['id'])) {
                $obs_title[0] = 'edit';
                $faqData->setId($data['id']);

                $collection = $this->_objectManager->create('\Tutorial\HieuTran\Model\ResourceModel\FaqStore\Collection');
                $collection->addFieldToFilter('entity_id', ['eq' => $faqData['entity_id']]);
                
                $row = $collection->getData()[0];
                $this->log->info('store data: ' . json_encode($row));
                $this->log->info('row data: ' . $row['entity_id']);
                $faqStoreData->setId($row['entity_id']);
            }

            $faqData->save();
            $faq_id = $faqData['entity_id'];

            // setdata for tt_hieutran_records
            $faqStoreData->setFAQ_Id($faqData->getData('entity_id'));
            // $faqStoreData->setStore_Id((int)$store_id);
            $faqStoreData->setStore_Id($store_id);
            $faqStoreData->save();

            // event
            $this->_eventManager->dispatch('tutorial_hieutran_modified_db', ['title' => $obs_title, 'id' => $faq_id]);

            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));

            //     $obs_title[0] = 'install';
            //     $rowData = $this->faqFactory->create();
            //     $faqStoreData = $this->faqStoreFactory->create();
            // //   set data for faq_table
            //     $rowData->setData($data);

            //     if (isset($data['id'])) {
            //         $rowData->setEntityId($data['id']);
            //     }

            //     $rowData->save();
            //     $this->messageManager->addSuccess(__('Row data has been successfully saved.'));

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
