<?php
declare(strict_types=1);

namespace spec\Interpolation\Service\Fee;

use Interpolation\Service\Fee\FeeDataset;
use Interpolation\Service\Fee\FeeThreshold;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FeesSpec extends ObjectBehavior
{
    function it_returns_maxFee_160_when_amount_3450_and_term_24()
    {
        $this->beConstructedWith(new FeeDataset(24), new FeeThreshold(3450));
        $this->getMax()->shouldReturn(160);
    }

    function it_returns_minFee_120_when_amount_3450_and_term_24()
    {
        $this->beConstructedWith(new FeeDataset(24), new FeeThreshold(3450));
        $this->getMin()->shouldReturn(120);
    }

    function it_returns_maxFee_160_when_amount_3450_and_term_12()
    {
        $this->beConstructedWith(new FeeDataset(12), new FeeThreshold(3450));
        $this->getMax()->shouldReturn(115);
    }

    function it_returns_minFee_120_when_amount_3450_and_term_12()
    {
        $this->beConstructedWith(new FeeDataset(12), new FeeThreshold(3450));
        $this->getMin()->shouldReturn(90);
    }
}
