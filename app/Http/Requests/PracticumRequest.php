<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracticumRequest extends FormRequest
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
//        dd($this->request);
        if ($this->method() == 'POST') {
            return [
                'laboratory_id' => 'required|exists:laboratories,id',
                'name' => 'required|string',
                'year' => 'required|integer|digits:4|min:' . date('Y'),
                'modules.*.name' => 'required|string',
                'modules.*.module_link' => 'required|string',
                'modules.*.video_link' => 'nullable|string',
                'modules.*.input_grade_duedate' => 'nullable|string',
                'modules.*.grade_publish_date' => 'required|string',
                'assessments.*.name' => 'required|string',
                'assessments.*.percentage' => 'required|integer',
                'assessments.*.duration' => 'required|integer',
                'assessments.*.question_count' => 'required|integer',
                'assessments.*.answer_type' => 'required|exists:mastercodes,code',
                'assessments.*.isOnline' => 'nullable|string',
                'assessments.*.isSoftFileQuestion' => 'nullable|string',
            ];
        } else {
            return [
                'laboratory_id' => 'required|exists:laboratories,id',
                'name' => 'required|string',
                'year' => 'required|integer|digits:4|min:' . date('Y'),
                'modules.*.id' => 'sometimes|string',
                'modules.*.name' => 'required|string',
                'modules.*.module_link' => 'required|string',
                'modules.*.video_link' => 'nullable|string',
                'modules.*.input_grade_duedate' => 'nullable|string',
                'modules.*.grade_publish_date' => 'required|string',
                'assessments.*.id' => 'sometimes|string',
                'assessments.*.name' => 'required|string',
                'assessments.*.percentage' => 'required|integer',
                'assessments.*.duration' => 'required|integer',
                'assessments.*.question_count' => 'required|integer',
                'assessments.*.answer_type' => 'required|exists:mastercodes,code',
                'assessments.*.isOnline' => 'nullable|string',
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'Wajib Diisi',
            'integer' => 'Harus Berupa Angka',
            'year.digits' => 'Tahun Harus :digits Digit',
            'year.min' => 'Tahun Tidak Boleh Kurang Dari Tahun Ini'
        ];
    }
}
