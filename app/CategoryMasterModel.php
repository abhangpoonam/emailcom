<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryMasterModel extends Model
{
    protected $table = "categorymaster";
    protected $primaryKey = "CategoryID";

    // public function getAllCategories(){
    //     $data = CategoryMasterModel::where('IsActive','1')->get(['CategoryMasterID','DepartmentMasterID','CategoryName','IsActive'])->toArray();
    //     return $data;
    // }
    
    //  public function departments()
    // {
    //     return $this->belongsTo('App\DepartmentMasterModel','DepartmentMasterID');
    // }
     public function subcategories()
    {
        return $this->hasMany('App\SubCategoryMasterModel','CategoryID');
    }
     public function EmailTask()
    {
        return $this->hasMany('App\EmailTaskModel','CategoryID');
    }
   
}
