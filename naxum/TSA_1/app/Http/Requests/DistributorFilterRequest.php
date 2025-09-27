<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\DistributorFilterValidator;
use Illuminate\Foundation\Http\FormRequest;

class DistributorFilterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // TODO: remove

        return [
            'distributor' => [new DistributorFilterValidator()],
            'date_from' => ['date', 'date_format:Y-m-d'],
            'date_to' => ['date', 'date_format:Y-m-d', 'after:date_from'],
            'limit' => ['integer'],
        ];
    }
}
