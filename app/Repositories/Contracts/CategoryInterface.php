<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface CategoryInterface extends RepositoryInterface
{
    public function pageindex($request);

    public function pagecreate();

    public function pagestore($request);

    public function pageedit($id);

    public function pageupdate($request, $id);
    
    public function pagedestroy($id);
}
