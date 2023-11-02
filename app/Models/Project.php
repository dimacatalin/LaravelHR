<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = [
        'name',
        'contracting_company',
        'position',
        'rate_per_month_per_employee',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'project_id');
    }

    public static function getProjectsForSelect()
    {

        return self::select(DB::raw("CONCAT(name,' ',position) AS name"), 'id')
            ->orderBy('name')
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }

}
