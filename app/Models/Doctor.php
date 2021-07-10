<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

//use App\Model\Department;

class Doctor extends Model
{
    use HasFactory, HasRoles, Loggable;

    protected $fillable = [
        'name',
        'email',
        'department_id',
        'role',
        'description',
        'image',
    ];

    public function departments()
    {
        //return $this->belongsTo(Department::class);
        return $this->belongsToMany('App\Models\Department', 'doctors_departments', 'doctor_id', 'department_id');
    }
}
