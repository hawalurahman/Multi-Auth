<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class Event extends Model
{
    use HasFactory;
    use MediaAlly;

    protected $fillable = [
        'title', 'content', 'id_user', 'date', 'end_date', 'price', 'poster'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function transaction()
    {
        return $this->hasMany(EventTransaction::class);
    }

    
}
