<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\OwnerModel;
use App\Models\TaskModel;
use CodeIgniter\Controller;

class Task extends Controller
{
	
	public function index($page = 'tasks')
	{

		$model = new TaskModel();

		$data['tasks'] = $model->getTaskList();

		echo view('templates/header', $data);
		echo view('pages/' . $page, $data);
		echo view('templates/footer', $data);
	}

	public function show($id)
	{

		$model = new TaskModel();
		if ($id === false) {
            return redirect()->back();
        }
		$modelTask  = new TaskModel();
		$modelCategory  = new CategoryModel();
		$modelOwner = new OwnerModel();

		$data['task'] = (object) $modelTask->find($id);
		$data['categoryes'] = $modelCategory->findAll();
		$data['owners'] =  $modelOwner->findAll();
		echo view('templates/header', $data);
		echo view('pages/task/task', $data);
		echo view('templates/footer', $data);
	}
	public function view($page = 'task', $id)
	{
		if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$modelTask  = new TaskModel();
		
		$data['task'] = (object) $modelTask->find($id);

		echo view('templates/header', $data);
		echo view('pages/task/edit', $data);
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
		echo view('templates/success', $data);
		echo view('templates/footer', $data);

		}
	}
	public function update()
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
			$data = [
				'title' => $this->request->getPost('title'),
				'body'  => $this->request->getPost('body'),
				'data_to_finish' => $this->request->getPost('data_to_finish'),
				'id_owner' => (int) $this->request->getPost('id_owner'),
				'id_category' => (int) $this->request->getPost('id_category'),
			];
			$id =(int) $this->request->getPost('id');
			// var_dump($id, $data);die;
			$model->update(
				$id,
				$data
				);
				$data['message'] ="Tarefa {$id} atualizada com sucesso";
		echo view('templates/header', $data);
		echo view('templates/success', $data);
		echo view('templates/footer', $data);

		}
	}
	public function add()	
	{
		
		$modelCategory  = new CategoryModel();
		$modelOwner = new OwnerModel();
		
		$data['categoryes'] = $modelCategory->findAll();
		$data['owners'] =  $modelOwner->findAll();

		echo view('templates/header', $data);
		echo view('pages/task/add', $data);
		echo view('templates/footer', $data);
	}
	public function edit($id)	
	{
		
		$modelTask  = new TaskModel();
		$modelCategory  = new CategoryModel();
		$modelOwner = new OwnerModel();

		$data['task'] = (object) $modelTask->find($id);
		$data['categoryes'] = $modelCategory->findAll();
		$data['owners'] =  $modelOwner->findAll();

		echo view('templates/header', $data);
		echo view('pages/task/edit', $data);
		echo view('templates/footer', $data);
	}
	
	public function delete($id)	
	{

		$modelTask  = new TaskModel();
		$modelTask->delete($id);
		$data = [
			'task' => $id,
			'message' => "Tarefa excluída"
		];

		echo view('templates/header', $data);
		echo view('templates/success', $data);
		echo view('templates/footer', $data);
	}
}
