<?php

namespace App\Http\Controllers;
use App\Models\Phone;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function insertRecords(){
        $phone = new Phone();
        $phone->pone = "123456";
 
        $user = new User();

        $user->name = "Jenefier";
        $user->email= "jenefier@gmail.com";
        $user->password=encrypt("secret");
        $user->save();
        $user->phone()->save($phone);
        return  "Record has been added successfuly ";
    }
}
