<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

     //relación uno a muchos inversa

     public function user(){
        return $this->belongsto(User::class);
    }

    public function category(){
        return $this->belongsto(Category::class);
    }

    //relación muchos a muchos

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }


    //relacion polimorfica uno a uno
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
