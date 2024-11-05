<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class JobUpdateRequest extends FormRequest
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
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'location' => 'required|string|max:255',
      'salary' => 'nullable|numeric',
      'company' => 'required|string|max:255',
      'type' => 'required|string|in:full-time,part-time,contract',
    ];
  }
}
