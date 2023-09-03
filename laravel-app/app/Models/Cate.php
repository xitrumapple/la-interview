<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cate extends Model
{
    use HasFactory;
    //protected $table = 'cates';
    protected $guarded = [];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'cate_id', 'id');
    }
}