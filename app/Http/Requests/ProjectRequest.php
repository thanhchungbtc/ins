<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'category_id' => 'required|not_in:0',
            'photo' => 'max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required',
            'category_id.not_in' => 'You must select a category',
            'photo.max' => 'File size is too large, please choose file that less than 2MB'
        ];
    }

    public function all()
    {
        $data = parent::all();

        if (!empty($data['complete'])) {
            $data['complete'] = date('Y-m-d H:i:s', strtotime($data['complete']));
        } else {
            $data['complete'] = NULL;
        }
        $data['price'] = empty($data['price']) ? 0 : $data['price'];
        return $data;
    }

}
