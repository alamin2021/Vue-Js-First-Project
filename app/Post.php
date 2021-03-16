<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Post extends Model
{
    protected $fillable = ['user_id','category_id','title','content','thumbnail','status'];
    
    /**
     * Get the category that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select('id','name');
    }
}
