<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8f4de7eee4580f48bcc3ecd5f5731938
{
    public static $classMap = array (
        'Cidade' => __DIR__ . '/../..' . '/sistema/Controller/Cidade.php',
        'Cliente' => __DIR__ . '/../..' . '/sistema/Controller/Cliente.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Conexao' => __DIR__ . '/../..' . '/sistema/Conexao/Conexao.php',
        'Estado' => __DIR__ . '/../..' . '/sistema/Controller/Estado.php',
        'Funcoes' => __DIR__ . '/../..' . '/sistema/Funcoes/Funcoes.php',
        'Pais' => __DIR__ . '/../..' . '/sistema/Controller/Pais.php',
        'Teste' => __DIR__ . '/../..' . '/sistema/Controller/Teste.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit8f4de7eee4580f48bcc3ecd5f5731938::$classMap;

        }, null, ClassLoader::class);
    }
}
