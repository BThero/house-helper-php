<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHouseInviteRequest;
use App\Http\Requests\DestroyHouseInviteRequest;
use App\Models\House;
use App\Models\HouseInvite;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Throwable;

class HouseInviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invites = HouseInvite::with('user', 'house')->where('user_id', Auth::user()->id)->get();

        return view('house-invites/house-invites', ['invites' => $invites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateHouseInviteRequest  $request
     * @return RedirectResponse
     */
    public function store(CreateHouseInviteRequest $request)
    {
        $username = $request->input('username');
        $house_id = $request->input('house_id');
        $house = House::where('id', $house_id)->first();
        $user = User::where('username', $username)->first();

        $invite = HouseInvite::create([
            'user_id' => $user->id,
            'house_id' => $house_id,
        ]);

        $message = 'Successfully invited user '.$user->username.' to join the house';

        return redirect()->back()->with('message', $message);
    }

    public function destroy(DestroyHouseInviteRequest $request, int $id)
    {
        $accepted = $request->input('accepted');
        $invite = HouseInvite::with('house')->where('id', $id)->first();

        if ($invite) {
            if ($accepted == 'yes') {
                try {
                    $invite->house->users()->attach(Auth::id(), ['user_role' => 'member']);
                } catch (Throwable $e) {
                }
            }

            $invite->delete();
        }

        return redirect()->action([HouseInviteController::class, 'index']);
    }
}
