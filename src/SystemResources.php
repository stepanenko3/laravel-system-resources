<?php

namespace Stepanenko3\LaravelSystemResources;

use Stepanenko3\LaravelSystemResources\Adapters\SystemResources as Adapter;

class SystemResources
{
    /**
     * Contains the system resources.
     *
     * @var Adapter
     */
    private $adapter;

    /**
     * Create a new instance and set the system resources.
     */
    public function __construct()
    {
        $this->adapter = new Adapter;
    }

    /**
     * Retrieve the used ram resources from the total resources as a percentage.
     *
     * @return int
     */
    public function ram()
    {
        return $this->adapter->ramResources();
    }

    /**
     * Retrieve the cpu name.
     *
     * @return int
     */
    public function cpuName()
    {
        return $this->adapter->cpuName();
    }

    /**
     * Retrieve the used ram resources.
     *
     * @return int
     */
    public function ramUsed()
    {
        return $this->adapter->ramUsedResources();
    }

    /**
     * Retrieve the total ram resources.
     *
     * @return int
     */
    public function ramTotal()
    {
        return $this->adapter->ramTotalResources();
    }

    /**
     * Retrieve the used disk resources from the total disk resources as a percentage.
     *
     * @return int
     */
    public function disk()
    {
        return $this->adapter->diskResource();
    }

    /**
     * Retrieve the used disk resources.
     *
     * @return int
     */
    public function diskUsed()
    {
        return $this->adapter->diskUsedResources();
    }

    /**
     * Retrieve the used disk resources.
     *
     * @return int
     */
    public function diskFree()
    {
        return $this->adapter->diskFreeResources();
    }

    /**
     * Retrieve the total disk resources.
     *
     * @return int
     */
    public function diskTotal()
    {
        return $this->adapter->diskTotalResources();
    }

    /**
     * Retrieve the cpu usage.
     *
     * @return int
     */
    public function cpu()
    {
        return $this->adapter->cpuResources();
    }
}
