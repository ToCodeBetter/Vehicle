<?php

namespace App\Models\User;



trait Store
{
    public function StoreUser($name, $password)
    {
        $this->setUserName($name)->setUserPassword($password)->save();
    }

}
