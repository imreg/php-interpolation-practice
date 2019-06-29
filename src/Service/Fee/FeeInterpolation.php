<?php
declare(strict_types=1);

namespace Interpolation\Service\Fee;

use Interpolation\Service\Fee\Interfaces\FeeInterpolationInterface;
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
    public function interpolation($amount, FeeThresholdInterface $feeThreshold): float
    {
        return (
                ($amount - $feeThreshold->getMinAmountThreshold())
                *
                ($feeThreshold->getMaxFee() - $feeThreshold->getMinFee())
                /
                ($feeThreshold->getMaxAmountThreshold() - $feeThreshold->getMinAmountThreshold())
            ) + $feeThreshold->getMinFee();
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
