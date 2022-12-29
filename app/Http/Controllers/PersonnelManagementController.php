<?php

namespace App\Http\Controllers;

use App\Models\staffInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonnelManagementController extends Controller
{
    public function transferToAnotherObject(Request $request): \Illuminate\Http\JsonResponse {
        DB::table('staffInformation')->where('personalEmployeeNumber', "$request->idEmployee")->update(array('object'=>"$request->newObject"));
        return response()->json("good",200);
    }

    public function transferToAnotherCompany(Request $request): \Illuminate\Http\JsonResponse {
        DB::table('staffInformation')->where('personalEmployeeNumber', "$request->idEmployee")->update(array('company'=>"$request->newCompany"));
        return response()->json("good",200);
    }

    public function deleteEmployee(Request $request): \Illuminate\Http\JsonResponse {
        DB::table('staffInformation')->where('personalEmployeeNumber', "$request->idEmployee")->delete();
        return response()->json("good",200);
    }
}
