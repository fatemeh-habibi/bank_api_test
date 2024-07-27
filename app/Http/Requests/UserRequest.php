<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * @var mixed|string[]
     */
    private $rules;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $route_name = $this->route()->getName();
        $title= explode('_', $route_name,2);
        $function = trim($title[1]);

        $this->offsetUnset('_method');
        switch ($function) {
            case 'store':
                   $this->rules = [
                    'mobile' => 'required|regex:(+98|0|98|0098)?([ ]|-|[()]){0,2}9[0-9]([ ]|-|[()]){0,2}(?:[0-9]([ ]|-|[()]){0,2}){8}/|unique:users',
                    'email' => 'nullable|sometimes|email|unique:users',
                    'password_confirmation' => 'required|string|min:6',
                    'password' => 'required|string|confirmed|min:6',
                    'first_name' => 'required|string',
                    'last_name' => 'required|string',
                    'image' => 'nullable',
                    'activated' => 'boolean'
                   ];
                break;
            default:
                break;
        }

        return $this->rules;
    }
}
