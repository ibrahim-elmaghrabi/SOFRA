<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\CommentRepositoryContract;

class CommentRepository extends BasicRepository implements CommentRepositoryContract
{
    public function entity()
    {
        return Comment::class;
    }
}
