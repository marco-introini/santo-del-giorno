<?php

namespace App\Http\Requests;

use Override;
use Illuminate\Foundation\Http\FormRequest;

class FindByDateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mese' => 'required|integer|between:1,12',
            'giorno' => 'required|integer|between:1,31',
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'mese.required' => 'Il campo mese è obbligatorio.',
            'mese.integer' => 'Il campo mese deve essere un numero intero.',
            'mese.between' => 'Il campo mese deve essere compreso tra 1 e 12.',
            'giorno.required' => 'Il campo giorno è obbligatorio.',
            'giorno.integer' => 'Il campo giorno deve essere un numero intero.',
            'giorno.between' => 'Il campo giorno deve essere compreso tra 1 e 31.',
        ];
    }

    #[Override]
    public function validationData(): ?array
    {
        return array_merge($this->request->all(), $this->route()->parameters());
    }
}
