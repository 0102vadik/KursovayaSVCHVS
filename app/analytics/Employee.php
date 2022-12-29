<?php

namespace App\analytics;

use App\Models\employeePayrolls;
use App\Models\staffInformation;

class Employee {
    private $fullName;
    private $personalNumber;
    private $company;
    //private $dayOfWork;

    /**
     * @param $fullName
     * @param $company
     * @param $personalNumber
     */
    public function __construct( $fullName, $company, $personalNumber) {
        $this->company = $company;
        $this->fullName = $fullName;
        $this->personalNumber = $personalNumber;
    }

    /**
     * @return mixed
     */
    public function getCompany() {
        $staffInformation = new staffInformation();
        return ($staffInformation->select('company')->where('personalEmployeeNumber',"$this->personalNumber")->first())->company;
    }
    /**
     * @return float
     */
    public function getWageArrears(): float{
        $employeePayrolls = new employeePayrolls();
        return ($employeePayrolls->where('personalEmployeeNumber',"$this->personalNumber")
                ->sum('dueSalary'))-($employeePayrolls
                ->where('personalEmployeeNumber',"$this->personalNumber")
                ->sum('actualSalary'));
    }

    public function getObject(){
        $staffInformation = new staffInformation();
        return ($staffInformation->select('object')->where('personalEmployeeNumber',"$this->personalNumber")->first())->object;
    }

    /**
     * @return string
     */
    public function getFullName(): string {
        return $this->fullName;
    }

    /**
     * @return string
     */
    public function getEducation(){
        $staffInformation = new staffInformation();
        return ($staffInformation->select('education')->where('personalEmployeeNumber',"$this->personalNumber")->first())->education;
    }

    /**
     * @return mixed
     */
    public function getPersonalNumber() {
        return $this->personalNumber;
    }

}
