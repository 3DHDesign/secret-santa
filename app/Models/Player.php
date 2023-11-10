<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Player extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;

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
