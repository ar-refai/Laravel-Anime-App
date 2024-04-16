<?php

namespace App\Models\Show;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'content',
    ];
    public $timestamps = true;
    // Defining relationships
    // public function user() : HasOne {
    //     return $this->hasOne(User::class ,'foreign_key');
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function show() : HasOne {
    //     return $this->hasOne(Show::class , 'foreign_key');
    // }
    public function show()
    {
        return $this->belongsTo(Show::class);
    }

}
