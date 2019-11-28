<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoryMasterModel extends Model
{
    protected $table = "subcategorymaster";
    protected $primaryKey = "SubCategoryID";

   
    public function categories()
    {
        return $this->belongsTo('App\CategoryMasterModel','CategoryID');
    }

}
