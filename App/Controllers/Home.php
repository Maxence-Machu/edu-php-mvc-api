<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Cities;
use App\Models\Languages;
use App\Models\Countries;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     */
    public function indexAction()
    {
        $cities = new Cities();
        $cities = $cities->getAll();

        $langs = new Languages();
        $langs = $langs->getAll();

        $countries = new Countries();
        $countries = $countries->getAll();


        View::renderTemplate('Home/index.html', [
            'cities' => $cities,
            'langs' => $langs,
            'countries' => $countries
        ]);
    }
}
