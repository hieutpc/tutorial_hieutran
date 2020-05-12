<?php
// This is the grid action which is used for loading grid by ajax
namespace Tutorial\HieuTran\Controller\Adminhtml\News;

use Tutorial\HieuTran\Controller\Adminhtml\News;

class Grid extends News
{
    /**
     * @return void
     */
    public function execute()
    {
        echo "Hello. I'm in Grid.php";
        return $this->_resultPageFactory->create();
    }
}

