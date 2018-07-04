<?php

namespace App\Repositories\Eloquents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;

abstract class BaseRepository
{
    /**
	 * @var [model]
	 */
	protected $_model;

	public function __construct()
	{
		$this->setModel();
	}
	/**
	 * get model
	 * @return string 
	 */
	abstract public function model();

	public function setModel()
	{
		$this->_model = app()->make(
			$this->model()
		);
	}
}
