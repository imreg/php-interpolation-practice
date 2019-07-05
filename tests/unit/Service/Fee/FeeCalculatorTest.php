<?php
declare(strict_types=1);

namespace Interpolation\Tests\unit\Service\Fee;

use Interpolation\Service\Fee\FeeInterpolation;
use Interpolation\Service\Fee\Fees;
use Interpolation\Service\Fee\FeeThreshold;
use PHPUnit\Framework\TestCase;
use Interpolation\Model\LoanApplication;
use Interpolation\Service\Fee\FeeCalculator;

/**
 * Class FeeCalculatorTest
 * @package Interpolation\Tests\unit\Service\Fee
 */
class FeeCalculatorTest extends TestCase
{
    public function testCalculation()
    {
        $interpolation = $this->createMock(FeeInterpolation::class);
        $interpolation->expects($this->any())
            ->method('roundUp')
            ->willReturn(115.0);

        $calculator = new FeeCalculator($interpolation);
        $application = new LoanApplication(12, 4325);
        $fee = $calculator->calculate($application);
        $this->assertEquals(115.0, $fee);
    }
}
