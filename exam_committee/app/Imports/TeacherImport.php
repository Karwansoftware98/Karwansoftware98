<?php

namespace App\Imports;

use App\department;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToModel;
class TeacherImport implements ToModel,WithHeadingRow,WithValidation,SkipsOnFailure
{

    use Importable,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        switch($row['department']){
            case 'Software':
                $row['department']=1;
                break;
                case 'Civil':
                    $row['department']=2;
                    break;
                    case 'Petroleum':
                        $row['department']=3;
                        break;
                        case 'Chemical':
                            $row['department']=4;
                            break;
                            case 'Architecture':
                                $row['department']=5;
                                break;
                                case 'Geotechnical':
                                    $row['department']=6;
                                    break;
                                    case 'Manufacture':
                                        $row['department']=7;
                                        break;
        }


        return new Teacher([

            'department_id'=> $row['department'],
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'password' => bcrypt('secret'),


        ]);
    }
    public function rules(): array{

        return [

            '*.name' => 'required|max:20',
            '*.email' => 'required|unique:staff,email',
            '*.phone' => 'required'
        ];
    }


}
