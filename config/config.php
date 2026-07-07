<?php
// ============================================================
//  CONFIGURACIÓN GLOBAL – Bienes Raíces Framework MVC
//  Las credenciales viven en variables de entorno (.env local o
//  variables reales del panel de CleverCloud en producción) — CS-07.
// ============================================================

require_once __DIR__ . '/../core/EnvLoader.php';
EnvLoader::load(dirname(__DIR__) . '/.env');

// --- RUTAS ABSOLUTAS ---
define('APP_ROOT', dirname(__DIR__));

// --- BASE URL ---
if (EnvLoader::get('RAILWAY_PUBLIC_DOMAIN', '')) {
    define('BASE_URL', 'https://' . EnvLoader::get('RAILWAY_PUBLIC_DOMAIN') . '/public');
} else {
    define('BASE_URL', EnvLoader::get('APP_URL', 'http://localhost:81/APF1-INTEGRADOR/public'));
}

define('UPLOAD_DIR', APP_ROOT . '/public/uploads/propiedades/');
define('UPLOAD_URL', BASE_URL . '/uploads/propiedades/');
define('LOG_FILE',   APP_ROOT . '/logs/auth.log');

// --- BASE DE DATOS ---
define('DB_HOST',    EnvLoader::get('DB_HOST', EnvLoader::get('MYSQLHOST', EnvLoader::get('MYSQL_ADDON_HOST', 'localhost'))));
define('DB_USER',    EnvLoader::get('DB_USER', EnvLoader::get('MYSQLUSER', EnvLoader::get('MYSQL_ADDON_USER', 'root'))));
define('DB_PASS',    EnvLoader::get('DB_PASS', EnvLoader::get('DB_PASSWORD', EnvLoader::get('MYSQLPASSWORD', EnvLoader::get('MYSQL_ADDON_PASSWORD', '')))));
define('DB_NAME',    EnvLoader::get('DB_NAME', EnvLoader::get('MYSQLDATABASE', EnvLoader::get('MYSQL_ADDON_DB', 'bienes_raices'))));
define('DB_PORT',    EnvLoader::get('DB_PORT', EnvLoader::get('MYSQLPORT', EnvLoader::get('MYSQL_ADDON_PORT', 3306))));
define('DB_CHARSET', EnvLoader::get('DB_CHARSET', 'utf8mb4'));

// --- CORREO (HU: formulario de contacto) ---
define('MAIL_HOST',     EnvLoader::get('MAIL_HOST', 'smtp.gmail.com'));
define('MAIL_PORT',     (int) EnvLoader::get('MAIL_PORT', 587));
define('MAIL_USER',     EnvLoader::get('MAIL_USER', ''));
define('MAIL_PASS',     EnvLoader::get('MAIL_PASS', ''));
define('MAIL_DESTINO',  EnvLoader::get('MAIL_DESTINO', 'info@hogarideal.pe'));

// --- APP ---
define('APP_NAME',    'Hogar Ideal Perú');
define('APP_TAGLINE', 'Tu hogar perfecto, garantizado');
