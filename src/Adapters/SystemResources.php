<?php

namespace Stepanenko3\LaravelSystemResources\Adapters;

use Illuminate\Support\Facades\Cache;

class SystemResources
{
    /**
     * Contains all the eligible drivers and their implementations.
     *
     * @var array
     */
    private $eligible_drivers = [
        'mac'     => MacSystemResources::class,
        'linux'   => LinuxSystemResources::class,
        'windows' => WindowsSystemResources::class,
    ];

    /**
     * Retrieve the cpu name.
     *
     * @return int
     */
    public function cpuName()
    {
        return $this->getDriver()->cpuName();
    }

    /**
     * Retrieve the cpu usage.
     *
     * @return int
     */
    public function cpuResources()
    {
        $usage = $this->getDriver()->cpuResources();

        $this->cacheResources('cpu', $usage);

        return $usage;
    }

    /**
     * Retrieve the used resources from the total resources as a percentage.
     *
     * @return int
     */
    public function ramResources()
    {
        $usage = $this->getDriver()->ramUsedResourcesPercentage();

        $this->cacheResources('ram', $usage);

        return $usage;
    }

    /**
     * Retrieve the free resources.
     *
     * @return int
     */
    public function ramFreeResources()
    {
        $usage = $this->getDriver()->ramTotalResources() - $this->getDriver()->ramResources();

        $this->cacheResources('ram_free', $usage);

        return $usage;
    }

    /**
     * Retrieve the used resources from the total resources as a percentage.
     *
     * @return int
     */
    public function ramUsedResources()
    {
        $usage = $this->getDriver()->ramResources();

        $this->cacheResources('ram_used', $usage);

        return $usage;
    }

    /**
     * Retrieve the used resources from the total resources as a percentage.
     *
     * @return int
     */
    public function ramTotalResources()
    {
        $usage = $this->getDriver()->ramTotalResources();

        $this->cacheResources('ram_total', $usage);

        return $usage;
    }

    /**
     * Retrieve the used resources from the total resources as a percentage.
     *
     * @return int
     */
    public function diskResource()
    {
        $total = disk_total_space('/');
        $usage = ($total - disk_free_space('/')) / $total * 100;

        $this->cacheResources('disk', $usage);

        return $usage;
    }

    /**
     * Retrieve the used resources from the total resources as a percentage.
     *
     * @return int
     */
    public function diskUsedResources()
    {
        $usage = disk_total_space('/') - disk_free_space('/');

        $this->cacheResources('disk_used', $usage);

        return $usage;
    }

    /**
     * Retrieve the used resources from the total resources as a percentage.
     *
     * @return int
     */
    public function diskFreeResources()
    {
        $usage = disk_free_space('/');

        $this->cacheResources('disk_free', $usage);

        return $usage;
    }

    /**
     * Retrieve the used resources from the total resources as a percentage.
     *
     * @return int
     */
    public function diskTotalResources()
    {
        $usage = disk_total_space('/');

        $this->cacheResources('disk_total', $usage);

        return $usage;
    }

    /**
     * Cache the resource results so on refresh we don't have to wait for data to come in.
     *
     * @param string $resource
     * @param int    $usage
     *
     * @return void
     */
    private function cacheResources(string $resource, int $usage)
    {
        $path = "{$resource}_resources";
        $cached_resources = Cache::get($path) ?: collect();

        if ($cached_resources->count() === 12) {
            $cached_resources->shift();
        }

        $cached_resources->push($usage);

        Cache::forever($path, $cached_resources);
    }

    /**
     * Return the driver instance of the server.
     *
     * @return mixed
     */
    private function getDriver()
    {
        $agent = PHP_OS;
        $driver = 'linux';

        if (strpos(strtolower($agent), 'win') !== false) {
            $driver = 'windows';
        }

        if ($agent === 'Darwin') {
            $driver = 'mac';
        }

        return new $this->eligible_drivers[$driver]();
    }
}
