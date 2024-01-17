<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $fillable = ['ReportID', 'Date_Report', 'Status', 'Description'];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
