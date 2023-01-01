<?php

namespace App\Http\Requests\Store;

use App\Domains\Contracts\Requests\IRequestTransform;
use App\Domains\Contracts\ValueObjects\IValueObject;
use App\Domains\ValueObjects\StoreValueObject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreCreateRequest  extends FormRequest implements IRequestTransform
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
            'name' => [
                'required',
                'min:2',
                'max:100',
                Rule::unique('stores')->ignore($this->get('name'), 'name')
            ]
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => 'Obrigatório informar o nome.',
            'name.min' => 'Nome deve ter no mínimo 2 caracteres.',
            'name.max' => 'Nome deve ter no máximo 40 caracteres.',
            'name.unique' => 'Já existe uma categoria com esse nome.',
        ];
    }

    /**
     * @return IValueObject
     */
    public function transform(): IValueObject
    {
        $target = new StoreValueObject();

        $target->name = $this->get('name');
        $target->icon = 'default-icon.png';

        return $target;
    }
}
