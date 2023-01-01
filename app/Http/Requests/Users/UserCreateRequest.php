<?php

namespace App\Http\Requests\Users;

use App\Domains\Contracts\Requests\IRequestTransform;
use App\Domains\Contracts\ValueObjects\IValueObject;
use App\Domains\ValueObjects\UserValueObject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserCreateRequest extends FormRequest implements IRequestTransform
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true || Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:40',
            'email' => 'required|email|max:120|unique:users'
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => 'Obrigatório informar o nome.',
            'name.min' => 'Nome deve ter no mínimo 2 caracteres',
            'name.max' => 'Nome deve ter no máximo 40 caracteres',
            'email.required' => 'Obrigatório informar o email',
            'email.email' => 'required|email|max:120|unique:users',
            'email.max' => 'Email deve ter no máximo 120 caracteres',
            'email.unique' => 'Email já está registrado em nossa base de dados.'
        ];
    }

    /**
     * @return IValueObject
     */
    public function transform(): IValueObject
    {
        $target = new UserValueObject();

        $target->name = $this->get('name');
        $target->password = $this->get('password');
        $target->email = $this->get('email');

        return $target;
    }
}
