<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title',
        'category_id',
        'description',
        'status',
    ];

    public function emails()
    {
        return $this->hasMany(EmailScheduler::class);
    } 
    
    public function schedules()
    {
        return $this->hasMany(EmailScheduler::class);
    }
   
}
