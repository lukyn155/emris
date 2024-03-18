<?php
//include_once __DIR__ . '/views/login.php';

require_once __DIR__ . "/../config/bootstrap.php";
require_once __DIR__ . '/models/Authentication.php';

// Pokud uživatel není přihlášen, přesměrujte ho na přihlašovací stránku
if (!Authentication::isLoggedIn()) {
    // Uložíme původní URL do session
    $_SESSION['original_url'] = $_SERVER['REQUEST_URI'];

    $controller = 'default';
} else {
    // Zde můžete směrovat požadavky na jednotlivé kontroléry
// Například, na základě cesty URL, můžete určit, který kontrolér má být spuštěn
// Předpokládáme, že URL obsahuje parametr "controller"
    $controller = $_GET['controller']; // Defaultní kontrolér
}

// Podle hodnoty v $controller můžete rozhodnout, který kontrolér spustit
// Například:
switch ($controller) {
    case 'user':
        require_once __DIR__ . '/controllers/UserController.php';
        $userController = new UserController($entityManager);
        // Zde můžete provést další akce na základě kontroléru, např. $userController->index();
        break;
    case 'product':
        require_once __DIR__ . '/controllers/ProductController.php';
        $productController = new ProductController($entityManager);
        // Zde můžete provést další akce na základě kontroléru, např. $productController->index();
        break;
    default:
        require_once __DIR__ . '/controllers/LoginController.php';
        $loginController = new LoginController($entityManager);
        $loginController->show();
        // Defaultní akce, pokud není určen žádný specifický kontrolér
        // Můžete zde provést akce pro výchozí stránku nebo 404 chybu
        break;
}