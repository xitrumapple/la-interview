<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    //protected $table = 'items';
    protected $guarded = [];
    public function cates(): BelongsTo
    {
        return $this->belongsTo(Cate::class, 'cate_id');
    }
}