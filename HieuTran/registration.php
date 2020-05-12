<?php
// This file is to make Magento aware of our Blog module

\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Tutorial_HieuTran',
    __DIR__
);