<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Cities;
use App\Models\Languages;
use App\Models\Countries;

/**
 * API controller
 *
 * PHP version 7.0
 */
class Api extends \Core\Controller
{

    /**
     * Show the index page
     *
     */
    public function indexAction()
    {
        echo json_encode([
            'status' => 'OK',
            'items' => []
        ]);
    }
    
    /**
     * Perform search request page
     */
    public function searchAction()
    {
        // TODO //
        // S'inspirer de la fonction countryAction 
        // Récupérer les villes en fonction de la requête de recherche

        $query = $_GET['search'];

        
        echo json_encode([
            'status' => 'OK',
            'items' => []
        ]);
    }

    /**
     * Perform language filter
     */
    public function countryAction()
    {
        $query = $_GET['country'];
        
        $cities = new Cities();
        $cities = $cities->withCountry($query);

        echo json_encode([
            'status' => 'OK',
            'items' => $cities
        ]);
    }

    /**
     * Perform the language filter
     */
    public function languageAction($lang)
    {
        // TODO //
        // S'inspirer de la fonction countryAction 
        // Récupérer les villes en fonction du filtre sur la langue
    }
}
