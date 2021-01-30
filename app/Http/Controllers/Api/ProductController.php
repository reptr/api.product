<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; //import Product model

class ProductController extends Controller
{
    /**
     * Add data product
     *
     * @param Request $request
     * @return json
     */
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

        // return json
        return response()->json([
            "message" => "Success",
            "data" => $product
        ]);
    }

    /**
     * Get data product
     *
     * @return json
     */
    function get()
    {
        $data = Product::all(); //get all data in table product

        // return json
        return response()->json([
            "message" => "Success",
            "data" => $data
        ]);
    }

    /**
     * Get data product by id
     *
     * @param int $id id product
     * @return json
     */
    function getById($id)
    {
        $product = Product::where('id', $id)->first(); //get product by id product

        if ($product) {
            // return json
            return response()->json([
                "message" => "Success",
                "data" => $product
            ]);
        }

        // if search not found, return json
        return response()->json([
            "message" => "Product with id " . $id . " not found"
        ], 400);
    }

    /**
     * Update data product by id
     *
     * @param int $id id product
     * @param Request $request
     * @return json
     */
    function put($id, Request $request)
    {
        $product = Product::where('id', $id)->first(); //search product by id product

        if ($product) {
            // ternary operator
            $product->name = $request->name ? $request->name : $product->name;
            $product->price = $request->price ? $request->price : $product->price;
            $product->quantity = $request->quantity ? $request->quantity : $product->quantity;
            $product->active = $request->active ? $request->active : $product->active;
            $product->description = $request->description ? $request->description : $product->description;

            $product->save(); // save to database

            // return json
            return response()->json([
                "message" => "Update product " . $id . " success",
                "data" => $product
            ]);
        }

        // if search not found, return json
        return response()->json([
            "message" => "Product with id " . $id . " not found"
        ], 400);
    }

    /**
     * Delete data product by id
     *
     * @param int $id id product
     * @return json
     */
    function delete($id)
    {
        $product = Product::where('id', $id)->first();

        if ($product) {
            $product->delete(); //delete data in database

            // return json
            return response()->json([
                "message" => "DELETE product " . $id . " success"
            ]);
        }

        // if search not found, return json
        return response()->json([
            "message" => "Product with id " . $id . " not found"
        ], 400);
    }
}
