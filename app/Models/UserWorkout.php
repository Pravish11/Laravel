<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkout extends Model
{
    //use HasFactory;
    protected $table = 'user_workouts';
    protected $fillable = ['user_id','workout_id'];
}
