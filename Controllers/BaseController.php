<?php

namespace App\Modules\A2Loader\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\A2Loader\Models\ProviderTariff;
use App\Modules\A2Loader\Models\ProviderRates;

class BaseController extends Controller

{

//    public function index()
    public function index()
    {
        return view('A2Loader::index',[
                'tariffid' => '0',
                'rates' => (new ProviderRates)->procRates('0'),
                'tariffplanlist' => (new ProviderTariff)->getTariffplans()
            ]
        );
    }


    /**
     * Выводит список рэйтов для указанного тарифа
     * @param Request $request
     * @return mixed
     */
    public function viewRates(Request $request)
    {
        $data = $this->validate($request, [
            'tariffid' => 'string',
        ]);
        return view('A2Loader::index', [
                'tariffid' => $data['tariffid'],
                'rates' => (new ProviderRates)->procRates($data['tariffid']),
                'tariffplanlist' => (new ProviderTariff)->getTariffplans()
            ]
        );
    }

    /**
     * Выводит рэйт по id
     * @param Request $request
     * @return mixed
     */
    public function viewRateId($rateid)
    {
        return view('A2Loader::rate', [
                'rate' => (new ProviderRates)->getRateId($rateid),
            ]
        );
    }

    /**
     * Выводит рэйт по id
     * @param Request $request
     * @return mixed
     */
    public function updateRateId(Request $request)
    {
        $data = $this->validate($request, [
            'rateid' => 'string',
            'initrate' => 'string',
        ]);

        $updated = (new ProviderRates)->updateRateId($data['rateid'], $data['initrate']);

        if ($updated == 1) {
            return view('A2Loader::rate', [
                    'rate' => (new ProviderRates)->getRateId($data['rateid'])
                ]
            );
        }
    }
}
