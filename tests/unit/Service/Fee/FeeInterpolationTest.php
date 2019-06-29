<?php
declare(strict_types=1);

namespace Interpolation\Tests\unit\Service\Fee;

use Interpolation\Service\Fee\FeeInterpolation;
use Interpolation\Service\Fee\FeeThreshold;
use PHPUnit\Framework\TestCase;

/**
 * Class FeeInterpolationTest
 * @package Interpolation\Tests\unit\Service\Fee
 */
class FeeInterpolationTest extends TestCase
{
    /**
     * @var FeeInterpolation
     */
    private $interpolation;

    protected function setUp()
    {
        parent::setUp();
        $this->interpolation = new FeeInterpolation();
    }

    public function testInterpolation()
    {
        $feeThreshold = new FeeThreshold([4000 => 100, 5000 => 140], 4325.0);

        $result = $this->interpolation->interpolation(4325.0, $feeThreshold);
        $this->assertEquals(113.0, $result);
    }

    public function testRoundUp()
    {
        $result = $this->interpolation->roundUp(113.0);
        $this->assertEquals(115.0, $result);
    }
}
