<?php
declare(strict_types=1);

namespace Interpolation\Service\Fee;

use Interpolation\Service\Fee\Exceptions\FeeException;
use Interpolation\Service\Fee\Interfaces\FeesInterface;
use Interpolation\Service\Fee\Interfaces\FeeThresholdInterface;

class FeeThreshold implements FeeThresholdInterface
{
    /**
     * @var float
     */
    private $amount;

    /**
     * @var FeesInterface
     */
    private $fees;

    public function __construct(array $fees, float $amount)
    {
        $this->fees = $fees;
        $this->amount = $amount;
    }

    /**
     * @inheritDoc
     */
    public function getMinFee(): int
    {
        try {
            return $this->fees[$this->getMinAmountThreshold()];
        } catch (\Exception $exception) {
            throw new FeeException('Invalid Amount');
        }
    }

    /**
     * @inheritDoc
     */
    public function getMaxFee(): int
    {
        try {
            return $this->fees[$this->getMaxAmountThreshold()];
        } catch (\Exception $exception) {
            throw new FeeException('Invalid Amount');
        }
    }

    /**
     * @inheritDoc
     */
    public function getMinAmountThreshold(): int
    {
        return intval(floor($this->amount / 1000) * 1000);
    }

    /**
     * @inheritDoc
     */
    public function getMaxAmountThreshold(): int
    {
        return intval(ceil($this->amount / 1000) * 1000);
    }
}
