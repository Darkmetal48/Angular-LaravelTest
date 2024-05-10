<?php

namespace App\Http\Requests;

use App\Models\Employees;
use App\Rules\AlphaAsciiWithSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Validation\Rule;

class UpdateEmployeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required', 'numeric', 'exists:employees,id'],
            'first_surname' => ['required','uppercase','max:20', new AlphaAsciiWithSpaces],
            'second_surname' => ['required','uppercase','max:20', new AlphaAsciiWithSpaces],
            'first_name' => ['required','uppercase','max:20', new AlphaAsciiWithSpaces],
            'middle_name' => ['uppercase','max:50', new AlphaAsciiWithSpaces],
            'job_country' => 'required',
            'id_type' => 'required',
            'id_number' => ['required','alpha_dash',
                            Rule::when(
                                function(){
                                    $result = Employees::where('id', $this->input('id'))->first();
                                    return $result['id_number'] == $this->input('id_number');
                                },
                                '',
                                'unique:employees,id_number'
                            )
                            ,'max:20'],
            'email' => 'prohibited',
            'date_of_entry' => 'required|date|after_or_equal:' . now()->subMonth()->format('Y-m-d') . '|before_or_equal:' . now()->format('Y-m-d'),
            'deparment' => 'required',
            'state' => 'prohibited'
        ];
    }
}
