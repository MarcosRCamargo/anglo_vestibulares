<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    public function getTasks($slug = false)
{
    if ($slug === false)
    {
        return $this->findAll();
    }

    return $this->asArray()
                ->where(['slug' => $slug])
                ->first();
}
}