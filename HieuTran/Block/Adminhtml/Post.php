<?php
namespace Tutorial\HieuTran\Block\Adminhtml;

class Post extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_post';  // the path to the Grid block inside the Block folder
        $this->_blockGroup = 'Tutorial_HieuTran'; // the name of our module with format <VendorName_ModuleName>
        $this->_headerText = __('Posts');   // the Grid page title
        $this->_addButtonLabel = __('Create New Post'); // the label of the Add new button.
        parent::_construct();
    }
}
