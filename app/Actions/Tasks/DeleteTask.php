<?php

namespace App\Actions\Tasks;

use App\DTOs\Tasks\DeleteTaskDTO;
use App\Models\Task;

class DeleteTask
{
    /**
     * @param DeleteTaskDTO $dto
     * @return mixed
     */
    public function handle(DeleteTaskDTO $dto): Task
    {
        return Task::find($dto->taskId)->delete();
    }
}
