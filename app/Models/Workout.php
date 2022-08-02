<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    //use HasFactory;
    protected $table = 'workouts';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function user(){
        return $this->belongsToMany(UserWk::class);
    }
}
