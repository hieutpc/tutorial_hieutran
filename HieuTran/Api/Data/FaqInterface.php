<?php

namespace Tutorial\HieuTran\Api\Data;

interface FaqInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */

    const ID = 'entity_id';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const IMAGE = 'image';
    const STATUS = 'status';
    // Bug1
    const CREATE_TIME = 'created_at';
    const UPDATE_TIME = 'updated_at';
    const OBS_TITLE = 'obs_title';

    public function getId();
    public function setId($entity_id);

    public function getObs();
    public function setObs($Obs);

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

}