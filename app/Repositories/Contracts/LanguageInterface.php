<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\RepositoryInterface;

interface LanguageInterface extends RepositoryInterface
{
    //
    public function changeLanguage($language);
}
