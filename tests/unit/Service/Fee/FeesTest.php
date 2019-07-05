<?php
declare(strict_types=1);

namespace Interpolation\Tests\unit\Service\Fee;

use Interpolation\Service\Fee\FeeDataset;
use Interpolation\Service\Fee\Fees;
use Interpolation\Service\Fee\FeeThreshold;
use PHPUnit\Framework\TestCase;

/**
 * Class FeeThresholdTest
 * @package Interpolation\Tests\unit\Service\Fee
 */
class FeesTest extends TestCase
{
    public function testGetFeesByAmount()
    {
        $dataset = $this->createMock(FeeDataset::class);
        $dataset->expects($this->any())
            ->method('getSeries')
            ->willReturn([3000 => 90, 4000 => 115]);

        $fees = new Fees($dataset, new FeeThreshold(3452));

        $this->assertEquals(115.0, $fees->getMax());
        $this->assertEquals(90, $fees->getMin());
    }
}
