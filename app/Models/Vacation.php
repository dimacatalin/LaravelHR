<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    use HasFactory;

    const TYPE_CASUAL = 'casual';
    const TYPE_SICK = 'sick';
    const TYPE_MATERNITY = 'maternity';

    protected $table = 'vacations';
    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'type',
        'description',
    ];

    const SELECT_TYPES = [
        self::TYPE_CASUAL   => 'Casual leave',
        self::TYPE_SICK => 'Sick leave',
        self::TYPE_MATERNITY => 'Maternity leave'
    ];

    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
