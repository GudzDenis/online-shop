<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\type;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    public function types()
    {
        return $this->belongsTo(type::class);
    }

    use HasFactory;
}
