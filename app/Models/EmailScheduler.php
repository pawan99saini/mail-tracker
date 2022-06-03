<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailScheduler extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'group_id',
        'template_id',
        'schedule_time',
        'status',
       
    ];

    public function templates()
    {
        return $this->belongsTo(Template::class,'template_id');
    }
    
    public function groups()
    {
        return $this->belongsTo(Group::class,'group_id');
    }
}
