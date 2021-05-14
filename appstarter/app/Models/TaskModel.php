<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $allowedFields = ['title', 'body', 'data_to_finish', 'id_owner', 'id_category'];
    public function getTasks($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }
    public function getTaskList()
    {
        $db      = \Config\Database::connect();
        $query = $db->query("SELECT t.*, c.title as category_name, o.name as ownder_task FROM tasks as t 
			INNER JOIN categoryes as c ON t.id_category = c.id
			INNER JOIN owners_tasks as o ON t.id_owner = o.id");
        $results = $query->getResult();
        return $results;
    }
}
