<?php
$username = $_GET['username'];
$ip_mikrotik = "IP_DO_SEU_MIKROTIK";
$user_mikrotik = "admin";
$pass_mikrotik = "senha";

// Conecta ao MikroTik via API
$connection = ssh2_connect($ip_mikrotik, 22);
ssh2_auth_password($connection, $user_mikrotik, $pass_mikrotik);

// Comando para remover o usuário do hotspot ativo (liberar acesso)
$comando = "/ip hotspot active remove [find user=\"$username\"]";
$stream = ssh2_exec($connection, $comando);
stream_set_blocking($stream, true);
echo "Acesso liberado para $username";
?>
