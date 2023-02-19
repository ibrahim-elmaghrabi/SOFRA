<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Comment;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Repositories\Contracts\CommentRepositoryContract;

class CommentController extends Controller
{
    protected $comments;

    public function __construct(CommentRepositoryContract $commentContract)
    {
        $this->comments = $commentContract;
    }

    public function index(Restaurant $restaurant)
    {
        return httpResponse(1, "Success", CommentResource::collection($this->comments
        ->findWhere('restaurant_id', $restaurant->id)));
    }

    public function show(Restaurant $restaurant, Comment $comment)
    {
        return httpResponse(1, "Success", new CommentResource($this->comments
        ->findWhereFirst('restaurant_id', $restaurant->id)->find($comment->id)));
    }

    public function create(CommentRequest $request)
    {
        $this->comments->create($request->validated()+['client_id'=> auth()->user()->id]);
        return httpResponse(1, "Success");
    }
}
