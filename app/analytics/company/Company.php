<?php

namespace App\analytics\company;

use App\analytics\Employee;
use App\Models\needForStaff;
use App\Models\RetiredEmployeesModels;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Integer;

class Company {
    private $staff = array();
    private $companyName;

    /**
     * @param $companyName
     * @param $staff
     */
    public function __construct( $companyName, $staff ) {
        $this->companyName = $companyName;
        foreach ( $staff as $person ) {
            array_push( $this->staff, new Employee( $person->fullName, $person->company, $person->personalEmployeeNumber ) );
        }
    }

    /**
     * @return float
     */
    public function getMoney(): float {
        $sum = 0;
        foreach ( $this->staff as $item ) {
            $sum += $item->getWageArrears();
        }
        return $sum;
    }

    /**
     * @return array
     */
    public function getStaff(): array {
        return $this->staff;
    }

    /**
     * @return float
     */
    public function getRetiredEmployees(): float {
        $retiredEmployee = new RetiredEmployeesModels();
        return count( $retiredEmployee->gettingAListOfQuitEmployeesForTheMonthInTheCompany( $this->companyName ) );
    }

    /**
     * @return int
     */
    public function getRetiredLastMonth(): int {
        $retiredEmployee = new RetiredEmployeesModels();
        return count( $retiredEmployee->gettingTotalDemandForecast( $this->companyName ) );
    }

    /**
     * @return int|mixed
     */
    public function getNeedForStaffMonth():int{
        $needForStaff = new needForStaff();
        return $needForStaff->getNeedForStaffLastMonth( $this->companyName );
    }

    /**
     * @return Collection
     */
    public function getNeedForStaffYear(): Collection {
        $needForStaff = new needForStaff();
        return $needForStaff->getNeedForStaffYear( $this->companyName );
    }

}
