<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\LoginModel;
use App\DepartmentMasterModel;
use App\CategoryMasterModel;
use App\SubCategoryMasterModel;
use App\TemplateMasterModel;
use App\UserSelectionModel;
use App\AllocatedDeptFromMailModel;
use App\EmailSendFromGroupDetailModel;
use App\SqlServerConnectionMasterModel;
use App\EmailTaskModel;
use App\EmailTaskModelforScheduleType;


class DashboardController extends Controller
{
    public function index(){
        $data = array(
            'addemailtemplate'=>false
        );
        //dd($data);
        return view('home',$data);
    }

    public function logout(){
        Session::forget(['loginid','email']);
        return redirect('/login');
    }

    public function addemailtemplate(){
       //print_r(with(new CategoryMasterModel())->getAllCategories());exit;
        $data = array(
            'addemailtemplate'=>true,
            'departments' => with(new DepartmentMasterModel())->getAllDepartments(),
            'categories' => with(new CategoryMasterModel())->getAllCategories()
        );
        return view('home',$data);
    }
    
  
    
}
