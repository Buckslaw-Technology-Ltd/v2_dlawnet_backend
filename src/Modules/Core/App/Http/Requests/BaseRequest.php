<?php

namespace Modules\Core\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
}
