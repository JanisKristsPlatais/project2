<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManhwaRequest extends FormRequest
{
    public function authorize(): bool
    {
		return true;

    }
	
    public function rules(): array
    {
        return [
			'name' => 'required|min:3|max:256',
			'author_id' => 'required',
			'description' => 'nullable',
			'price' => 'nullable|numeric',
			'year' => 'numeric',
			'image' => 'nullable|image',
			'display' => 'nullable',
			'tags' => 'array',
        ];
    }
	
	
	public function messages(){
		return [
			'required' => 'Lauks ":attribute" ir obligāts',
			'min' => 'Laukam ":attribute" jābūt vismaz :min simbolus garam',
			'max' => 'Lauks ":attribute" nedrīkst būt garāks par :max simboliem',
			'boolean' => 'Lauka ":attribute" vērtībai jābūt "true" vai "false"',
			'unique' => 'Šāda lauka ":attribute" vērtība jau ir reģistrēta',
			'numeric' => 'Lauka ":attribute" vērtībai jābūt skaitlim',
			'image' => 'Laukā ":attribute" jāpievieno korekts attēla fails',
		];
	}

	public function attributes(){
        return [
			'name' => 'nosaukums',
			'author_id' => 'autors',
			'description' => 'apraksts',
			'price' => 'cena',
			'year' => 'gads',
			'image' => 'attēls',
			'display' => 'publicēt',
        ];
    }
}
