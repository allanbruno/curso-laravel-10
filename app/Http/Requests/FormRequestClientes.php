<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestClientes extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $request = [];
        if ($this->method() == "POST" || $this->method() == "PUT") {
            return [
                'nome' => 'required',
                'email' => 'required',
                'endereco' => 'required',
                'logradouro' => 'required',
                'cep' => 'required',
                'bairro' => 'required'
            ];
        }
        return $request;
    }
}
