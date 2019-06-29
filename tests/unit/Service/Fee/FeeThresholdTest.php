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
    private $feeStructure = [
        12 => [
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
            10000 => 400,
            11000 => 440,
            12000 => 480,
            13000 => 520,
            14000 => 560,
            15000 => 600,
            16000 => 640,
            17000 => 680,
            18000 => 720,
            19000 => 760,
            20000 => 800,
        ],
    ];

    private $feeThreshold;

    protected function setUp()
    {
        parent::setUp();
    }

    public function testGetMinFee()
    {
        $feeThreshold = new FeeThreshold($this->feeStructure[12], 3428);
        $result = $feeThreshold->getMinFee();
        $this->assertEquals(90, $result);
    }

    public function testGetMaxFee()
    {
        $feeThreshold = new FeeThreshold($this->feeStructure[12], 3428);
        $result = $feeThreshold->getMaxFee();
        $this->assertEquals(115, $result);
    }

    public function testGetMinAmountThreshold()
    {
        $feeThreshold = new FeeThreshold($this->feeStructure[12], 3428);
        $result = $feeThreshold->getMinAmountThreshold();
        $this->assertEquals(3000, $result);
    }

    /**
     * @dataProvider getProvidedData
     * @param $term
     * @param $amount
     * @param $expectation
     */
    public function testGetMaxAmountThreshold($term, $amount, $expectation)
    {
        $feeThreshold = new FeeThreshold($this->feeStructure[$term], $amount);
        $result = $feeThreshold->getMaxAmountThreshold();
        $this->assertEquals($expectation, $result);
    }

    public function getProvidedData(): array
    {
        return [
            [12, 3428, 4000],
            [24, 3428, 4000]
        ];
    }
}
