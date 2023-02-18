<?php

namespace App\Actions\Tasks;

use App\DTOs\Tasks\FetchTasksDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class FetchTasks
{
    /**
     * @param FetchTasksDTO $dto
     * @return mixed
     */
    public function handle(FetchTasksDTO $dto): Collection
    {
        return Auth::user()->tasks;
    }
}
