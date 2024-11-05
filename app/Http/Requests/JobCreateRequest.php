<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class JobCreateRequest extends FormRequest
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


  public function rules()
  {
    return [
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'requirements' => 'required|string',
      'benefits' => 'required|string',
      'working_hours' => 'required|string',
      'deadline' => 'nullable|date',
      'location' => 'required|string|max:255',
      'salary' => 'nullable|numeric',
    ];
  }
}
