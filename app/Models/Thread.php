<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'body'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // Relación: Una pregunta pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relación: Una pregunta tiene muchas respuestas
    public function replies()
    {
        return $this->hasmany(Reply::class);
    }
}
