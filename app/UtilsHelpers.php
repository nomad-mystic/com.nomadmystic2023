<?php

namespace App;

use Dotenv;

/**
 * @classdesc Handle general utils here
 * @class Utils
 * @author Keith Murphy | nomadmystics@gmail.com
 */
class UtilsHelpers
{
    public function __construct()
    {
        $this->loadEnv();
    }

    /**
     * @description
     * @public
     * @author Keith Murphy | nomadmystics@gmail.com
     *
     * @return void
     */
    public function loadEnv(): void
    {
        $dotenv = Dotenv\Dotenv::createImmutable(get_stylesheet_directory());
        $dotenv->load();
    }
}

new UtilsHelpers();
