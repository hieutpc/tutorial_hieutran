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
}





// // old but works
// class Faq extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
// {
//     const CACHE_TAG = 'tutorial_hieutran_faq';

//     protected $_cacheTag = 'tutorial_hieutran_faq';

//     protected $_eventPrefix = 'tutorial_hieutran_faq';

//     protected function _construct()
//     {
//         $this->_init('Tutorial\HieuTran\Model\ResourceModel\Faq');
//     }

//     public function getIdentities()
//     {
//         return [self::CACHE_TAG . '_' . $this->getId()];
//     }

//     public function getDefaultValues()
//     {
//         $values = [];

//         return $values;
//     }
// }


// $_eventPrefix    - a prefix for events to be triggered
// $_eventObject    - a object name when access in event
// $_cacheTag       - a unique identifier for use within caching