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

    /**
     * FeeThreshold constructor.
     * @param float $amount
     */
    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @inheritDoc
     */
    public function getMin(): int
    {
        return intval(floor($this->amount / 1000) * 1000);
    }

    /**
     * @inheritDoc
     */
    public function getMax(): int
    {
        return intval(ceil($this->amount / 1000) * 1000);
    }
}
