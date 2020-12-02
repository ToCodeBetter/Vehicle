<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use Store, Delete, Update, Show;
    public $table = 'all_user';

    public function setUserPassword($password)
    {
        $this->user_password = md5($password);
        return $this;
    }

    public function setUserName($name)
    {
        $this->user_name = $name;
        return $this;
    }
//    public function ifNameUnique()
}
