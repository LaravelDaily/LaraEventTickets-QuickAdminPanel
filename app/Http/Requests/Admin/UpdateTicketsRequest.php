<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketsRequest extends FormRequest
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
            
            'event_id' => 'required',
            'title' => 'required',
            'amount' => 'required',
            'available_from' => 'required|date_format:'.config('app.date_format'),
            'available_to' => 'required|date_format:'.config('app.date_format'),
            'price' => 'required',
        ];
    }
}
