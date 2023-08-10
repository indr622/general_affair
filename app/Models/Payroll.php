<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function scopeGroupByYear($query)
    {
        return $query->selectRaw('YEAR(updated_at) as year')
            ->groupBy('year')
            ->orderBy('year', 'desc');
    }
}
