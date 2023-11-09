<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    use Searchable;
    use Authenticatable;

    protected $fillable = ['division_id', 'full_name', 'number', 'password'];

    protected $searchableFields = ['*'];

    protected $hidden = ['password'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function gamePools()
    {
        return $this->hasMany(GamePool::class);
    }
}
