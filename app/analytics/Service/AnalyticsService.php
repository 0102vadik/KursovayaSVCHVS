<?php

namespace App\analytics\Service;

use App\analytics\company\Company;
use App\Contracts\serviceInterface;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Integer;

class AnalyticsService implements serviceInterface {

    protected $companyObject;

    /**
     * @param Company $companyObject
     */
    public function __construct( Company $companyObject ) {
        $this->companyObject = $companyObject;
    }

    /**
     * @return float
     */
    public function gettingPayrollProtection(): float {
        $totalDebt = 0;
        foreach ( $this->companyObject->getStaff() as $item ) {
            $totalDebt += $item->getWageArrears();
        }
        return $totalDebt;
    }


    /**
     * @return int
     */
    public function implementationOfTheGeneralStaffTrainingPlan(): int {
        $numberOfEmployeesWithSpecializedHigherEducation = 0;
        foreach ( $this->companyObject->getStaff() as $item ) {
            if ( $item->getEducation() == "Высшее (соответствует занимаемой должности)" ) $numberOfEmployeesWithSpecializedHigherEducation ++;
        }
        return $numberOfEmployeesWithSpecializedHigherEducation * 100 / count( $this->companyObject->getStaff() );
    }

    /**
     * @return float
     */
    public function staffTurnoverRate(): float {
        $countRetiredEmployees = $this->companyObject->getRetiredEmployees();
        return round( $countRetiredEmployees / ( $countRetiredEmployees + count( $this->companyObject->getStaff() ) ), 2 );
    }

    /**
     * @return int
     */
    public function totalDemandForecast(): int {
        return ( $this->companyObject->getRetiredLastMonth() + $this->companyObject->getNeedForStaffMonth() );
    }

    /**
     * @return Collection
     */
    public function staffingRequirementsForTheYear(): Collection {
        $collectionStaffingRequirementsForTheYear = $this->companyObject->getNeedForStaffYear();
        foreach ($collectionStaffingRequirementsForTheYear as $item){
            $item->date = date_format(date_create($item->date), 'F') ;
        }
        return $collectionStaffingRequirementsForTheYear;
    }

}
