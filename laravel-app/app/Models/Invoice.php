<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, "item_invoices")->withTimestamps();
    }
}