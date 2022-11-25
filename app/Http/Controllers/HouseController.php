<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->load('houses');
        return view('houses/houses', ['houses' => Auth::user()->houses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('houses/house-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:255'],
            'description' => ['max:255'],
        ]);

        $house = House::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $house->users()->attach(Auth::id(), ['user_role' => 'owner']);

        return redirect()->action([HouseController::class, 'index']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $house = Auth::user()->houses->find($id);
        $house->load('users');
        return view('houses/house-edit', ['house' => $house]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:255'],
            'description' => ['max:255'],
        ]);

        $house = Auth::user()->houses->find($id);
        $house->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        $house->save();

        return redirect()->action([HouseController::class, 'index']);
    }

    public function show($id)
    {
        $house = Auth::user()->houses->find($id);
        return view('houses/house', ['house' => $house, 'me' => Auth::user()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $house = Auth::user()->houses->find($id);

        if ($house) {
            $house->delete();
        }

        return redirect()->action([HouseController::class, 'index']);
    }
}
