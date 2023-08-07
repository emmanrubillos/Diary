<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = [
        'author_id',
        'supervisor_id',
        'plan_today',
        'end_day',
        'plan_tomorrow',
        'roadblock',
        'summary',
        'status',
    ];
}
