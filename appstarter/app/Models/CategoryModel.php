<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    public function getCategoryes($id = false)
{
    if ($id === false)
    {
        return $this->findAll();
    }

    return $this->asArray()
                ->where(['id' => $id])
                ->first();
}
}