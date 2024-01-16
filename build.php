<?php

// Caminho da pasta bios
$bios_directory = './bios';

// Array com arquivos de bios
$bios_files = [];

if (is_dir($bios_directory)) {
    $diretorio = opendir($bios_directory);

    // Percorre os arquivos na pasta
    while (($arquivo = readdir($diretorio)) !== false) {
        if (pathinfo($arquivo, PATHINFO_EXTENSION) === 'txt') {
            $conteudo_arquivo = file_get_contents($bios_directory . '/' . $arquivo);
            $bios_files[pathinfo($arquivo, PATHINFO_FILENAME)] = $conteudo_arquivo;
        }
    }

    closedir($diretorio);

    $json_resultado = json_encode($bios_files, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $json_resultado);
} else {
    echo 'O diretório não existe.';
}
