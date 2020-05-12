<?php
// This is the new action

namespace Tutorial\HieuTran\Controller\Adminhtml\News;

use Tutorial\HieuTran\Controller\Adminhtml\News;

class NewAction extends News
{
    /**
     * Create new news action
     *
     * @return void
     */
    public function execute()
    {
        $this->_forward('edit');
    }
}