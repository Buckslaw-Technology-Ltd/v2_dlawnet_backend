<?php

namespace Modules\Core\App\Http\Requests\Auth;


use Modules\Core\App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|boolean',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone|max:15',
            'password' => 'required|string|min:8|confirmed',
            'accept_terms_and_condition' => 'required|boolean|in:1',
            'country_id' => 'required|integer',
            'state_id' => 'required|integer',
            'address' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'institution_type' => 'required|in:University,Law School',
            'year_of_admission' => 'required|integer|min:1900|max:' . date('Y'),
            'duration_of_study' => 'nullable|integer|min:1',
            'years_in_school' => 'nullable|integer|min:1',
            'profile_photo_path' => 'nullable|string|max:255',
            'cover_photo_path' => 'nullable|string|max:255',
            'date_of_call' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'gender.required' => 'Gender is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.unique' => 'This email is already in use.',
            'phone.required' => 'Phone number is required.',
            'phone.unique' => 'This phone number is already in use.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'accept_terms_and_condition.required' => 'You must accept the terms and conditions.',
            'address.required' => 'Address is required.',
            'institution.required' => 'Institution name is required.',
            'institution_type.required' => 'Institution type is required.',
            'year_of_admission.required' => 'Year of admission is required.',
            'year_of_admission.min' => 'Year of admission cannot be before 1900.',
            'duration_of_study.integer' => 'Duration of study must be an integer.',
            'years_in_school.integer' => 'Years in school must be an integer.',
            'profile_photo_path.string' => 'Profile photo path must be a string.',
            'cover_photo_path.string' => 'Cover photo path must be a string.',
            'san.boolean' => 'SAN must be a boolean value.',
            'summary.string' => 'Summary must be a string.',
            'facebook.url' => 'Facebook URL must be valid.',
            'linkedin.url' => 'LinkedIn URL must be valid.',
            'twitter.url' => 'Twitter URL must be valid.',
            'instagram.url' => 'Instagram URL must be valid.',
            'firm_position.string' => 'Firm position must be a string.',
            'verification_passed.boolean' => 'Verification passed must be a boolean.',

        ];
    }
}
