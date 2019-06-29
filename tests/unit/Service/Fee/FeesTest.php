<?php
declare(strict_types=1);

namespace Interpolation\Tests\unit\Service\Fee;

use Interpolation\Service\Fee\Fees;
use Interpolation\Service\Fee\FeeThreshold;
use PHPUnit\Framework\TestCase;

/**
 * Class FeeThresholdTest
 * @package Interpolation\Tests\unit\Service\Fee
 */
class FeesTest extends TestCase
{
    private $array = [
        1000 => 50,
        2000 => 90,
        3000 => 90,
        4000 => 115,
        5000 => 100,
        6000 => 120,
        7000 => 140,
        8000 => 160,
        9000 => 180,
        10000 => 200,
        11000 => 220,
        12000 => 240,
        13000 => 260,
        14000 => 280,
        15000 => 300,
        16000 => 320,
        17000 => 340,
        18000 => 360,
        19000 => 380,
        20000 => 400,
    ];

    public function testGetFeesByAmount()
    {
        $fees = new Fees();
        $result = $fees->getFeesByAmount(12, 3452);

        $this->assertEquals(new FeeThreshold($this->array, 3452), $result);

        $this->assertEquals(4000, $result->getMaxAmountThreshold());
        $this->assertEquals(3000, $result->getMinAmountThreshold());
        $this->assertEquals(115.0, $result->getMaxFee());
        $this->assertEquals(90, $result->getMinFee());
    }
}
