<?php

namespace App\Http\Controllers;

use App\analytics\company\Company;
use App\analytics\Service\AnalyticsService;
use App\Contracts\serviceInterface;
use App\Models\staffInformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CompanyAnalyticsController extends Controller {
    public function analytics( Request $request) {
        $staffInformation = new staffInformation();
        $company = new Company( $request->companyName, $staffInformation->select( 'fullName', 'company', 'object', 'personalEmployeeNumber' )->where('company',"$request->companyName")->get());
        $service = new AnalyticsService($company);
        return view( 'employeeAnalytics', [
            'companyName' => $request->companyName,
            'company' => $company,
            'service' =>$service,
        ] );
    }
}
