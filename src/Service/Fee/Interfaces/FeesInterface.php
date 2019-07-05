<?php

namespace Interpolation\Service\Fee\Interfaces;

interface FeesInterface
{
    /**
     * @return int
     */
    public function getMin():int;

    /**
     * @return int
     */
    public function getMax():int;
}
