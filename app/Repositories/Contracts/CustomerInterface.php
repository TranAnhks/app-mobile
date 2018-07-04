<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface CustomerInterface extends RepositoryInterface
{
	public function pageindex();

	public function pagecreate();

	public function pageedit($id);

	public function pageupdate($request, $id);
	
	public function pagedestroycustomer($id);
}
