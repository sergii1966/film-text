<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    public static array $categories = [
        "Мелодрама", 'Детектив', 'Фентезі', 'Бойовик', 'Жахи'
    ];
    protected $fillable = ['name'];

    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class);
    }
}
