<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'user' => ['required', 'string', 'max:30'],
			'text' => ['required', 'string', 'max:500']
		];
	}
}
