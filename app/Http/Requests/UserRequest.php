<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueInleft;

class UserRequest extends FormRequest
{
    protected $ruleArr =[
        'user/store' => 'storeRules',
        'user/edit' => 'editRules',
        'user/update' => 'updateRules',
        'user/delete' => 'deleteRules',

    ];
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $ruleArrr = $this->ruleArr;
        $route = $this->path();
        $f = $ruleArrr[$route];
        return $this->$f();
    }

    private function storeRules(){
        return [
            'user_name'=>'required|alpha_dash',
            'user_password'=>'required|alpha_dash|min:4'
        ];
    }
    private function editRules(){
        return [
            'id'=>['required','numeric'],
        ];
    }
    private function updateRules(){
        return $this->storeRules();
    }
    private function deleteRules()
    {
        return ['id'=>'required|numeric'];
    }
}
