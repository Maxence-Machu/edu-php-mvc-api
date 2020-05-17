<?php

namespace App\Models;

use PDO;

/*
 * PHP version 7.0
 */
class Cities extends \Core\Model
{

    /**
     * Get all the Cities as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('
        SELECT id, city.name as name, District, country.name as country, Language as language FROM city
        LEFT JOIN country ON city.CountryCode = country.code
        LEFT JOIN countrylanguage ON country.code = countrylanguage.countryCode 
        LIMIT 100
        ');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get the Cities as for a certain country
     *
     * @return array
     */
    public static function withCountry($country)
    {
        $db = static::getDB();
        $stmt = $db->prepare('
        SELECT id, city.name as name, District, country.name as country, Language as language FROM city
        LEFT JOIN country ON city.CountryCode = country.code
        LEFT JOIN countrylanguage ON country.code = countrylanguage.countryCode 
        WHERE country.name = ?
        LIMIT 100
        ');
        $stmt->execute([$country]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
