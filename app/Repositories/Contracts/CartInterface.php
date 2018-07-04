<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface CartInterface extends RepositoryInterface
{
    //
    public function pagecart();

    public function pageaddcart($id);

    public function pageupdatecart($id,$qty,$dk);

    public function pagedeletecart($id);

    public function pagexoa();

}
