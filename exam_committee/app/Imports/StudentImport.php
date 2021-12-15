<?php

namespace App\Imports;

use App\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToModel,SkipsOnFailure,WithValidation,WithHeadingRow
{
    use Importable,SkipsFailures;
    // use Importable,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new Student([

            'department_id'=> $row['department_id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => bcrypt('secret'),


        ]);
    }
    public function rules():array{

        return
        [
            '*.department_id' => 'required',
            '*.name' => 'required|max:20',
            '*.email' => 'required|unique:students,email'
        ];
    }
}
