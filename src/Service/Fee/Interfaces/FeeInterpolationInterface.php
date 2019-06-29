<?php

namespace Interpolation\Service\Fee\Interfaces;

use Interpolation\Service\Fee\Exceptions\FeeException;

interface FeeInterpolationInterface
{
    /**
     * @param $amount
     * @param FeeThresholdInterface $feeThreshold
     * @return float
     * @throws FeeException
     */
    public function interpolation($amount, FeeThresholdInterface $feeThreshold): float;

    /**
     * @param float $value
     * @param int $multiple
     * @return float
     */
    public function roundUp(float $value, int $multiple): float;
}
