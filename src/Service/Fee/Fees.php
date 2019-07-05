<?php
declare(strict_types=1);

namespace Interpolation\Service\Fee;

use Interpolation\Service\Fee\Interfaces\FeeDatasetInterface;
use Interpolation\Service\Fee\Interfaces\FeesInterface;
use Interpolation\Service\Fee\Interfaces\FeeThresholdInterface;
use Interpolation\Service\Fee\Exceptions\FeeException;

class Fees implements FeesInterface
{
    /**
     * @var array
     */
    private $dataset;

    /**
     * @var FeeThresholdInterface
     */
    private $feeThreshold;

    /**
     * Fees constructor.
     * @param FeeDatasetInterface $dataset
     * @param FeeThresholdInterface $feeThreshold
     */
    public function __construct(FeeDatasetInterface $dataset, FeeThresholdInterface $feeThreshold)
    {
        $this->dataset = $dataset;
        $this->feeThreshold = $feeThreshold;
    }

    /**
     * @return int
     * @throws FeeException
     */
    public function getMin(): int
    {
        try {
            return $this->dataset->getSeries()[$this->feeThreshold->getMin()];
        } catch (\Exception $exception) {
            throw new FeeException('Invalid Amount');
        }
    }

    /**
     * @return int
     * @throws FeeException
     */
    public function getMax(): int
    {
        try {
            return $this->dataset->getSeries()[$this->feeThreshold->getMax()];
        } catch (\Exception $exception) {
            throw new FeeException('Invalid Amount');
        }
    }
}
