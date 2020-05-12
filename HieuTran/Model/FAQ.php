<?php

namespace Tutorial\HieuTran\Model;

use Tutorial\HieuTran\Api\Data\FAQInterface;

class FAQ extends \Magento\Framework\Model\AbstractModel implements FAQInterface
{
    const CACHE_TAG = 'tutorial_hieutran_post';

    protected $_cacheTag = 'tutorial_hieutran_post';

    protected $_eventPrefix = 'tutorial_hieutran_post';

    protected function _construct()
    {
        $this->_init('Tutorial\HieuTran\Model\Resource\FAQ');
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function getDes()
    {
        return $this->getData(self::DESCRIPTION);
    }

    public function setDes($des)
    {
        return $this->setData(self::DESCRIPTION, $des);
    }

    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    public function getStatus()
    {
        return $this->getData();
    }
    public function setStatus($status)
    {
        return $this->setDate(self::STATUS, $status);
    }

    public function getCreateTime()
    {
        return $this->getData(self::CREATE_TIME);
    }
    public function setCreateTime($time)
    {
        return $this->setData(self::CREATE_TIME, $time);
    }

    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    public function setUpdateTime($time)
    {
        return $this->setData(self::UPDATE_TIME, $time);
    }
}
