<?php
declare(strict_types=1);

namespace Interpolation\Service\Fee;

use Interpolation\Model\LoanApplication;
use Interpolation\Service\Fee\Exceptions\FeeException;
use Interpolation\Service\Fee\Interfaces\FeeCalculatorInterface;
use Interpolation\Service\Fee\Interfaces\FeesInterface;

class FeeCalculator implements FeeCalculatorInterface
{
    private $fees;
    private $feeInterpolation;

    /**
     * FeeCalculator constructor.
     * @param FeeInterpolation $feeInterpolation
     */
    public function __construct(FeeInterpolation $feeInterpolation)
    {
        $this->feeInterpolation = $feeInterpolation;
    }

    /**
     * @inheritDoc
     */
    public function calculate(LoanApplication $application): float
    {
        try {
            $threshold = new FeeThreshold($application->getAmount());
            $fees = new Fees(new FeeDataset($application->getTerm()), $threshold);
            $result = $this->feeInterpolation
                ->interpolation($application->getAmount(), $fees, $threshold);
            return $this->feeInterpolation
                ->roundUp($result);
        } catch (FeeException $exception) {
            return 0;
        }
    }
}
