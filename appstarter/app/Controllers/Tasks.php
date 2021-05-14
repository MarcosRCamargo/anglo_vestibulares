<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\OwnerModel;
use App\Models\TaskModel;
use CodeIgniter\Controller;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class Tasks extends Controller
{
	
	public function index()
	{
		$model = new TaskModel();

		$data['tasks'] = $model->getTaskList();
	}

	public function show($id)
	{
		$model = new TaskModel();
		if ($id === false) {
            return $model->findAll();
        }
		$data['task'] = $model->asArray()
		->where(['id' => $id])
		->first();
		echo view('templates/header', $data);
		echo view('pages/task', $data);
		echo view('templates/footer', $data);
	}
	public function view($page = 'tasks')
	{
		if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$taskModel = new TaskModel();
		$data['tasks'] = $taskModel->getTaskList();


		echo view('templates/header', $data);
		echo view('pages/' . $page, $data);
		echo view('templates/footer', $data);
	}
	public function create()
	{
		$model = new TaskModel();

		if ($this->request->getMethod() !== 'post') 
		{
			return redirect()->route('/');
		
		} 
		$validate = $this->validate([
			'title' => 'required|min_length[3]|max_length[128]',
			'body'  => 'required',
			'data_to_finish' => 'required',
			'id_owner' => 'required',
			'id_category' => 'required'
		]);
		if(!$validate){
			return redirect()->back()->withInput()->with('erro', $this->validate);
		}
		else {
			$data['task'] = [
				'title' => $this->request->getPost('title'),
				'body'  => $this->request->getPost('body'),
				'data_to_finish' => $this->request->getPost('data_to_finish'),
				'id_owner' => $this->request->getPost('id_owner'),
				'id_category' => $this->request->getPost('id_category'),
			];
			$model->save([
				'title' => $this->request->getPost('title'),
				'body'  => $this->request->getPost('body'),
				'data_to_finish' => $this->request->getPost('data_to_finish'),
				'id_owner' => $this->request->getPost('id_owner'),
				'id_category' => $this->request->getPost('id_category'),
			]);
		echo view('templates/header', $data);
		echo view('pages/success', $data);
		echo view('templates/footer', $data);

		}
	}
	public function addTask($page = 'add_task')
	{
		if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$categoryModel = new CategoryModel();
		$ownerModel = new OwnerModel();
		$data['owners'] = $ownerModel->getOwners();
		$data['categoryes'] = $categoryModel->getCategoryes();


		echo view('templates/header', $data);
		echo view('pages/' . $page, $data);
		echo view('templates/footer', $data);
	}
	public function edit($id)	
	{

		$modelTask  = new TaskModel();
		
		$data['task'] =  $modelTask->find($id);

		echo view('templates/header', $data);
		echo view('pages/edit_task', $data);
		echo view('templates/footer', $data);
	}
}
