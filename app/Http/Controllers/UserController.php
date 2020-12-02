<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private $jumpAfterStore = '/';

    //
    public function store(User $user, UserRequest $request)
    {
        $user->storeUser($request->user_name, $request->user_password);
        return redirect($this->jumpAfterStore);
    }
}
