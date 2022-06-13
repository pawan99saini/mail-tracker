<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailTrack extends Model
{
    use HasFactory,SoftDeletes;
        protected $fillable = [
            'email_track_code',
            'email_subject',
            'email_body',
            'receiver_email',
            'email_open_datetime',
            'email_status',
            'schedule_time',
            'schedule_id',
            'status',
            'opens',
        
        ];

        
        public function emailschedule()
        {
            return $this->belongsTo(EmailScheduler::class)->select(['id', 'receiver_email']);;
        }
}
