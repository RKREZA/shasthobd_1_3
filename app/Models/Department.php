<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use App\Models\Doctor;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'description',
        'doctor_id',
    ];

    public function doctors()
    {
        return $this->belongsToMany('App\Models\Doctor');
        //return $this->hasmany(Doctor::class);
    }
}
