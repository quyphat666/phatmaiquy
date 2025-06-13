<?php
class SessionHelper {
public static function isLoggedIn() {
return isset($_SESSION['user']);
}

public static function isAdmin() {
return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}

public static function logout() {
session_destroy();
}
}
?>