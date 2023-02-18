<?php

namespace App\DTOs\Tasks;

use WendellAdriel\ValidatedDTO\Casting\IntegerCast;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

class DeleteTaskDTO extends ValidatedDTO
{
    public int $taskId;

    /**
     * Defines the validation rules for the DTO.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'taskId' => ['required', 'exists:tasks,id']
        ];
    }

    /**
     * Defines the default values for the properties of the DTO.
     *
     * @return array
     */
    protected function defaults(): array
    {
        return [];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'taskId' => new IntegerCast()
        ];
    }

    /**
     * Defines the custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Defines the custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [];
    }
}
