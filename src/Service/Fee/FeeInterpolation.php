<?php
declare(strict_types=1);

namespace Interpolation\Service\Fee;

use Interpolation\Service\Fee\Interfaces\FeeInterpolationInterface;
use Interpolation\Service\Fee\Interfaces\FeesInterface;
use Interpolation\Service\Fee\Interfaces\FeeThresholdInterface;

/**
 * Class FeeInterpolation
 * @package Interpolation\Service\Fee
 */
class FeeInterpolation implements FeeInterpolationInterface
{

    /**
     * Default multiple
     */
    const DEFAULT_MULTIPLE = 5;

    /**
     * @inheritDoc
     */
    public function interpolation($amount, FeesInterface $fees, FeeThresholdInterface $feeThreshold): float
    {
        return (
                ($amount - $feeThreshold->getMin())
                *
                ($fees->getMax() - $fees->getMin())
                /
                ($feeThreshold->getMax() - $feeThreshold->getMin())
            ) + $fees->getMin();
    }

    /**
     * @inheritDoc
     */
    public function roundUp(float $value, int $multiple = self::DEFAULT_MULTIPLE): float
    {
        return (ceil($value) % $multiple === 0) ?
            ceil($value) :
            round(($value + $multiple / 2) / $multiple) * $multiple;
    }
}
