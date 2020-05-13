<?php

namespace Tutorial\HieuTran\Api\Data;

interface FAQInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */

    const ID = 'id';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const IMAGE = 'image';
    const STATUS = 'status';
    const CREATE_TIME = 'create_time';
    const UPDATE_TIME = 'update_time';

    public function getId();
    public function setId($id);

    public function getTitle();
    public function setTitle($title);

    public function getDes();
    public function setDes($des);

    public function getImage();
    public function setImage($image);

    public function getStatus();
    public function setStatus($status);

    public function getCreateTime();
    public function setCreateTime($time);

    public function getUpdateTime();
    public function setUpdateTime($time);

    // /**
    //  * Get EntityId.
    //  *
    //  * @return int
    //  */
    // public function getId();

    // /**
    //  * Set EntityId.
    //  */
    // public function setId($id);

    // /**
    //  * Get Title.
    //  *
    //  * @return varchar
    //  */
    // public function getTitle();

    // /**
    //  * Set Title.
    //  */
    // public function setTitle($title);

    // /**
    //  * Get Description.
    //  *
    //  * @return varchar
    //  */
    // public function getDes();

    // /**
    //  * Set Description.
    //  */
    // public function setDes($des);

    // /**
    //  * Get Image.
    //  *
    //  * @return varchar
    //  */
    // public function getImage();

    // /**
    //  * Set Image.
    //  */
    // public function setImage($image);

    // /**
    //  * Get Status.
    //  *
    //  * @return int
    //  */
    // public function getStatus();

    // /**
    //  * Set Status.
    //  */
    // public function setStatus($status);

    // /**
    //  * Get CreatedAt.
    //  *
    //  * @return varchar
    //  */
    // public function getCreateTime();

    // /**
    //  * Set CreatedAt.
    //  */
    // public function setCreateTime($time);

    // /**
    //  * Get UpdateTime.
    //  *
    //  * @return varchar
    //  */
    // public function getUpdateTime();

    // /**
    //  * Set UpdateTime.
    //  */
    // public function setUpdateTime($time);
}
