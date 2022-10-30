<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => ["required", "string", "unique:news,title"],
            "content" => ["required", "string", "unique:news,content"],
            "author" => ["required", "integer", "exists:users,no"],
            "category" => ["required", "integer", "exists:categories,no"],
            "resourceUrl" => ["required", "string", "unique:resource_urls,url"],
            "resourcePlatform" => ["required", "integer", "exists:resource_platforms,no"],
            "publishStatus" => ["required", Rule::in(['task', 'published', 'planned'])],
            "publishDate" => ["nullable", "date_format:Y-m-d/H:i:s"],
        ];
    }
}
