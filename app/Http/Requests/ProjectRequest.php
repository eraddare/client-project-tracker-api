<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'clientName' => ['required', 'string', 'max:255'],
            'projectName' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'string', 'in:Planning,In Progress,On Hold,Completed'],
            'priority' => ['required', 'string', 'in:Low,Medium,High'],
            'startDate' => ['nullable', 'date'],
            'dueDate' => ['nullable', 'date', 'after_or_equal:startDate'],
        ];
    }

    public function messages(): array
    {
        return [
            'clientName.required' => 'Client name is required.',
            'projectName.required' => 'Project name is required.',
            'status.in' => 'Status must be Planning, In Progress, On Hold, or Completed.',
            'priority.in' => 'Priority must be Low, Medium, or High.',
            'dueDate.after_or_equal' => 'Due date cannot be earlier than start date.',
        ];
    }
}