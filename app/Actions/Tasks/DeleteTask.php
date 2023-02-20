<?php

namespace App\Actions\Tasks;

use App\DTOs\Tasks\DeleteTaskDTO;
use App\Models\Task;

class DeleteTask
{
    /**
     * @param int $taskId
     * @return boolean
     */
    public function handle(int $taskId): void
    {
        Task::find($taskId)->delete();
    }
}
