<?php
require_once __DIR__ . '/header.php';
?>
<div id="login">
    <h1>Přihlášení</h1>
    <form action="login" method="post">
        <label>Login:</label><input type="text" />
        <label>Heslo:</label><input type="password" />
        <button>Přihlásit</button>
    </form>
</div>
<?php
require_once __DIR__ . '/footer.php';
