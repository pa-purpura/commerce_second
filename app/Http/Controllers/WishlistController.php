<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::all();
        return view('admin.wishlist.index', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wishlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
            ],
            [
                'name.required' => 'Name is mandatory',
            ],
        );

        $data = $request->all();
        $data['user_id'] = 5;
        $new_wishlist = new Wishlist();
        $new_wishlist->fill($data)->save();

        if (array_key_exists('products', $data)) {
            $new_wishlist->products()->attach($data['products']);
        }

        return redirect()->route('admin.wishlist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $products = Wishlist::find($id)->products;
        return view('admin.wishlist.show', compact('wishlist', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        return view('admin.wishlist.edit', compact('wishlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->fill($data);
        $wishlist->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);

        if (array_key_exists('products', $data)) {
            $wishlist->products()->sync($data['products']);
        } else {
            $wishlist->products()->detach();
        }

        return redirect()->route('admin.wishlist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $whishlist = Wishlist::findOrFail($id);
        $whishlist->delete($id);

        return back();
    }
}