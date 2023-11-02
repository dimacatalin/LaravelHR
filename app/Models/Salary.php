<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    const TYPE_MONTHLY = 'monthly';
    const TYPE_YEARLY = 'yearly';
    protected $table = 'salaries';
    protected $fillable = [
        'position',
        'gross_amount',
        'type',
    ];

    const SELECT_TYPES = [
        self::TYPE_MONTHLY   => 'Monthly',
        self::TYPE_YEARLY => 'Yearly'
    ];


    public function employees()
    {
        return $this->hasMany(Employee::class, 'salary_id');
    }

    public static function getSalariesForSelect()
    {
        return self::orderBy('position')->get()->pluck('position', 'id')->toArray();
    }
}
