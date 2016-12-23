<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 */
class Employee
{
    private $employee_id;

    /**
     * @var string
     */
    private $employeeName;

    /**
     * @var integer
     */

    /**
     * Get id
     *
     * @return integer 
     */
    public function getEmployeeId()
    {
        return $this->employee_id;
    }
    /**
     * Set employeeName
     *
     * @param string $employeeName
     * @return Employee
     */
    public function setEmployeeName($employeeName)
    {
        $this->employeeName = $employeeName;

        return $this;
    }
    /**
     * Get employeeName
     *
     * @return string 
     */
    public function getEmployeeName()
    {
        return $this->employeeName;
    }

    /**
     * Set employeeNumber
     *
     * @param integer $employeeNumber
     * @return Employee
     */

}
