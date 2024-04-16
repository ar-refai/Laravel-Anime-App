<?php

namespace App\Models\Show;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Show extends Model
{
    use HasFactory;

    protected $table = 'shows';
    protected $fillable = [
        "name",
        "image",
        "description",
        "type",
        "studios",
        "date_aired",
        "status",
        "genere",
        "duration",
        "quality"

    ];
    public $timestamps = true;
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}
