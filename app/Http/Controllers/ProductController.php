<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSingleResource;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection(Product::paginate(16)); //pake paginate untuk membatasi jadi 16 per page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if ($request->price < 10000) {
            throw ValidationException::withMessages([
                'price' => 'Your price is too low',
            ]);
        }
        // 'slug' => strtolower(Str::slug($request->name. '-'. time())),  // kode disamping bisa dipindahin ke model bang dibikin function booted(sebuah method static)
        //     'name' => $request->name,    //semua request disamping diganti oleh $request->toArray karena emang to array nampilin yang sama kaya kalo ditulis sendiri
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'category_id' => $request->category_id,
        // ]);

        $product = Product::create($request->toArray());

        return response()->json([
            'message' => 'Product was created',
            'product' => new ProductSingleResource($product),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductSingleResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
