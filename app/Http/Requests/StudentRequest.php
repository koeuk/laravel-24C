<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StudentRequest extends defaultRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
  
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       $rules = [
        'name' =>'required|string|min:3',
        'age' =>'required|integer',
        // 'province' =>'required',
        // 'score' =>'required',
        'phone' =>'required|string|unique:students,phone,NULL,id,deleted_at,NULL',  // student is name of table and phone is column in table
        // Rule::unique('students', 'phone')->ignore($studentId)->whereNull('deleted_at'),

       ];
       return $rules;
    }
}
