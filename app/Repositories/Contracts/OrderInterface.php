<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface OrderInterface extends RepositoryInterface
{
    //Client
    public function pageoder();

    public function pagepostoder($request);
    
    public function pagesendEmail($thisUser);

    public function pageverifyEmailFirst();
 
    public function pagesendEmailDoneOder($verifyToken);
 	
 	// Admin
 	public function pageoderad();

 	public function pageorderdetailad($id);

 	public function pagecreatead();

 	public function pageeditad($id);

 	public function pageupdatead($id);

 	public function pagedestroyad($id);
    
}
