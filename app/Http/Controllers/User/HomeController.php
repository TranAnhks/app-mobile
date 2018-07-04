<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\LanguageInterface;

class HomeController extends Controller
{
    protected $languageRepository;

    public function __construct(LanguageInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function changeLanguage($language)
    {
        $pages = $this->languageRepository->changeLanguage($language);

        return $pages;
    }
}
