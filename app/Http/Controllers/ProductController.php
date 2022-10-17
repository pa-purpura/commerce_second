<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $products = Product::orderBy('id', 'DESC')->get();

        return view('admin.products.index', compact('products'));
    }

    public function detachWishlist($wishlist_id, $product_id)
    {
        $product = Product::find($product_id);
        $product->wishlists()->detach($wishlist_id);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required',
            'price' => 'nullable',
            'stok' => 'nullable',
        ], [
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il nome non può avere più di 50 caratteri',
            'description.required' => 'La descrizione è obbligatoria',
        ]);

        $data = $request->all();



        //STORAGGIO DELL'IMMAINGE
        if ($request->file()) {
            if ($request->file('image')->getError() > 0) {
                return redirect()->route('admin.posts.create')->with('error', 'Non puoi inserire questa immagine');
            }

            $image = 'img-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = Storage::putFileAs('products_images', $request->file('image'), $image);
        } else {
            $path = null; //src
            $image = null; //alt
        }

        $new_product = new Product();
        $new_product->img_name = $image;
        $new_product->img_path = $path;
        $new_product->fill($data);
        $new_product->save();

        return redirect()->route('admin.products.index')->with('success', "Il prodotto $new_product->name è stato aggiunto");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =Product::findOrFail($id);

        $wishlists = Product::find($id)->wishlists;
        // dd($wishlists);
        $wishlistOff = Wishlist::whereDoesntHave('products', function (Builder $query) use($id) {
            $query->where('product_id', $id);
        })->get();

        return view('admin.products.show', compact('product', 'wishlistOff', 'wishlists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
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
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required',
            'price' => 'nullable',
            'stock' => 'nullable',
        ], [
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il nome non può avere più di 50 caratteri',
            'description.required' => 'La descrizione è obbligatoria',
        ]);

        //UPDATE DELL'IMMAGINE
        if ($request->hasfile('image')) {
            if ($product->img_name) {
                Storage::delete($product->img_path);
            }

            $image = 'img-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = Storage::putFileAs('products_images', $request->file('image'), $image);
        } else {

            if (is_null($product->img_name)) {
                $image = null;
                $path = null;
            } else {
                $image = $product->img_name;
                $path = $product->img_path;
            }
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'img_name' => $image,
            'img_path' => $path,
        ]);

        return redirect()->route('admin.products.index')->with('success', "Il prodotto $product->name è stato aggiornato");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (Storage::disk('local')->exists('products_images/' . $product->img_name)) {
            Storage::disk('local')->delete('products_images/' . $product->img_name);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', "Il prodotto $product->name è stato eliminato");
    }

    public function seeReviews($product){
        $product = Product::findOrFail($product);
        $reviews = Product::find($product->id)->reviews;
        return view('admin.products.seeReviews', compact('product', 'reviews'));
    }
}
