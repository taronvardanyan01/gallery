<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Screen\AsSource;

class Image extends Model
{
    use AsSource, Attachable;

    protected $fillable = [
        'gallery_id',
        'path',
        'creator',
        'signature',
        'description',
    ];

//    protected array $allowedFilters = [
//        'user_id' => Where::class,
//        'short_name' => Like::class,
//        'full_name' => Like::class,
//        'text_for_playback' => Like::class,
//        'change_effect' => Like::class,
//        'change_image_interval' => Like::class,
//        'font' => Like::class,
//        'font_color' => Like::class,
//        'text_size' => Like::class,
//    ];

//    protected $allowedSorts = [
//        'user_id',
//        'short_name',
//        'full_name',
//        'text_for_playback',
//        'change_effect',
//        'change_image_interval',
//        'font',
//        'font_color',
//        'text_size'
//    ];
}
