<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUpdateProductRequest extends FormRequest
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

        $id = $this->segment(2); //A id que manda na URL http://laravel-repositories.test/produtos2/101/edit '101' é ID, criaremos então uma exceção no return
        return [
            'name' => "required|min:3|max:50|unique:products,name,{$id},id", //,name é o campo da exceção, comparando com a ID que recebeu
            'description' => 'nullable|min:3|max:50000',     
            'price' => "required", // máscar para dinheiro
            'image' => 'image',
        ];
    }

    public function messages()
    {
       return [
        'name.required' => 'Nome é obrigatório',
        'name.min' => 'Ops! Precisa informar pelo menos 3 caracteres',
        'image.required' => 'Ops! é necessário enviar uma foto',
        'price.required' => 'Ops! é necessário informar um preço',
       ];
    }
}
