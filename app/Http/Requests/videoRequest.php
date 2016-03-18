<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class videoRequest extends Request {

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

		switch($this->method())
		{
			case 'GET':
			{
				return [
					//
				];
			}

			case 'DELETE':
			{
				return [
					//
				];
			}

			case 'POST':
			{
				return [
					//
					"video_type"			=>		"required",
					"video_path"			=>		"required",
					"video_name"			=>		"required",
				];
			}

			case 'PUT':
			{
				return [
					//
					"title"					=>		"required",
					"publisher"			=>		"required",
				];
			}

			case 'PATCH':
			{
				return [
					//
				];
			}
			default:break;
		}

	}

}
