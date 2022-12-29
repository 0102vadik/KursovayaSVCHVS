<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class needForStaff extends Model {
    protected $table = 'needForStaff';

    /**
     * @param $companyName
     *
     * @return int|mixed
     */
    public function getNeedForStaffLastMonth( $companyName ) {
        return DB::table( "$this->table" )
            ->whereMonth( 'date', new Carbon( 'last day of last month' ) )
            ->where( 'company', "$companyName" )
            ->sum( 'colNeedForStaff' );
    }

    /**
     * @param $companyName
     *
     * @return Collection
     */
    public function getNeedForStaffYear( $companyName ): Collection {
        return DB::table( "$this->table" )->select('date','colNeedForStaff')
            ->whereYear( 'date', Carbon::today()->year )
            ->where( 'company', "$companyName" )
            ->get();
    }
}
