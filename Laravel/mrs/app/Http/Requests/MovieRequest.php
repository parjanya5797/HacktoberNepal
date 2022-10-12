<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'code' => $this->movie->code ?? rand(100000, 999999),
            'slug' => $this->movie->slug ?? Str::slug($this->name),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->movie->id ?? null;
        return [
            'code' => 'required|max:255|unique:movies,code,' . $id,
            'name' => 'required|max:255|unique:movies,name,' . $id,
            'slug' => 'required|max:255|unique:movies,slug,' . $id,
            'source' => 'required|max:255',
            'description' => 'nullable|max:5500',
            'image' => 'nullable|file|image|max:3000',
            'trailer' => 'nullable|max:255',
            'duration' => 'nullable|integer',
            'year' => 'nullable|integer',
            'country' => 'nullable|max:30',
            'quality' => 'nullable|max:4|numeric',
            'release_date' => 'nullable',
            'featured' => 'nullable|boolean',
        ];
    }
}
