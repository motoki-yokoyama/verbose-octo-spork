<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //postに対するリレーション
    //1対多の関係なので、postsと、複数形にする
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function getByCategory(int $limit_count = 5)
    {
        return $this->posts()->with('category')->orderBy('updated_at','DESC')->paginate($limit_count);
    }
}


