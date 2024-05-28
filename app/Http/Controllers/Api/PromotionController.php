<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionResource;
use App\Http\Resources\ShowPromotionResource;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $promotions = Promotion::list();
        $promotions = PromotionResource::collection($promotions);
        return $promotions; //PromotionResource::collection($promotions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        Promotion::store($request);
        return ["success" => true, "Message" => "Category created successfully"];
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
        $promotion = Promotion::find($id);
        $promotion= new ShowPromotionResource($promotion);
        return ["success" => true, "data" =>$promotion];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Promotion::store($request, $id);
        return response()->json([
            "success" => true,
            "Message" => "Category updated successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $promotion = Promotion::find($id);
        $promotion->delete();
        return response()->json(["success" => true, "Message" => "Category deleted successfully"],200);
    }
}
