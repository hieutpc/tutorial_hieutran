<?php

namespace Tutorial\HieuTran\Api\Data;

interface FaqStoreInterface
{
    const ID = 'id';
    const FAQ_ID = 'entity_id';
    const STORE_ID = 'store_id';

    public function getId();
    public function setId($id);

    public function getFAQ_Id();
    public function setFAQ_Id($fId);

    public function getStore_Id();
    public function setStore_Id($sId);

}
