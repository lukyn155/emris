<?php

// Authentication.php - Třída pro ověření přihlášení uživatele
class Authentication {

    public static function isLoggedIn() {
        // Zde můžete provést skutečné ověření přihlášení uživatele
        // Toto je pouze demonstrační příklad
        return isset($_SESSION['user_id']); // Vrací true, pokud je uživatel přihlášen, jinak false
    }

}
