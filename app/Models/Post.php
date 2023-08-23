<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public static function getUsers(int $itemPerPage, string $searchTerm)
    {
        return Post::where('title', 'like', $searchTerm)
            ->orWhere('content', 'like', $searchTerm)
            ->orderByDesc('created_at')
            ->paginate($itemPerPage);
    }

    public static function getPostById(int|string $id)
    {
        return Post::findOrFail($id);
    }
}
