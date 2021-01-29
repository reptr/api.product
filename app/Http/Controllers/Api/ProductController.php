<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function post(Request $request)
    {
        // eloquent
        $product = new Product(); //get model Product
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->active = $request->active;
        $product->description = $request->description;

        $product->save(); // save to database

        return response()->json([
            "message" => "Success",
            "data" => $product
        ]);
    }

    function get()
    {
        $data = Product::all();

        return response()->json([
            "message" => "Success",
            "data" => $data
        ]);
    }

    function getById($id)
    {
        $product = Product::where('id', $id)->get();

        return response()->json([
            "message" => "Success",
            "data" => $product
        ]);
    }

    function put($id, Request $request)
    {
        $product = Product::where('id', $id)->first();

        if ($product) {
            // ternary operator
            $product->name = $request->name ? $request->name : $product->name;
            $product->price = $request->price ? $request->price : $product->price;
            $product->quantity = $request->quantity ? $request->quantity : $product->quantity;
            $product->active = $request->active ? $request->active : $product->active;
            $product->description = $request->description ? $request->description : $product->description;

            return response()->json([
                "message" => "Update product " . $id . " success",
                "data" => $product
            ]);
        }

        return response()->json([
            "message" => "Product with id " . $id . " not found"
        ], 400);
    }

    function delete($id)
    {
        $product = Product::where('id', $id)->first();

        if ($product) {
            $product->delete();
            return response()->json([
                "message" => "DELETE product " . $id . " success"
            ]);
        }

        return response()->json([
            "message" => "Product with id " . $id . " not found"
        ], 400);
    }
}
