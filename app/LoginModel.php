<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table = "loginmaster";
    protected $primaryKey = "LoginID";

    public function authorize($email,$password){
        $where = array('EmailAddress'=>$email,'Password'=>$password);
        $userdata = LoginModel::where($where)->get(['loginid','EmailAddress'])->toArray();
        if($userdata) return $userdata[0];
    } 
     public function allocateddept()
    {
        return $this->hasMany('App\AllocatedDepartmentModel','EmailAddress','EmailAddress');
    }
}
//dbeaver
