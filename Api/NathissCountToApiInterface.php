<?php

namespace Nathiss\Bundle\CountToBundle\Api;

use DateTime;

/**
 * Interface NathissCountToApiInterface
 *
 * It's API for Twig extensions and services which are inside this bundle.
 */
interface NathissCountToApiInterface
{
    /**
     * Converts given strings to DateTime objects and calculates time delta.
     *
     * @param string $t1
     * @param string $t2
     *
     * @return \DateInterval
     */
    public function calculateFromString($t1, $t2);

    /**
     * Calculates diffrence between two DateTime objects.
     *
     * @param \DateTime $t1
     * @param \DateTime $t2
     *
     * @return \DateInterval
     */
    public function calculateDelta(DateTime $t1, DateTime $t2);

    /**
     * Returns calculated diffrence.
     *
     * @return \DateInterval
     */
    public function getDelta();

    /**
     * Renders calculated diffrence and returns it.
     *
     * @return string
     */
    public function render();
}
