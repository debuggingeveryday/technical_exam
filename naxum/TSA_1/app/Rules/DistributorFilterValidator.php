<?php

declare(strict_types=1);

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class DistributorFilterValidator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $query = User::query();

        if (is_numeric($value)) {
            $user_id = (int) $value;

            return $query->findOrFail($user_id)->exists();
        } else {
            $name = (string) $value;

            return $query->where('first_name', 'like', $name)
                ->orWhere('last_name', 'like', $name)
                ->exists();
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Distributor doesn\'t exist.';
    }
}
