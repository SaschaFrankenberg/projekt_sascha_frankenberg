<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'location',
        'organizer_id',
        'image_path',
        'image_alt',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'user_workshop');
    }
}
