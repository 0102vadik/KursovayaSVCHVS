<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RetiredEmployeesModels extends Model {
    protected $table = 'RetiredEmployees';

    /**
     * @param $companyName
     *
     * @return Collection
     */
    public function gettingAListOfQuitEmployeesForTheMonthInTheCompany( $companyName ): Collection {
        return DB::table( "$this->table" )->select( 'fullName' )
            ->whereMonth( 'date', Carbon::today()->month )
            ->orWhere( function ( $query ) {
                $query->whereMonth( 'date', new Carbon( 'last day of last month' ) );
            } )
            ->where( 'company', "$companyName" )
            ->get();
    }

    /**
     * @param $companyName
     *
     * @return Collection
     */
    public function gettingTotalDemandForecast( $companyName ): Collection {
        return DB::table( "$this->table" )->select( 'fullName' )
            ->whereMonth( 'date', new Carbon( 'last day of last month' ))
            ->where( 'company', "$companyName" )
            ->get();
    }
}
