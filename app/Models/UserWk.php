<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserWk extends Model
{
    //use HasFactory;
    protected $table = 'user_wks';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function workouts(){
        return $this->belongsToMany(Workout::class);
    }
}
