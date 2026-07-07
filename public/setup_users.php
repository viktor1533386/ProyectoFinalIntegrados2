<?php
require_once dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/core/Database.php';

$db = Database::getInstance();

// Insert Admin
try {
    $hash = password_hash('admin123', PASSWORD_BCRYPT);
    $db->query("INSERT INTO usuarios (nombre, email, password, rol, estado, password_reset_required) VALUES ('Administrador Principal', 'admin@hogarideal.pe', ?, 'admin', 1, 0)", [$hash]);
    echo "Administrador 'admin@hogarideal.pe' creado con éxito.\n";
} catch (Exception $e) {
    echo "Error creando admin: " . $e->getMessage() . "\n";
}

// Assign users to sellers
$vendedores = $db->query("SELECT * FROM vendedores")->fetchAll();
foreach ($vendedores as $index => $v) {
    $email = 'vendedor' . ($index + 1) . '@hogarideal.pe';
    try {
        $hash = password_hash('ventas123', PASSWORD_BCRYPT);
        $db->query("INSERT INTO usuarios (nombre, email, password, rol, estado, password_reset_required) VALUES (?, ?, ?, 'vendedor', 1, 0)", [$v->nombre . ' ' . $v->apellido, $email, $hash]);
        $usuarioId = $db->lastInsertId();
        
        $db->query("UPDATE vendedores SET usuario_id = ? WHERE id = ?", [$usuarioId, $v->id]);
        echo "Vendedor '$email' creado y vinculado.\n";
    } catch (Exception $e) {
         echo "Error creando vendedor: " . $e->getMessage() . "\n";
    }
}

echo "Proceso finalizado.\n";
