<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;
    //protected $table = 'items';
    protected $guarded = [];
    public function cates(): BelongsTo
    {
        return $this->belongsTo(Cate::class, 'cate_id');
    }
    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(Invoice::class, "item_invoices")->withTimestamps();
    }
}