<?php
namespace Fwolf\Base\Singleton;

/**
 * Trait of object which SHOULD have only one instance
 *
 *
 * Singleton or container classes commonly have only one instance, and a
 * static getInstance() method are used to create and return its instance.
 *
 * For reuse only, should not use as type hint, so no relevant interface.
 *
 * The difference between this and singleton is, this mode does not strictly
 * prohibit multiple instances, target on consume less resources.
 *
 * Can not use when constructor need parameters.
 *
 *
 * Notice: If a class Foo use this trait, then extend by child class Bar, the
 * Bar class may need use this trait too, because 'static' is bind to Foo(the
 * class which trait is used in). For work properly, Bar need its own static
 * method -- use this trait too.
 *
 * Copy getInstance() to class use this trait may work, only when parent class
 * Foo is not used/instanced before it. If Foo::getInstance() is called before
 * Bar::getInstance(), the static instance is generated in Foo, and skipped in
 * Bar, we will got a wrong instance type. This also happen when Bar is used
 * first.
 *
 * Another solution is make static instance as array, stores every instance
 * it is called in, with get_called_class() as index, here use this one.
 *
 * Make static instance property of class instead of method may also works,
 * but this property may cause name conflict with other property in child
 * class. Choose a good name when using this plan.
 *
 *
 * @see         https://bugs.php.net/bug.php?id=65039
 * @see         http://php.net/manual/en/language.oop5.late-static-bindings.php
 *
 *
 * @copyright   Copyright 2015-2016 Fwolf
 * @license     http://opensource.org/licenses/MIT MIT
 */
trait SingleInstanceTrait
{
    /**
     * Get or reuse instance of self
     *
     * @return  static
     */
    public static function getInstance()
    {
        static $instances = [];

        $className = get_called_class();

        if (!isset($instances[$className])) {
            $instances[$className] = new $className();
        }

        return $instances[$className];
    }
}
