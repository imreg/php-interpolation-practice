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
        $feeStructure = [
            12 => [
                1000 => 50,
                2000 => 90,
                3000 => 90,
                4000 => 115,
                5000 => 100,
                6000 => 120
            ],
            24 => [
                1000 => 70,
                2000 => 100,
                3000 => 120,
                4000 => 160,
                5000 => 200,
                6000 => 240,
                7000 => 280,
                8000 => 320,
                9000 => 360,
            ],
        ];
        $this->beConstructedWith($feeStructure[24], 3450);
    }

    function it_returns_min_threshold_3000_when_amount_3450()
    {
        $this->getMinAmountThreshold()->shouldReturn(3000);
    }

    function it_returns_max_threshold_4000_when_amount_3450()
    {
        $this->getMaxAmountThreshold()->shouldReturn(4000);
    }

    function it_returns_maxFee_160_when_amount_3450_and_term_24()
    {
        $this->getMaxFee()->shouldReturn(160);
    }

    function it_returns_minFee_120_when_amount_3450_and_term_12()
    {
        $this->getMinFee()->shouldReturn(120);
    }
}
