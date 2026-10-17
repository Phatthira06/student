<?php
require 'auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO 6: After CSRF verification, clear $_SESSION, expire session cookie,
    // call session_destroy(), redirect to login.php, then exit.
    check_auth_token();

    // 1. เคลียร์ข้อมูลทั้งหมดใน $_SESSION
    $_SESSION = array();

    // 2. ลบคุกกี้ session ในฝั่ง Browser
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // 3. ทำลาย Session บน Server
    session_destroy();

    // 4. Redirect กลับไปหน้า login.php
    header('Location: login.php?logged_out=1');
    exit;
}
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Logout</title>
    <link rel="stylesheet" href="assets/css/crud.css">
</head>
<body>
<main class="wrap">
    <div class="panel">
        <h1>Log out?</h1>
        <?php if (!empty($error)): ?>
            <p class="err"><?= auth_escape($error) ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="hidden" name="auth_csrf" value="<?= auth_escape(auth_token()) ?>">
            <button type="submit">Confirm logout</button>
        </form>
        <p><a href="skills.php">Back</a></p>
    </div>
</main>
</body>
</html>