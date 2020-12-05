<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Models\User\UserEloquent;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private $jumpAfterStore = 'user/show';

    //
    public function store(User $user, UserRequest $request)
    {
        try {
            $user->storeUser($request->user_name, $request->user_password);

        } catch (\Exception $e) {
            return $this->backWithError($e);
        }
        return $this->redirectToHome();
    }

    public function show(User $user)
    {
        $data = $user->allUser();
        return view('user.show', compact('data'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->only(['user_name', 'user_password', 'id']);
        try {
            $user->updateUserById($request->id, $data);
        } catch (\Exception $e) {
            return $this->backWithError($e);
        }
        return $this->redirectToHome();
    }

    public function edit(User $user, UserRequest $request)
    {
        $data = $user->getUserById($request->id);
        $data = $data->first();
        return view('user.edit', compact('data'));
    }
    public function delete(User $user,UserRequest $request)
    {
        try{
            $user->deleteUserById($request->id);
        }catch (\Exception $e){
            return $this->backWithError($e);
        }
        return $this->redirectToHome();
    }

    protected function redirectToHome()
    {
        return redirect($this->jumpAfterStore);
    }

    protected function backWithError($e)
    {
        return back()->withErrors($e->getMessage())->withInput();
    }
}
