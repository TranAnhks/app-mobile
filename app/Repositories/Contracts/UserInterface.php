<?php

namespace App\Repositories\Contracts;

interface UserInterface 
{
    public function pageindex();
 

    public function pageedit($id);
 

    public function pageupdate($request, $id);
 

}