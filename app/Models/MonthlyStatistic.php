<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class MonthlyStatistic extends Model
{
    use HasFactory;

    protected $table = 'monthly_statistics';

    protected $fillable = [
        'amount_earned',
        'amount_spent',
        'metadata',
        'date',
    ];

}
