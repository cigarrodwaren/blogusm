<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'body',
        'category_id',
        'user_id',
        'slug',       
        'extract',
        'status' 
    ];

    //UNO A MUCHOS INVERSA
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //RELACION MUCHOS A MUCHOS
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //REALCION UNO A UNO POLIMORFICA
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }



    // Accesor para el extract
    public function getExtractAttribute()
    {
        return substr($this->body, 0, 150) . (strlen($this->body) > 150 ? '...' : '');
    }

}
