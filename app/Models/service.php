<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categorie;

class Service extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'description',
        'title',
        'img',
        'date',
        'category_id',
        'user_id',
        'price',
    ];

    public function categorie(){
        return $this->belongsTo(categorie::class,'category_id');
    }
}
