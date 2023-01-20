<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseStoreRequest;
use App\Models\City;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HouseController extends Controller
{
    public function index()
    {
        Auth::user()->load('houses');

        return view('houses/houses', ['houses' => Auth::user()->houses]);
    }

    public function create()
    {
        return view('houses/house-create');
    }

    public function store(HouseStoreRequest $request)
    {
        $cityId = null;

        if ($request->input('city')) {
            $cityId = City::where([
                'full_name' => $request->input('city')
            ])->first()->id;
        }

        $house = House::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'city_id' => $cityId,
            'address' => $request->input('address'),
        ]);

        $house->users()->attach(Auth::id(), ['user_role' => 'owner']);

        return redirect()->action([HouseController::class, 'index']);
    }

    public function edit($id)
    {
        $house = Auth::user()->houses->find($id);
        $house->load('users');

        return view('houses/house-edit', ['house' => $house]);
    }

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

    public function destroy($id)
    {
        $house = Auth::user()->houses->find($id);

        if ($house) {
            $house->delete();
        }

        return redirect()->action([HouseController::class, 'index']);
    }
}
