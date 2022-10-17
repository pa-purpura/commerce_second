<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //STORAGGIO DELL'IMMAINGE
        if ($request->file()) {
            if ($request->file('image')->getError() > 0) {
                return redirect()->route('admin.user.create')->with('error', 'Non puoi inserire questa immagine');
            }

            $image = 'img-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = Storage::putFileAs('users_images', $request->file('image'), $image);
        } else {
            $path = null; //src
            $image = null; //alt
        }


        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $new_user = new User();
        $new_user->img_name = $image;
        $new_user->img_path = $path;
        $new_user->fill($data)->save();

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $orders = User::findOrFail($id)->orders;
        $wishlists = User::findOrFail($id)->wishlists;
        return view('admin.user.show', compact('user', 'orders', 'wishlists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user )
    {
        /* $user = User::findOrFail($id); */

         //UPDATE DELL'IMMAGINE
         if ($request->hasfile('image')) {
            if ($user->img_name) {
                Storage::delete($user->img_path);
            }

            $image = 'img-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = Storage::putFileAs('users_images', $request->file('image'), $image);
        } else {

            if (is_null($user->img_name)) {
                $image = null;
                $path = null;
            } else {
                $image = $user->img_name;
                $path = $user->img_path;
            }
        }



        /* $user->fill($request->all()); */
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'img_name' => $image,
            'img_path' => $path,
        ]);
        
        return redirect()
            ->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (Storage::disk('local')->exists('users_images/' . $user->img_name)) {
            Storage::disk('local')->delete('users_images/' . $user->img_name);
        }

        $user->delete($id);

        return back();
    }
}
