<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public static function generateSlug($name)
    {
        //esso sostituisce gli spazi con "-"
        $slug = Str::slug($name, '-');
        $count = 1;
        //controllo se esiste un slug(titolo) con lo stesso slug(titolo)
        //viene aggiunto -
        // 'slug'-> campo db
        // $slug->titolo
        while (Category::where('slug', $slug)->first()) {
            // $slug = Str::slug($name . '-' . $count . '-');
            $slug = Str::of($name)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }
}
