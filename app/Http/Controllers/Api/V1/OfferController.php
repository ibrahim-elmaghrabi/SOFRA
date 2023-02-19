<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Offer;
use App\Http\Requests\OfferRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Repositories\Contracts\OfferRepositoryContract;


class OfferController extends Controller
{
   protected $offers;

   public function __construct(OfferRepositoryContract $offerContract)
   {
      $this->offers = $offerContract ;
   }

   public function index()
   {
      return httpResponse(1, "Success", OfferResource::collection($this->offers->allByDate()));
   }

   public function show(Offer $offer)
   {
      return httpResponse(1, "Success", new OfferResource($this->offers->find($offer->id)));
   }

   public function create(OfferRequest $request)
   {
      $this->offers->create($request->validated() + ['restaurant_id'=> auth()->user()->id]);
      return httpResponse(1, "Success", $request->all());
   }

   public function update(Offer $offer, OfferRequest $request)
   {
      $this->offers->update($offer->id, $request->validated());
      return httpResponse(1, "Success");
   }

   public function destroy(Offer $offer)
   {
      $this->offers->destroy($offer->id);
      return  httpResponse(1, "Success");
   }

}
