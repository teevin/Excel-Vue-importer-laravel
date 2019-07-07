<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class ImportUsers implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       if(isset($row[2])){
         $name = explode(" ",$row[2]);
         if($row[2] == 'name'){
           $name[0] = 'first_name';
         }
       }
      if($row[1] == 'email')
      return null;


        $user = new User([
            //
            'email'          => $row[1],
            'first_name'     => $name[0] ?? 'first_name',
            'last_name'      => $name[1] ?? 'last_name',
            'city'           => $row[3],
            'zip'            => $row[4],
            'number'         => $row[0] == '#'? 0 : 0,
            'number_extra'   => $row[5],
            'street'         => $row[6],
            'country'        => $row[7] == 'country'? 'OO' : 'OO',
            'phone'          => substr($row[8], 0, 10),
            'company'        => $row[9],
            'job_title'      => $row[10],
            'ip'             => isset($row[11]) ? 1 : 0,
            'password'       => \Hash::make(str_random(8)),
        ]);
        Mail::to($user)->send(new WelcomeMail($user));
        return $user;
    }
}
