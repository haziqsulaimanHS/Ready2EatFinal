<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =['projectID', 'systemOwner', 'systemPIC','projectDuration', 'projectStatus', 'projectStartDate', 'projectEndDate', 'developmentMethodology', 'systemPlatform', 'projectDeploymentType', 'Lead_Developer'];


    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'developer_project');
    }


    public function leaddevelopers()
    {
        return $this->belongsToMany(Developer::class, 'leaddeveloper_project');
    }

    public function progress()
    {
        return $this->HasMany(Progress::class);
    }




}
