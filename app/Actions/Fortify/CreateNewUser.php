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
use Symfony\Polyfill\Mbstring\Mbstring;
use Illuminate\Support\Facades\Auth;

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
            'license_number' => 'nullable|unique:users,license_number|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ]);
        $validator->setCustomMessages([
            'license_number.exists' => "Le numéro de licence n'existe pas ou est déjà utilisé.",
            'email.unique' => "L'adresse email est déjà utilisée.",
            'birth_date.before' => "Vous devez avoir au moins 12 ans pour vous inscrire.",
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
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
