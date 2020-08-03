<?php

namespace App\Modules\A2Loader\Models;


use Illuminate\Support\Facades\DB;


class ProviderRates{

    private $providerRates;



    public function procRates($tariffplan){
        $rates = DB::connection('mysql_a2loader')->select("select * from cc_ratecard_a2l where idtariffplan=" . $tariffplan . " order by dialprefix");

        return $rates;
//        foreach ($rates as $rate) {
//            printf ('%s: %s <br>', $rate->idtariffplan, $rate->dialprefix);
//        }



// stdClass Object ( [idtariffplan] => 101 [dialprefix] => 08999999999
//        $users = DB::table('users')->get();

    }


    /**
     * @return mixed
     */
    public function getProviderRates()
    {
        return $this->providerRates;
    }

    /**
     * @param mixed $providerRates
     */
    public function getRateId($rateid)
    {

        $rate = DB::connection('mysql_a2loader')->select("select * from cc_ratecard_a2l where id=" . $rateid);

        return $rate;

    }

    public function updateRateId($rateid, $initrate)
    {

        $query = "update cc_ratecard_a2l set rateinitial=" . $initrate . " where id=" . $rateid;
        $updated = DB::connection('mysql_a2loader')->update($query);

        return $updated;

    }


} //ProviderRates
