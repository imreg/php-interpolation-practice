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
     * @throws FeeException
     */
    public function getMinFee(): int;

    /**
     * @return int
     * @throws FeeException
     */
    public function getMaxFee(): int;

    /**
     * @return int
     */
    public function getMaxAmountThreshold(): int;

    /**
     * @return int
     */
    public function getMinAmountThreshold(): int;
}
