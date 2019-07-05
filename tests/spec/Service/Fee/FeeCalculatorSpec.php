<?php
declare(strict_types=1);

namespace spec\Interpolation\Service\Fee;

use Interpolation\Model\LoanApplication;
use Interpolation\Service\Fee\FeeInterpolation;
use Interpolation\Service\Fee\Fees;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class FeeCalculatorSpec
 * @package spec\Interpolation\Service\Fee
 */
class FeeCalculatorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new FeeInterpolation());
    }

    function it_returns_value_0_calculation_of_loan_when_term_12_and_amount_0()
    {
        $application = new LoanApplication(12, 0);
        $this->calculate($application)->shouldReturn(0.0);
    }

    function it_returns_value_0_calculation_of_loan_when_term_12_and_amount_11250()
    {
        $application = new LoanApplication(12, 21250);
        $this->calculate($application)->shouldReturn(0.0);
    }

    function it_returns_value_90_calculation_of_loan_when_term_12_and_amount_2750()
    {
        $application = new LoanApplication(12, 2750);
        $this->calculate($application)->shouldReturn(90.0);
    }

    function it_returns_value_115_calculation_of_loan_when_term_24_and_amount_2750()
    {
        $application = new LoanApplication(24, 2750);
        $this->calculate($application)->shouldReturn(115.0);
    }

    function it_returns_value_115_calculation_of_loan_when_term_12_and_amount_4530()
    {
        $application = new LoanApplication(12, 4530);
        $this->calculate($application)->shouldReturn(110.0);
    }
}
