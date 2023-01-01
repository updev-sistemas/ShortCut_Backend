<?php

namespace App\Http\Requests\Link;

use App\Domains\Contracts\Requests\IRequestTransform;
use App\Domains\Contracts\ValueObjects\IValueObject;
use App\Domains\ValueObjects\LinkValueObject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LinkShowRequest extends FormRequest implements IRequestTransform
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    public function messages()
    {
        return parent::messages();
    }

    public function transform(): IValueObject
    {
        $target = new LinkValueObject();

        $target->slug = $this->get('slug',null);
        $target->id = $this->get('id',0);

        return $target;
    }
}
