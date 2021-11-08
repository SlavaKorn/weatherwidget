<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

namespace TestTask\WeatherWidget\Data;

use Magento\Customer\CustomerData\SectionSourceInterface;

/**
 * Weather section
 */
class Weather implements SectionSourceInterface
{
    /**
     * @var \Magento\Framework\Session\Generic
     */
    protected $reviewSession;

    /**
     * @param \Magento\Framework\Session\Generic $reviewSession
     */
    public function __construct(\Magento\Framework\Session\Generic $reviewSession)
    {
        $this->reviewSession = $reviewSession;
    }

    /**
     * {@inheritdoc}
     */
    public function getSectionData()
    {
        return (array)$this->reviewSession->getFormData(true) + ['nickname' => '', 'title' => '', 'detail' => ''];
    }
}
