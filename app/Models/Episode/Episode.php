<?php

namespace App\Models\Episode;

use App\Models\Show\Show;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $table = 'episodes';
    protected $fillable = [
        'show_id',
        'episode_title',
        'video_url',
        'thumbnail_url'
    ];
    public function show() {
        $this->belongsTo(Show::class);
    }
    public $timestramps = true;
}
