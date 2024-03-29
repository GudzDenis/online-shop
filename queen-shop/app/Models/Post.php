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
        'type_id',
    ];

    public function types()
    {
        return $this->belongsTo(type::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    use HasFactory;
}
