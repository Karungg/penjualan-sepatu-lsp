<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank',
        'behalf_of',
        'account_number'
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'account_id', 'id');
    }
}
