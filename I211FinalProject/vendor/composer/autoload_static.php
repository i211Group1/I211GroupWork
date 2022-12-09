<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite3e9c0b9db364f036517aa5d2400f8b1
{
    public static $classMap = array (
        'ComposerAutoloaderInite3e9c0b9db364f036517aa5d2400f8b1' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInite3e9c0b9db364f036517aa5d2400f8b1' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DataMissingException' => __DIR__ . '/../..' . '/exceptions/data_missing_exception.class.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'DatabaseConnectionException' => __DIR__ . '/../..' . '/exceptions/database_connection_exception.class.php',
        'DatabaseExecutionException' => __DIR__ . '/../..' . '/exceptions/database_execution_exception.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'Game' => __DIR__ . '/../..' . '/models/game.class.php',
        'GameController' => __DIR__ . '/../..' . '/controllers/game_controller.class.php',
        'GameDetail' => __DIR__ . '/../..' . '/views/game/detail/game_detail.class.php',
        'GameEdit' => __DIR__ . '/../..' . '/views/game/edit/game_edit.class.php',
        'GameError' => __DIR__ . '/../..' . '/views/game/error/game_error.class.php',
        'GameIndex' => __DIR__ . '/../..' . '/views/game/index/game_index.class.php',
        'GameModel' => __DIR__ . '/../..' . '/models/game_model.class.php',
        'GameSearch' => __DIR__ . '/../..' . '/views/game/search/game_search.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/index_view.class.php',
        'LoginVerify' => __DIR__ . '/../..' . '/views/user/login/user_login_verify.class.php',
        'Logout' => __DIR__ . '/../..' . '/views/user/logout/logout.class.php',
        'User' => __DIR__ . '/../..' . '/models/user.class.php',
        'UserController' => __DIR__ . '/../..' . '/controllers/user_controller.class.php',
        'UserDetail' => __DIR__ . '/../..' . '/views/user/detail/user_detail.class.php',
        'UserError' => __DIR__ . '/../..' . '/views/user/error/user_error.class.php',
        'UserLogin' => __DIR__ . '/../..' . '/views/user/login/user_login.class.php',
        'UserModel' => __DIR__ . '/../..' . '/models/user_model.class.php',
        'UserRegister' => __DIR__ . '/../..' . '/views/user/register/user_register.class.php',
        'UserRegisterVerify' => __DIR__ . '/../..' . '/views/user/register/user_register_verify.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInite3e9c0b9db364f036517aa5d2400f8b1::$classMap;

        }, null, ClassLoader::class);
    }
}
