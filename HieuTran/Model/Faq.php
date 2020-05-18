<?php

namespace Tutorial\HieuTran\Model;

use Tutorial\HieuTran\Api\Data\FaqInterface;

class Faq extends \Magento\Framework\Model\AbstractModel implements FaqInterface
{
    const CACHE_TAG = 'tt_hieutran_records';

    protected $_cacheTag = 'tt_hieutran_records';

    protected $_eventPrefix = 'tt_hieutran_records';

    protected function _construct()
    {
        $this->_init('Tutorial\HieuTran\Model\ResourceModel\Faq');
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
        return $this->setData(self::STATUS, $status);
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

    public function getObs()
    {
        return $this->getData(self::OBS_TITLE);
    }

    public function setObs($obs)
    {
        return $this->setData(self::OBS_TITLE, $obs);
    }
}
