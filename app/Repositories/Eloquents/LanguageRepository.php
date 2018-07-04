<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\LanguageInterface;
use App\Repositories\Eloquents\BaseRepository;
use App\Models\Product;

class LanguageRepository extends BaseRepository implements LanguageInterface
{
	public function model()			
	{
		return Product::class;
	}

    public function changeLanguage($language)
    {
    	\Session::put('website_language', $language);

        return redirect()->back();
    }

}
