<?php

namespace App\Http\Controllers;

use App\Http\Requests\KickUserRequest;
use Illuminate\Support\Facades\Auth;

class KickUserController extends Controller
{
    public function __invoke(KickUserRequest $request)
    {
        $id = $request->input('id');
        $user_id = $request->input('user_id');
        $house = Auth::user()->houses->find($id);

        if ($house && $house->pivot->user_role === 'owner') {
            $house->users()->detach($user_id);
        }

        return back();
    }
}
