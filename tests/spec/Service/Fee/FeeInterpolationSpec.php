<?php
declare(strict_types=1);

namespace spec\Interpolation\Service\Fee;

use Interpolation\Service\Fee\FeeInterpolation;
use Interpolation\Service\Fee\Interfaces\FeeThresholdInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class FeeInterpolationSpec
 * @package spec\Interpolation\Service\Fee
 */
class FeeInterpolationSpec extends ObjectBehavior
{
    function it_returns_interpolation_when_amount_4530(FeeThresholdInterface $feeThreshold)
    {
        $feeThreshold->getMinAmountThreshold()->willReturn(4000);
        $feeThreshold->getMaxAmountThreshold()->willReturn(5000);
        $feeThreshold->getMinFee()->willReturn(115);
        $feeThreshold->getMaxFee()->willReturn(100);

        $this->interpolation(4530, $feeThreshold)->shouldReturn(107.05);
    }

    function it_returns_110_when_amount_107()
    {
        $this->roundUp(107.05)->shouldReturn(110.0);
    }
}
