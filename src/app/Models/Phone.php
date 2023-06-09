<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $table = 'phone';

    protected $fillable = ['user_id', 'phone_number'];

    protected $guarded = ['id'];

    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}