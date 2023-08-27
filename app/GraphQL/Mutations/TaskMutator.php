<?php

namespace App\GraphQL\Mutations;

use App\Models\Tasks;

final class TaskMutator
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function create ($_, array $args)
    {
        $args["status"] = "Not Started";
        
        return auth()->user()->tasks()->create($args);
    }
}
