<?php

/**
 * @package Flextype
 *
 * @author Sergey Romanenko <awilum@yandex.ru>
 * @link http://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use League\Flysystem\Filesystem as Flysystem;
use League\Flysystem\Adapter\Local;

class Flsystem
{
    /**
     * An instance of the Cache class
     *
     * @var object
     * @access private
     */
    private static $instance = null;

    /**
     * Cache Driver
     *
     * @var Filesystem
     */
    protected static $driver;

    /**
     * Private clone method to enforce singleton behavior.
     *
     * @access private
     */
    private function __clone()
    {
    }

    /**
     * Private wakeup method to enforce singleton behavior.
     *
     * @access private
     */
    private function __wakeup()
    {
    }

    /**
     * Private construct method to enforce singleton behavior.
     *
     * @access private
     */
    private function __construct()
    {
        Flsystem::init();
    }

    /**
     * Init Cache
     *
     * @access protected
     * @return void
     */
    protected static function init() : void
    {
        // Get Filesystem Driver
        Flsystem::$driver = Flsystem::getFilesystemDriver();
    }

    /**
     * Get Cache Driver
     *
     * @access public
     * @return object
     */
    public static function getFilesystemDriver()
    {
        $filesystem = new Flysystem(new Local(ROOT_DIR));

        return $filesystem;
    }

    /**
     * Returns driver variable
     *
     * @access public
     * @return object
     */
    public static function driver()
    {
        return Flsystem::$driver;
    }

    /**
     * Get the Cache instance.
     *
     * @access public
     * @return object
     */
    public static function getInstance()
    {
        if (is_null(Flsystem::$instance)) {
            Flsystem::$instance = new self;
        }

        return Flsystem::$instance;
    }
}
