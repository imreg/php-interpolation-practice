<?php

namespace Interpolation\Service\Fee\Interfaces;

interface FeeDatasetInterface
{
    /**
     * @return array
     */
    public function getSeries(): array;
}
