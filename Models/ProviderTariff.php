<?php

namespace App\Modules\A2Loader\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ProviderTariff extends Model{

    /**
     * @return string[]
     */
    public function getProviders()
    {
        return $this->providers;
    }

    /**
     * @return string[]
     */
    public function getTariffplans()
    {
        return $this->tariffplans;
    }

    public $providers = [
        '3'     => 'Voicetrading',
        '5'     => 'Voxbeam',
        '9'     => 'Anveo',
        '7'     => 'Voicebuy',
        '11'    => 'Vitelity',
        '12'    => 'Nobel',
        '14'    => 'NetworkIP',
        '15'    => 'VoxBeam_Platinum',
        '16'    => 'Nobel_Premium',
    ];

    public $tariffplans = [
        '0' => '-- select tariff plan --',
//        '12' => 'Jupiter/VB_Gold',
//        '13' => 'Saturn/VB_Gold',
//        '14' => 'Mariachi/VB_Gold',
//        '15' => 'RoyalCall/VB_Gold',
//        '17' => 'Jupiter/VT_Premium',
//        '18' => 'Saturn/VT_Premium',
//        '19' => 'Mariachi/VT_Premium',
//        '20' => 'RoyalCall/VT_Premium',
//        '41' => 'RoyalCall/Voicebuy',
//        '43' => 'Jupiter/Anveo',
//        '44' => 'Saturn/Anveo',
//        '45' => 'RoyalCall/Anveo',
//        '46' => 'Mariachi/Anveo',
//        '38' => 'Jupiter/Voicebuy',
//        '40' => 'Mariachi/Voicebuy',
//        '39' => 'Saturn/Voicebuy',
//        '53' => 'MobileApp/Anveo',
//        '54' => 'MobileApp/VB_Gold',
//        '55' => 'MobileApp/VT_Premium',
//        '56' => 'MobileApp/Voicebuy',
//        '57' => 'HelloUK/VT_Premium',
//        '58' => 'HelloUK/Anveo',
//        '59' => 'HelloUK/VB_Gold',
//        '60' => 'HelloUK/Voicebuy',
//        '61' => 'HelloUK/Vitelity',
        '62' => 'Jupiter/Vitelity - 27.07.2020',
//        '63' => 'Saturn/Vitelity',
//        '64' => 'RoyalCall/Vitelity',
//        '65' => 'Mariachi/Vitelity',
//        '66' => 'MobileApp/Vitelity',
//        '67' => 'Test/Test',
//        '68' => 'Simply/Voicebuy',
//        '69' => 'Simply/Vitelity',
//        '70' => 'Simply/VT_Premium',
//        '71' => 'Simply/VB_Gold',
//        '72' => 'Simply/Anveo',
//        '73' => 'Jupiter/Nobel',
//        '74' => 'Saturn/Nobel',
//        '75' => 'HelloUK/Nobel',
//        '76' => 'RoyalCall/Nobel',
//        '77' => 'Mariachi/Nobel',
//        '78' => 'Simply/Nobel',
//        '79' => 'MobileApp/Nobel',
//        '80' => 'Continental/Anveo',
//        '81' => 'Continental/Nobel',
//        '82' => 'Continental/VB_Gold',
//        '83' => 'Continental/VT_Premium',
//        '84' => 'Continental/Vitelity',
//        '85' => 'Continental/Voicebuy',
//        '86' => 'GoldenLotus/Anveo',
//        '87' => 'GoldenLotus/Nobel',
//        '88' => 'GoldenLotus/VB_Gold',
//        '89' => 'GoldenLotus/VT_Premium',
//        '90' => 'GoldenLotus/Vitelity',
//        '91' => 'GoldenLotus/Voicebuy',
//        '92' => 'Simply/NetworkIP',
//        '93' => 'Saturn/NetworkIP',
//        '94' => 'RoyalCall/NetworkIP',
//        '95' => 'MobileApp/NetworkIP',
//        '96' => 'Mariachi/NetworkIP',
//        '97' => 'Jupiter/NetworkIP',
//        '98' => 'HelloUK/NetworkIP',
//        '99' => 'GoldenLotus/NetworkIP',
//        '100' => 'Continental/NetworkIP',
        '101' => 'Nobel/Premium  - 25.07.2020',
//        '102' => 'Voxbeam/Platinum',
    ];
} // ProviderTariff
