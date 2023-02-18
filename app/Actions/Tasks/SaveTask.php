<?php

namespace App\Actions\Tasks;

use App\DTOs\Tasks\SaveTaskDTO;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class SaveTask
{
    /**
     * @param SaveTaskDTO $dto
     * @return mixed
     */
    public function handle(SaveTaskDTO $dto): Task
    {
        return Auth::user()->tasks()->create([
            'content' => $dto->content
        ]);
    }
}
