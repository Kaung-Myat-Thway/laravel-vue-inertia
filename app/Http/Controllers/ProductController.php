<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return Inertia::render('Products/index', [
            'products' => Product::all()->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => asset('storage/' . $product->image),
                ];
            }),
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function create()
    {
        return Inertia::render('Products/create', [
            'products' => Product::all(),
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function store()
    {
        $image = Request::file('image')->store('products', 'public');
        Product::create([
            'name' => Request::input('name'),
            'image' => $image,
        ]);

        return Redirect::route('products.index');

    }

    /**
     * Undocumented function
     *
     * @param Product $product
     * @return void
     */
    public function edit(Product $product)
    {
        return Inertia::render('Products/edit', [
            'product' => $product,
            'image' => asset('storage/' . $product->image),
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Product $product
     * @return void
     */
    public function update(Product $product)
    {
        $image = $product->image;
        if (Request::file('image')) {
            Storage::delete('public/' . $product->image);
            $image = Request::file('image')->store('products', 'public');
        };

        $product->update([
            'name' => Request::input('name'),
            'image' => $image,
        ]);

        return Redirect::route('products.index');

    }

    /**
     * Undocumented function
     *
     * @param Product $product
     * @return void
     */
    public function destroy(Product $product)
    {
        Storage::delete('public/' . $product->image);
        $product->delete();
        return Redirect::route('products.index');
    }
}
