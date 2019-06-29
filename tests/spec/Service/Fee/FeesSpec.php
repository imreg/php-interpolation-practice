<?php
declare(strict_types=1);

namespace spec\Interpolation\Service\Fee;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FeesSpec extends ObjectBehavior
{
    function it_returns_100_when_term_12_and_amount_4300()
    {
        $this->getFeesByAmount(12, 4300)->getMaxFee()->shouldReturn(100);
    }
}
