<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductFormRequest extends FormRequest
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
        $id = $this->segment(3);

        return [
            'name'          => "required|min:3|max:100|unique:products,name,{$id},id",
            'url'           => "required|min:3|max:100|unique:products,url,{$id},id",
            'price'         => 'required',
            'description'   => 'max:9000',
            'category_id'   => 'required|exists:categories,id',
        ];
    }
}
