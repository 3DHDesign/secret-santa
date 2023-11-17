<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestUsers extends Model
{
    use HasFactory;
    protected $fillable = ['division_id', 'full_name'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
