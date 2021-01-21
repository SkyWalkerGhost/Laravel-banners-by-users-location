<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    
    // Table name
    protected $table = 'visitors';

    // Primary key
    public $PrimaryKey = 'id';

    // timestamps
    public $timestamps  = TRUE;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
