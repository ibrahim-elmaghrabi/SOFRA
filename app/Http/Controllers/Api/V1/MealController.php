<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Meal;
use App\Models\Restaurant;
use App\Http\Requests\MealRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MealResource;
use App\Repositories\Contracts\MealRepositoryContract;

class MealController extends Controller
{
    protected $meals;

    public function __construct(MealRepositoryContract $mealContract)
    {
        $this->meals= $mealContract;
    }

    public function index()
    {
        return httpResponse(1, "Success", MealResource::collection($this->meals->all()));
    }

    public function show(Restaurant $restaurant, Meal $meal)
    {
        return httpResponse(1, "Success", new MealResource($this->meals->findWhereFirst('restaurant_id', $restaurant->id)->find($meal->id)));
    }

    public function create(MealRequest $request)
    {
        $this->meals->create($request->validated()+['restaurant_id'=> auth()->user()->id]);
        return httpResponse(1, "Success");
    }

    public function update(Meal $meal, MealRequest $request)
    {
        $this->meals->update($meal->id, $request->validated());
        return httpResponse(1, "Success", $meal->fresh());
    }

    public function destroy(Meal $meal)
    {
        return ($this->meals->destroy($meal->id)) ? httpResponse(1, "Success") : 'error happened';
    }

}
