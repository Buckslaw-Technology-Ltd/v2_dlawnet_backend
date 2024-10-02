<?php

namespace Modules\Core\App\Services;

use Nnjeim\World\WorldHelper;

class CountryService
{
    protected $world;

    public function __construct(WorldHelper $world)
    {
        $this->world = $world;
    }

    /**
     * Get all countries.
     *
     * @return array|null
     */
    public function getCountries(): ?array
    {
        $action = $this->world->countries();

        if ($action->success) {
            return $action->data->toArray();
        }

        return null;
    }

    /**
     * Get all states for a specific country.
     *
     * @param int $countryId
     * @return array|null
     */
    public function getStates(int $countryId): ?array
    {
        $action = $this->world->states([
            'filters' => [
                'country_id' => $countryId,
            ],
        ]);

        if ($action->success) {
            return $action->data->toArray();
        }

        return null;
    }
}
