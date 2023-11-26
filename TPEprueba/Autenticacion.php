<?php

class AutenticacionEstatica {

    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function login($user) {
        AutenticacionEstatica::init();
        $_SESSION['USER_NOMBRE'] = $user->Nombre_Usuario;
        $_SESSION['LOGUEADO'] = true; 
    }

    public static function logout() {
        AutenticacionEstatica::init();
        session_destroy();

    }

    public static function verify() {
        AutenticacionEstatica::init();
        if (!isset($_SESSION['USER_NOMBRE'])) {
            header('Location: ' . BASE_URL . '/login');
            die();
        }
    }
}