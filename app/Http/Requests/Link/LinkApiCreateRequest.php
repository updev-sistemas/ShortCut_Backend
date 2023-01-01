<?php

namespace App\Http\Requests\Link;

use App\Domains\Contracts\Requests\IRequestTransform;
use App\Domains\Contracts\ValueObjects\IValueObject;
use App\Domains\ValueObjects\LinkValueObject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LinkApiCreateRequest extends FormRequest implements IRequestTransform
{
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
        return [
            "category_id" => "nullable|exists:category,id",
            "store_id" => "nullable|exists:stores,id",
            "url" => "required|url|max:2100"
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            "category_id" => "Categoria não existe.",
            "store_id" => "Loja não existe.",
            "url.required" => "Informe a URl",
            "url.url" => "Url inválida.",
            "url.max" => "Url longa."
        ];
    }

    public function prepareForValidation()
    {
        try
        {
            $_storeId = decrypt($this->get('store_id',0));
            $this->merge(['store_id' => $_storeId]);

            unset($storeId);
            unset($_storeId);
        }
        catch (\Exception $ex)
        {
            unset($ex);
        }

        try
        {
            $_categoryId = decrypt($this->get('category_id',0));
            $this->merge(['category_id' => $_categoryId]);

            unset($categoryId);
            unset($_categoryId);
        }
        catch (\Exception $ex)
        {
            unset($ex);
        }

        $this->merge(['user_id' => Auth::id()]);
    }

    /**
     * @return IValueObject
     */
    public function transform(): IValueObject
    {
        $target = new LinkValueObject();

        $target->user_id = $this->get('user_id',null);
        $target->category_id = $this->get('category_id',null);
        $target->store_id = $this->get('store_id',null);
        $target->url = $this->get('url',null);

        return $target;
    }
}
