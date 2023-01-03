<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'district_name',
        'division_id',
        'status',
    ];
    /**
     * Get the division that owns the district.
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
