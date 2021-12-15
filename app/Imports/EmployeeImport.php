<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
        'name' => $row['name'],
        'email' => $row['email'],
        'salary' => $row['salary'],
        'phone' => $row['phone'],
        'department' => $row['department'],

        ]);
    }
}
