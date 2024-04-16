<?php

namespace App\Models\Show;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Following extends Model
{
    use HasFactory;
    protected $table = 'user_show';
    protected $primaryKey = ['user_id', 'show_id'];

    protected $fillable = [
        'user_id',
        'show_id',
    ];
    public $incrementing = false;
    public $timestamps = false;

}
