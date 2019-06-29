<?php
declare(strict_types=1);

namespace spec\Interpolation\Model;

use Interpolation\Model\LoanApplication;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class LoanApplicationSpec
 * @package spec\Interpolation\Model
 */
class LoanApplicationSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(24, 2750);
    }

    function it_returns_term_with_24_months_for_loan()
    {
        $this->getTerm()->shouldReturn(24);
    }

    function it_returns_amount_with_2750_for_loan()
    {
        $this->getAmount()->shouldReturn(2750.00);
    }
}
