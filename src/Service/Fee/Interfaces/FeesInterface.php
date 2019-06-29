<?php

namespace Interpolation\Service\Fee\Interfaces;

interface FeesInterface
{
    /**
     * @param int $term
     * @param float $amount
     * @return FeeThresholdInterface
     */
    public function getFeesByAmount(int $term, float $amount): FeeThresholdInterface;
}
