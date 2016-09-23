<?php

namespace Nathiss\Bundle\CountToBundle\Api;

use Symfony\Component\DependencyInjection\ContainerInterface;
use DateInterval;
use DateTime;

/**
 * Class NathissCountToApi
 *
 * Provides API for Twig extensions and services.
 */
class NathissCountToApi implements NathissCountToApiInterface
{
    /**
     * First time point
     *
     * @var \DateTime
     */
    protected $t1;

    /**
     * Secound time point
     *
     * @var \DateTime
     */
    protected $t2;

    /**
     * Calculated delta
     *
     * @var \DateInterval
     */
    protected $delta;

    /**
     * Service container
     *
     * @var ...
     */
    protected $container;


    /**
     * Inits time points
     */
    public function __construct(ContainerInterface $container)
    {
        $this->t1 = $this->t2 = new DateTime();
        $this->delta = $this->t1->diff($this->t2);

        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function calculateDelta(DateTime $t1, DateTime $t2)
    {
        $this->t1 = $t1;
        $this->t2 = $t2;

        $this->delta = $this->t1->diff($this->t2);

        return $this->delta;
    }

    /**
     * {@inheritDoc}
     */
    public function calculateFromString($t1, $t2)
    {
        return $this->calculateDelta(new DateTime($t1), new DateTime($t2));
    }

    /**
     * {@inheritDoc}
     */
    public function getDelta()
    {
        return $this->delta;
    }


    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $years      = $this->delta->y === 1 ? 'year'      :   'years';
        $months     = $this->delta->m === 1 ? 'month'     :   'months';
        $days       = $this->delta->d === 1 ? 'day'       :   'days';
        $hours      = $this->delta->h === 1 ? 'hour'      :   'hours';
        $minutes    = $this->delta->i === 1 ? 'minute'    :   'minutes';
        $secounds   = $this->delta->s === 1 ? 'secound'   :   'secounds';

        $format     = '%d %s %d %s %d %s %d %s %d %s %d %s';

        return sprintf($format,
            $this->delta->y, $years,
            $this->delta->m, $mounths,
            $this->delta->d, $mounts,
            $this->delta->h, $hours,
            $this->delta->i, $minutes,
            $this->delta->s, $secounds
        );
    }
}
