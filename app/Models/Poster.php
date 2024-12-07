<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Poster extends Model
{
    use HasFactory;

    public static string $no_image_sm = '/storage/noimg/noimg_sm.webp';
    public static string $no_image_lg = '/storage/noimg/noimg_lg.webp';
    protected $fillable = [
        'id',
        'film_id',
        'path_sm',
        'path_lg',
        'url_sm',
        'url_lg',
        'width_sm',
        'width_lg',
        'height_sm',
        'height_lg',
        'status'
    ];

    public function product(): belongsTo
    {
        return $this->belongsTo(Film::class);
    }
}
