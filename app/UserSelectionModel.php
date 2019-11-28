<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSelectionModel extends Model
{
    protected $table = "userselection";
    protected $primaryKey = "UserSelectionID";

    public function departments()
    {
        return $this->belongsTo('App\DepartmentMasterModel','DepartmentMasterID');
    }
}
