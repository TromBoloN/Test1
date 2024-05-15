<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submissions extends Model
{
    use HasFactory;

    protected $primaryKey = 'NIS';

    protected $fillable = [
        'user_id',
        'NIS',
        'file_path',
        'mapel'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
