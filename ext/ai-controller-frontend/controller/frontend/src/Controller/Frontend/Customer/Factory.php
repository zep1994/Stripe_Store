<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2017-2020
 * @package Controller
 * @subpackage Frontend
 */


namespace Aimeos\Controller\Frontend\Customer;


/**
 * Customer frontend controller factory
 *
 * @package Controller
 * @subpackage Frontend
 */
class Factory
	extends \Aimeos\Controller\Frontend\Common\Factory\Base
	implements \Aimeos\Controller\Frontend\Common\Factory\Iface
{
	/**
	 * Creates a new customer controller object.
	 *
	 * @param \Aimeos\MShop\Context\Item\Iface $context Context instance with necessary objects
	 * @param string|null $name Name of the controller implementaton (default: "Standard")
	 * @return \Aimeos\Controller\Frontend\Customer\Iface Controller object
	 */
	public static function create( \Aimeos\MShop\Context\Item\Iface $context, string $name = null ) : \Aimeos\Controller\Frontend\Iface
	{
		/** controller/frontend/customer/name
		 * Class name of the used customer frontend controller implementation
		 *
		 * Each default frontend controller can be replace by an alternative imlementation.
		 * To use this implementation, you have to set the last part of the class
		 * name as configuration value so the controller factory knows which class it
		 * has to instantiate.
		 *
		 * For example, if the name of the default class is
		 *
		 *  \Aimeos\Controller\Frontend\Customer\Standard
		 *
		 * and you want to replace it with your own version named
		 *
		 *  \Aimeos\Controller\Frontend\Customer\Mycustomer
		 *
		 * then you have to set the this configuration option:
		 *
		 *  controller/frontend/customer/name = Mycustomer
		 *
		 * The value is the last part of your own class name and it's case sensitive,
		 * so take care that the configuration value is exactly named like the last
		 * part of the class name.
		 *
		 * The allowed characters of the class name are A-Z, a-z and 0-9. No other
		 * characters are possible! You should always start the last part of the class
		 * name with an upper case character and continue only with lower case characters
		 * or numbers. Avoid chamel case names like "MyCustomer"!
		 *
		 * @param string Last part of the class name
		 * @since 2014.03
		 * @category Developer
		 */
		if( $name === null ) {
			$name = $context->getConfig()->get( 'controller/frontend/customer/name', 'Standard' );
		}

		$iface = '\\Aimeos\\Controller\\Frontend\\Customer\\Iface';
		$classname = '\\Aimeos\\Controller\\Frontend\\Customer\\' . $name;

		if( ctype_alnum( $name ) === false ) {
			throw new \Aimeos\Controller\Frontend\Exception( sprintf( 'Invalid characters in class name "%1$s"', $classname ) );
		}

		$controller = self::createController( $context, $classname, $iface );

		/** controller/frontend/customer/decorators/excludes
		 * Excludes decorators added by the "common" option from the customer frontend controllers
		 *
		 * Decorators extend the functionality of a class by adding new aspects
		 * (e.g. log what is currently done), executing the methods of the underlying
		 * class only in certain conditions (e.g. only for logged in users) or
		 * modify what is returned to the caller.
		 *
		 * This option allows you to remove a decorator added via
		 * "controller/frontend/common/decorators/default" before they are wrapped
		 * around the frontend controller.
		 *
		 *  controller/frontend/customer/decorators/excludes = array( 'decorator1' )
		 *
		 * This would remove the decorator named "decorator1" from the list of
		 * common decorators ("\Aimeos\Controller\Frontend\Common\Decorator\*") added via
		 * "controller/frontend/common/decorators/default" for the customer frontend controller.
		 *
		 * @param array List of decorator names
		 * @since 2014.03
		 * @category Developer
		 * @see controller/frontend/common/decorators/default
		 * @see controller/frontend/customer/decorators/global
		 * @see controller/frontend/customer/decorators/local
		 */

		/** controller/frontend/customer/decorators/global
		 * Adds a list of globally available decorators only to the customer frontend controllers
		 *
		 * Decorators extend the functionality of a class by adding new aspects
		 * (e.g. log what is currently done), executing the methods of the underlying
		 * class only in certain conditions (e.g. only for logged in users) or
		 * modify what is returned to the caller.
		 *
		 * This option allows you to wrap global decorators
		 * ("\Aimeos\Controller\Frontend\Common\Decorator\*") around the frontend controller.
		 *
		 *  controller/frontend/customer/decorators/global = array( 'decorator1' )
		 *
		 * This would add the decorator named "decorator1" defined by
		 * "\Aimeos\Controller\Frontend\Common\Decorator\Decorator1" only to the frontend controller.
		 *
		 * @param array List of decorator names
		 * @since 2014.03
		 * @category Developer
		 * @see controller/frontend/common/decorators/default
		 * @see controller/frontend/customer/decorators/excludes
		 * @see controller/frontend/customer/decorators/local
		 */

		/** controller/frontend/customer/decorators/local
		 * Adds a list of local decorators only to the customer frontend controllers
		 *
		 * Decorators extend the functionality of a class by adding new aspects
		 * (e.g. log what is currently done), executing the methods of the underlying
		 * class only in certain conditions (e.g. only for logged in users) or
		 * modify what is returned to the caller.
		 *
		 * This option allows you to wrap local decorators
		 * ("\Aimeos\Controller\Frontend\Customer\Decorator\*") around the frontend controller.
		 *
		 *  controller/frontend/customer/decorators/local = array( 'decorator2' )
		 *
		 * This would add the decorator named "decorator2" defined by
		 * "\Aimeos\Controller\Frontend\Customer\Decorator\Decorator2" only to the frontend
		 * controller.
		 *
		 * @param array List of decorator names
		 * @since 2014.03
		 * @category Developer
		 * @see controller/frontend/common/decorators/default
		 * @see controller/frontend/customer/decorators/excludes
		 * @see controller/frontend/customer/decorators/global
		 */
		return self::addControllerDecorators( $context, $controller, 'customer' );
	}

}
