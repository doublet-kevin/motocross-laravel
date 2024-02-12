<?php

namespace App\Actions\Fortify;

use App\Models\License;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Validation\ValidationException;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        $validator = Validator::make($input, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:5',
            'birth_date' => 'required|string|max:255',
            'license_number' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique(User::class), // Assurez-vous que la licence est unique parmi les utilisateurs
                function ($attribute, $value, $fail) {
                    $list_licence = License::all();
                    $license_numbers = $list_licence->pluck('license_number')->toArray();

                    if (!in_array($value, $license_numbers)) {
                        $fail('La licence n\'existe pas.');
                    }
                },
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        return User::create([
            'firstname' => $input['firstname'],
            'lastname' => $input['lastname'],
            'region' => $input['region'],
            'city' => $input['city'],
            'postal_code' => $input['postal_code'],
            'birth_date' => $input['birth_date'],
            'license_number' => $input['license_number'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => 1,
            'club_id' => 1,
        ]);
    }
}
