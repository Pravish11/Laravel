<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClass extends Model
{
    //use HasFactory;
    protected $table = 'classes';
    protected $primaryKey = 'id';
    protected $fillable = ['class_name','class_date','start_time','duration','coach_mail'];
}
