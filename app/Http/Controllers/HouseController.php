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
        return view('houses/houses', ['houses' => House::all()]);
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
}
