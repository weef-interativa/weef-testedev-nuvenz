<?php
/**
 * PHP Includes
 */

/**
 * Inclui todos os arquivos php de um diretório
 * @param  string $folder pasta a ser incluida
 */
function include_php_dir($folder) {
    foreach (glob("{$folder}/*.php") as $filename) {
        include $filename;
    }
}

// Lista de diretórios dentro da pasta functions a serem incluídos
$directories = array(
    'global/enqueue', // Definições de scripts e estilos
    'global/helpers', // Definições de helpers
    'global/wp', // Definições de configuração de administração

    'project/plugins', // Definições de plugins do wordpress
    'project/shortcodes', // Definições de shortcodes do tema
    // 'project/options', // Definições de opções do tema
    'project/loop', // Definições de loops de conteúdo
    'project/hooks', // Definições de hooks do wordpress
    'project/wp', // Definições de hooks do wordpress
);


// Inclui todos os diretórios listados acima
foreach ($directories as $directory) {
    include_php_dir($template_dir . '/functions/' . $directory);
}