<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductImport;
use Error;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            Product::NAME => $request->name,
            Product::CALORIES => $request->calories,
            Product::PROTEINS => $request->proteins,
            Product::CARBS => $request->carbs,
            Product::LIPIDS => $request->lipids
        ]);

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $productId)
    {
        $product = Product::find($productId);

        if(!$product) {
            throw new Error(
                "Produto não encontrado",
                Response::HTTP_NOT_FOUND
            );
        }

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, int $productId)
    {
        $product = Product::find($productId);

        if(!$product) {
            throw new Error(
                "Produto não encontrado",
                Response::HTTP_NOT_FOUND
            );
        }

        $product->update([
            Product::NAME => $request->name,
            Product::CALORIES => $request->calories,
            Product::PROTEINS => $request->proteins,
            Product::CARBS => $request->carbs,
            Product::LIPIDS => $request->lipids
        ]);

        $product->refresh();

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $productId)
    {
        $product = Product::find($productId);

        if(!$product) {
            throw new Error(
                "Produto não encontrado",
                Response::HTTP_NOT_FOUND
            );
        }

        $product->delete();

        return response('', Response::HTTP_OK);
    }

    public function import(Request $request)
    {
        $products = $request->file('produtos');

        (new ProductImport)->import( $products, null, \Maatwebsite\Excel\Excel::XLSX);

        return response('', Response::HTTP_OK);
    }
}
