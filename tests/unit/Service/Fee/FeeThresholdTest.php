<?php
declare(strict_types=1);

namespace Interpolation\Tests\unit\Service\Fee;

use Interpolation\Service\Fee\FeeThreshold;
use PHPUnit\Framework\TestCase;

/**
 * Class FeeThresholdTest
 * @package Interpolation\Tests\unit\Service\Fee
 */
class FeeThresholdTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    public function testGetMinAmountThreshold()
    {
        $feeThreshold = new FeeThreshold(3428);
        $result = $feeThreshold->getMin();
        $this->assertEquals(3000, $result);
    }

    /**
     * @dataProvider getProvidedData
     * @param $term
     * @param $amount
     * @param $expectation
     */
    public function testGetMaxAmountThreshold($amount, $expectation)
    {
        $feeThreshold = new FeeThreshold($amount);
        $result = $feeThreshold->getMax();
        $this->assertEquals($expectation, $result);
    }

    public function getProvidedData(): array
    {
        return [
            [3428, 4000]
        ];
    }
}
