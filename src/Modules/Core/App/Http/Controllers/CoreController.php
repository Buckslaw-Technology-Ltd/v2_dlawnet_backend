<?php

namespace Modules\Core\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Core\App\Services\CountryService;
use Modules\Core\App\Traits\ResponseTrait;

class CoreController extends Controller
{
    use ResponseTrait;

    protected CountryService $countryService;

    public function __construct(CountryService $service)
    {
        $this->countryService = $service;
    }

    public function getCountries()
    {
        return $this->countryService->getCountries();
    }

    public function getStates($id)
    {
        return $this->countryService->getStates($id);
    }
}
