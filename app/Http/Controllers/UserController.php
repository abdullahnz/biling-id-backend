<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Validation\Rule;
use App\Constants\AuthConstants;
use App\Constants\HttpResponseCode as ResponseCode; 


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === config('user.roles.admin'))
        {
            $users = User::whereIn('role', ['psikolog', 'klien'])->get();
            return $this->success(['users' => $users]);
        }
        
        return $this->error([], AuthConstants::UNAUTHORIZED);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return $this->success(['user' => Auth::user()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request)
    {   
        $user = Auth::user();
        $data = $request->all();

        foreach (array_keys($request->rules()) as $field)
        {
            if (array_key_exists($field, $data))
                $user[$field] = $data[$field];
        }
        
        $user->updated_at = now();

        if (!$user->save())
            return $this->error([], AuthConstants::UPDATED_FAILED);

        return $this->success([], AuthConstants::UPDATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}