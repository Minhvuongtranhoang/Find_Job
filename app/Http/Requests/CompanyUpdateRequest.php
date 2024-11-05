<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'website' => 'nullable|url|max:255',
      'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'phone' => 'nullable|string|max:20',
      'industry' => 'nullable|string|max:255',
      'employee_count' => 'nullable|integer|min:1',
      'description' => 'nullable|string',
      'locations.*.address' => 'nullable|string|max:255',
      'locations.*.google_maps_link' => 'nullable|url|max:255',
    ];
  }
}
