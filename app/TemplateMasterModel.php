<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateMasterModel extends Model
{
    protected $table = "mailtemplate";
    protected $primaryKey = "MailTemplateID";

    public function departments()
    {
        return $this->belongsTo('App\DepartmentMasterModel','DepartmentMasterID');
    }
}
