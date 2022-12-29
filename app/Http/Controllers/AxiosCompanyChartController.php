<?php

namespace App\Http\Controllers;

use App\analytics\company\Company;
use App\analytics\Service\AnalyticsService;
use App\Models\staffInformation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AxiosCompanyChartController extends Controller {
    public function analyticsGetStaffTurnoverRate( Request $request ) {
        $staffInformation = new staffInformation();
        $service = new AnalyticsService(
            new Company( $request->companyName,
                $staffInformation
                    ->select( 'fullName', 'company', 'object', 'personalEmployeeNumber' )
                    ->where( 'company', "$request->companyName" )
                    ->get() ) );
        return response()->json( $service->implementationOfTheGeneralStaffTrainingPlan(), 200 );
    }

    public function getNeedForStaffYear( Request $request ): JsonResponse {
        $staffInformation = new staffInformation();
        $service = new AnalyticsService(
            new Company( $request->companyName,
                $staffInformation
                    ->select( 'fullName', 'company', 'object', 'personalEmployeeNumber' )
                    ->where( 'company', "$request->companyName" )
                    ->get() ) );
        return response()->json( $service->staffingRequirementsForTheYear(), 200 );
    }
}
