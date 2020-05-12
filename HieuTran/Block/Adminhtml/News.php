<?php
// This is the block file of grid container

// The Grid block will extend \Magento\Backend\Block\Widget\Grid\Container and define some variable in the _construct() method.

namespace Tutorial\HieuTran\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class News extends Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_news';      // the path to the Grid block inside the Block folder
        $this->_blockGroup = 'Tutorial_HieuTran';   // the name of our module with format VendorName_ModuleName
        $this->_headerText = __('Manage News');     // the Grid page title
        $this->_addButtonLabel = __('Add News');    // the label of the Add new button.
        parent::_construct();
    }
}
