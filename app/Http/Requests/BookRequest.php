<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'title' => ['required', 'string', 'max:255', 'min:3'],
            'description' => ['nullable', 'string'],
            'author' => ['nullable', 'string', 'max:255'],
            'release_date' => ['nullable', 'date'],
            'rt_score' => ['nullable', 'numeric', 'gt:0', 'lt:6'],
            'image' => ['nullable', 'image'],
            'price' => ['required', 'max:1000' , 'min:0'],

            
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere almeno 3 caratteri',
            'title.max' => 'Il titolo può avere massimo 255 caratteri',
            'author.max' => 'Il produttore può avere massimo 255 caratteri',
            'release_date.date' => 'La data di uscita deve essere valida',
            'rt_score.numeric' => 'Il punteggio deve essere un numero',
            'rt_score.gt' => 'Il punteggio deve essere superiore a 0',
            'rt_score.lt' => 'Il punteggio deve essere massimo 10',
            'image.image' => 'Il file immagine deve essere un immagine',
            'price.max' => 'Il prezzo nnon puo avere un valore superiore a 1000',
            'price.min' => 'Il prezzo deve avere almeno un valore',
        ];
    }
}
