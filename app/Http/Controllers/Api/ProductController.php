<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ShowProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::list();
        $products=ProductResource::collection($products);  
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //
        Product::store($request);
        return response()->json([
            'success' => true,
            'data' => true,
            'message' => 'product created successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::find($id);
        if ($product === null) {
        return response()->json(array('success' => false,'error' => 'product not found'));
        }else{
            return response()->json(['success' =>true,'data' => $product]);
        }
        // $product = Product::find($id);
        // $product = new ShowProductResource($product);
        // return response()->json(['success' => true, 'data' => $product], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {
        //
        Product::store($request,$id);
        return response()->json([
           'success' => true,
            'data' => true,
           'message' => 'product updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product =Product::find($id);
        // $product->delete();
        // if ($product==null) {
        //     return response()->json(array('success' => false,'error' => 'product not found'));
        // } else {
        //     return response()->json(['success' => true, 'data' => true, 'message' =>'products deleted successfully']);
        // }
        if ($product ==null) {
            return response()->json(array('success' => false,'error' => 'product not found'));
        }else {
            $product->delete();
            return response()->json(['success' => true, 'data' => true, 'message' =>'products deleted successfully']);
        }
    }
}
