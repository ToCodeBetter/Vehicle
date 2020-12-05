<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEloquent extends Model
{
    use HasFactory;
    public $table = 'all_user';

    public function setData($data)
    {
       foreach ($data as $k => $v)
           $this->$k = $v;
       return $this;
    }
    public function makePassword($password)
    {
        return md5($password);
    }

    public function userName()
    {
        return $this->user_name;
    }
    public function userRole()
    {
        return $this->role_name;
    }
    public function ifUniqueNameInLeft($id,$name)
    {
        $exist = $this->where('id','!=',$id)->where('user_name',$name)->exists();
        return !$exist;
    }
    public function ifUniqueName($name)
    {
        $exist = $this->where('user_name',$name)->exists();
        return !$exist;
    }

}
