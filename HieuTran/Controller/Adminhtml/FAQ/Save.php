<?php
namespace Tutorial\HieuTran\Controller\Adminhtml\FAQ;

use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Tutorial\HieuTran\Model\Resource\FAQ\CollectionFactory;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Tutorial\HieuTran\Model\FAQFactory
     */
    public $faqFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Tutorial\HieuTran\Model\FAQFactory $faqFactory
     */
    public function __construct(
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        \Magento\Backend\App\Action\Context $context,
        \Tutorial\HieuTran\Model\FAQFactory $faqFactory
    ) {
        $this->_fileUploaderFactory = $fileUploaderFactory;
        $this->faqFactory = $faqFactory;
        parent::__construct($context);

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

        $uploader = $this->_fileUploaderFactory->create(['fileId' => 'image']);

        $uploader->setAllowedExtensions(['jpg', 'jpeg', 'png']);

        $uploader->setAllowRenameFiles(false);

        $uploader->setFilesDispersion(false);

        $path = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)

            ->getAbsolutePath('images/');

        $uploader->save($path);

        $this->_redirect('hieutran/faq/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tutorial_FAQ::save');
    }
}
