<?php

namespace spec\Interpolation\Service\Fee;

use Interpolation\Service\Fee\FeeThreshold;
use PhpSpec\ObjectBehavior;

/**
 * Class FeeThresholdSpec
 * @package spec\Interpolation\Service\Fee
 */
class FeeThresholdSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(3450);
    }

    function it_returns_min_threshold_3000_when_amount_3450()
    {
        $this->getMin()->shouldReturn(3000);
    }

    function it_returns_max_threshold_4000_when_amount_3450()
    {
        $this->getMax()->shouldReturn(4000);
    }
}
