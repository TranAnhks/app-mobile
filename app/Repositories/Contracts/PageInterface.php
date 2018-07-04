<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface PageInterface extends RepositoryInterface
{
	/**
	 * @param  limit
	 * @param  conditions
	 * @param  value
	 * @return Data Prodcut paginage
	 */
	public function paginateProduct($request);

	public function paginateMobile($request);

	public function paginateLoaiSp($request,$id);

	public function paginatemobiledetail($id);
	
	public function paginateintro();
}
