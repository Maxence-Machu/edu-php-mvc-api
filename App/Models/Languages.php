<?php

namespace App\Models;

use PDO;

/*
 * PHP version 7.0
 */
class Languages extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('
        SELECT DISTINCT Language as name FROM countrylanguage
        ');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
