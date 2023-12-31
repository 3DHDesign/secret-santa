<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GamePool extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['player_id', 'guest_id'];

    protected $searchableFields = ['*'];

    protected $table = 'game_pools';

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
    public function guestUser()
    {
        return $this->belongsTo(GuestUsers::class);
    }
}
