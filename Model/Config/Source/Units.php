<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace TestTask\WeatherWidget\Model\Config\Source;

class Units implements \Magento\Framework\Option\ArrayInterface
{

    public function toOptionArray()
    {
        return [
            ['value' => 'standard', 'label' => __('Standard')],
            ['value' => 'metric', 'label' => __('Metric')],
            ['value' => 'imperial', 'label' => __('Imperial')]
        ];
    }

    public function toArray()
    {
        return ['standard' => __('Standard'), 'metric' => __('Metric'), 'imperial' => __('Imperial')];
    }
}
