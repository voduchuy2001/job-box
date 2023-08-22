<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
    ];

    public static function getUsers(int $itemPerPage, string $searchTerm)
    {
        return Post::where('title', 'like', $searchTerm)
            ->orWhere('content', 'like', $searchTerm)
            ->orderByDesc('created_at')
            ->paginate($itemPerPage);
    }

    public static function getUserById(int|string $id)
    {
        return Post::findOrFail($id);
    }
}
