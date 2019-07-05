<?php

namespace Interpolation\Service\Fee\Interfaces;

use Interpolation\Service\Fee\Exceptions\FeeException;

/**
 * Interface FeeThresholdInterface
 * @package Interpolation\Service\Fee\Interfaces
 */
interface FeeThresholdInterface
{
    /**
     * @return int
     */
    public function getMax(): int;

    /**
     * @return int
     */
    public function getMin(): int;
}
