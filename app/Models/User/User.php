<?php

namespace App\Models\User;

class User
{
    protected $userEloquent;

    public function __construct(UserEloquent $userEloquent)
    {
        $this->userEloquent = $userEloquent;
    }

    public function allUser()
    {
        return $this->userEloquent->all();
    }

    public function getUserById($v)
    {
        return $this->userEloquent->whereId($v)->get();
    }

    public function StoreUser($user_name, $user_password)
    {

        if (!$this->userEloquent->ifUniqueName($user_name))
            throw new \Exception('用户名已存在');

        $data = compact('user_name', "user_password");
        $this->userEloquent->setData($data)->save();
    }

    public function updateUserById($id, $data)
    {
        if($id == 1)
            throw new \Exception('管理员不允许更改!');
        if (!$this->userEloquent->ifUniqueNameInLeft($id, $data['user_name']))
            throw new \Exception('用户名已存在');
        $data['user_password'] = $this->userEloquent->makePassword($data['user_password']);
        $this->userEloquent->whereId($data['id'])->update($data);
    }
    public function deleteUserById($id)
    {
        if($id == 1)
            throw new \Exception('管理员信息不允许修改!');
        $this->userEloquent->whereId($id)->delete();
    }
}
