<?php

namespace Modules\Bank\App\Http\Requests;

use Modules\Core\App\Http\Requests\BaseRequest;

class UploadTransactionProofOfPaymentRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'proof_of_payment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Allow only image files
            'reference_number' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'reference_number.required' => 'An image is required.',
            'proof_of_payment.required' => 'An image is required.',
            'proof_of_payment.image' => 'The file must be an image.',
            'proof_of_payment.mimes' => 'Only jpeg, png, jpg, and gif images are allowed.',
            'proof_of_payment.max' => 'The image size must not exceed 2MB.',
        ];
    }
}
