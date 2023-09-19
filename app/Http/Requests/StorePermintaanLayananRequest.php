<?php

namespace App\Http\Requests;

use App\Models\PermintaanLayanan;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class StorePermintaanLayananRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isRole(Role::SUPERADMIN) || $this->user()->can('create',PermintaanLayanan::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => ['required', 'string'],
            'email' => ['required', 'string'],
            'nmr_tlpon' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            //
        ];
    }
}
