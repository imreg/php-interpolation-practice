<?php
declare(strict_types=1);

namespace spec\Interpolation\Service\Fee;

use Interpolation\Service\Fee\FeeInterpolation;
use Interpolation\Service\Fee\Interfaces\FeesInterface;
use Interpolation\Service\Fee\Interfaces\FeeThresholdInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class FeeInterpolationSpec
 * @package spec\Interpolation\Service\Fee
 */
class FeeInterpolationSpec extends ObjectBehavior
{
    function it_returns_interpolation_when_amount_4530(FeeThresholdInterface $feeThreshold, FeesInterface $fees)
    {
        $feeThreshold->getMin()->willReturn(4000);
        $feeThreshold->getMax()->willReturn(5000);
        $fees->getMin()->willReturn(115);
        $fees->getMax()->willReturn(100);

        $this->interpolation(4530, $fees, $feeThreshold)->shouldReturn(107.05);
    }

    function it_returns_110_when_amount_107()
    {
        $this->roundUp(107.05)->shouldReturn(110.0);
    }
}
