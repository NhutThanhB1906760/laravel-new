<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    // Định nghĩa các thuộc tính và phương thức của model ở đây
    protected $table = 'products';

    protected $fillable = ['name', 'description', 'image'];

    protected $guarded = ['id'];

    public $timestamps = false;

}