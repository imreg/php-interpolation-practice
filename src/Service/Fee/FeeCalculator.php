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

    public function __construct(FeesInterface $fees, FeeInterpolation $feeInterpolation)
    {
        $this->fees = $fees;
        $this->feeInterpolation = $feeInterpolation;
    }

    /**
     * @inheritDoc
     */
    public function calculate(LoanApplication $application): float
    {
        try {
            $dataSet = $this->fees->getFeesByAmount($application->getTerm(), $application->getAmount());
            $result = $this->feeInterpolation
                ->interpolation($application->getAmount(), $dataSet);
            return $this->feeInterpolation
                ->roundUp($result);
        } catch (FeeException $exception) {
            return 0;
        }
    }
}
