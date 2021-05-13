<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\OwnerModel;
use App\Models\TaskModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class Tasks extends Controller
{
	//  $request;
	//  private $request = new RequestInterface();
	public function index()
	{
		$model = new TaskModel();

		$data['tasks'] = $model->getTaskList();
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

		if ($this->request->getMethod() === 'post' && $this->validate([
			'title' => 'required|min_length[3]|max_length[255]',
			'body'  => 'required',
		])) {
			$model->save([
				'title' => $this->request->getPost('title'),
				'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
				'body'  => $this->request->getPost('body'),
			]);

			echo view('news/success');
		} else {
			echo view('templates/header', ['title' => 'Create a news item']);
			echo view('news/create');
			echo view('templates/footer');
		}
	}
	public function addTask($page = 'add_tasks')
	{
		if (!is_file(APPPATH . '/Views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$ownerModel = new CategoryModel();
		$categoryModel = new OwnerModel();
		$data['owners'] = $ownerModel->getOwners();
		$data['categoryes'] = $categoryModel->getCategoryes();


		echo view('templates/header', $data);
		echo view('pages/' . $page, $data);
		echo view('templates/footer', $data);
	}
}
