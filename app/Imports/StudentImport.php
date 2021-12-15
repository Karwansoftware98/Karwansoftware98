<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class StudentImport implements ToModel,WithHeadingRow,WithValidation,SkipsOnFailure
{

    use Importable,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name' =>$row['name'],
            'email' =>$row['email'],
            'phone' =>$row['phone'],
            'salary' =>$row['salary'],
            'department' =>$row['department'],
        ]);
    }
    public function rules():array{

        return [
            '*.name' =>'required|max:10',
            '*.email' =>['email','unique:students,email'],


        ];
    }

}
