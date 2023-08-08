<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'vendor_id',
        'nik',
        'name',
        'jabatan',
        'jenis_kelamin',
        'tgl_masuk',
        'tgl_keluar',
        'tgl_lahir',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
