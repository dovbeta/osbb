<?php

namespace App\Http\Requests\Backend\Building\Flat;

use App\Http\Requests\Request;

/**
 * Class ImportFlatsRequest
 * @package App\Http\Requests\Backend\Building\Flat
 */
class ImportFlatsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('manage-flats');
    }
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        return [
            'excel'                  => 'required',
		];
	}
}
