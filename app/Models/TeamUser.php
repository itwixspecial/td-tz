<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamUser extends Model
{
    use HasFactory;

    protected $table = 'team_user';

    protected $fillable = [
        'teamlead_id',
        'buyer_id',
    ];

    public function teamlead(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teamlead_id');
    }

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
