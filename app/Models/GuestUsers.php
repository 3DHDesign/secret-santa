<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestUsers extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['division_id', 'full_name'];

    protected $searchableFields = ['*'];

    protected $table = 'guest_users';

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
