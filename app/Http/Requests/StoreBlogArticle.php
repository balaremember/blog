<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Article;

class StoreBlogArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Article::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|max:32',
            'body' => 'required'
        ];
    }
}
