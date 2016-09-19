<?php
namespace Fwolf\Base\Singleton;

/**
 * Singleton pattern implement
 *
 * Use only when class REALLY NEED to be singleton, that is say, if class has
 * more than one instances, may cause error or waste mass resource. Because
 * singleton may introduce tight coupling and hard to mock.
 *
 * @see         http://www.phptherightway.com/pages/Design-Patterns.html
 *
 * Illegal usage will cause fatal error and cannot catch, so skip test.
 * @codeCoverageIgnore
 *
 * @copyright   Copyright 2013-2016 Fwolf
 * @license     http://opensource.org/licenses/MIT MIT
 */
trait SingletonTrait
{
    use SingleInstanceTrait;


    /**
     * Prevent 'new' operator from outside
     */
    protected function __construct()
    {
    }


    /**
     * Prevent clone method
     */
    private function __clone()
    {
    }


    /**
     * Prevent unserialize method
     */
    /** @noinspection PhpUnusedPrivateMethodInspection */
    private function __wakeup()
    {
    }
}
