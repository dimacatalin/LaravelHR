<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'salary_id',
        'project_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'is_active',
    ];

    public static function getEmployeesForSelect()
    {
        return self::select(DB::raw("CONCAT(first_name,' ',last_name) AS name"), 'id')
            ->orderBy('name')
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }

    public function vacations()
    {
        return $this->hasMany(Vacation::class, 'employee_id');
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
