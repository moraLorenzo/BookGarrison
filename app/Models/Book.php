<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['book_name','book_genre','book_author','user_id'];
    protected $guarded = ['img'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
