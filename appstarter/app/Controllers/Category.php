<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Controller;

class Category extends Controller
{
	
	public function index($page = 'categoryes')
	{
		$model = new CategoryModel();

		$data['tasks'] = $model->getCategoryes();


		echo view('templates/header', $data);
		echo view('pages/' . $page, $data);
		echo view('templates/footer', $data);
	}

	public function show($id)
	{
		$model = new CategoryModel();
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
	public function view($page = 'task')
	{
		if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$taskModel = new CategoryModel();
		$data['categoryes'] = $taskModel->getCategoryes();


		echo view('templates/header', $data);
		echo view('pages/' . $page, $data);
		echo view('templates/footer', $data);
	}
	public function create()
	{
		$categoryModel = new CategoryModel();

		if ($this->request->getMethod() !== 'post') 
		{
			return redirect()->route('/');
		
		} 
		$validate = $this->validate([
			'title' => 'required|min_length[3]|max_length[128]',
		]);
		if(!$validate){
			return redirect()->back()->withInput()->with('erro', $this->validate);
		}
		else {
			$data['category'] = [
				'title' => $this->request->getPost('title'),
			];
			$categoryModel->save([
				'title' => $this->request->getPost('title'),
			]);
		echo view('templates/header', $data);
		echo view('pages/success', $data);
		echo view('templates/footer', $data);

		}
	}

	public function edit($id)	
	{

		$modelTask  = new CategoryModel();
		
		$data['category'] =  $modelTask->find($id);

		echo view('templates/header', $data);
		echo view('pages/category/edit', $data);
		echo view('templates/footer', $data);
	}
	public function delete($id)	
	{

		$modelTask  = new CategoryModel();
		
		$data['category'] =  $modelTask->delete($id);

		echo view('templates/header', $data);
		echo view('pages/category/edit', $data);
		echo view('templates/footer', $data);
	}
}
