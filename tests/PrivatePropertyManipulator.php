<?php

namespace App\Tests;

use ReflectionProperty;
use ReflectionException;

/**
 * !TODO Liskov's substitution application.
 *
 * !TODO move the trait as an interface, make an abstract class extends the interface
 * !TODO and extends that abstract class
 * !TODO that way we can reflect the reflection
 * !TODO (and use "return $this" in a meaning context)
 *
 *
 * Trait PrivatePropertyManipulator
 * @package App\Tests
 */
trait PrivatePropertyManipulator
{
	/**
	 * Define the value of a property using Reflection.
	 * @param object|null $object
	 * @param string|null $property
	 * @param null $value
	 */
	public function setByReflection(
		object $object = null,
		string $property = null,
		$value = null) :void
	{
		try {
			$reflectionProperty = $this->getAccessibleReflectionProperty($object,$property);
			$reflectionProperty->setValue($object,$value);
		}catch(ReflectionException $e){
			error_log("The setByReflection method throw a Reflection Exception.");
			error_log($e->getMessage());
		}
		//!TODO return $this;
	}

	/**
	 * Get the value of a property using the Reflection.
	 * @param object|null $object
	 * @param string $property
	 * @return mixed
	 */
	public function getByReflection(object $object = null,string $property)
	{
		try{
			$reflectionProperty = $this->getAccessibleReflectionProperty($object,$property);
			return $reflectionProperty->getValue($object);
		}catch(ReflectionException $e){
			error_log("The setByReflection method throw a Reflection Exception.");
			error_log($e->getMessage());
		}
	}

	/**
	 * Get any property of any object
	 * @param object|null $object
	 * @param string $property
	 * @throws ReflectionException
	 */
	public function getAccessibleReflectionProperty( object $object = null, string $property ) :ReflectionProperty
	{
		$reflectionProperty = new ReflectionProperty($object,$property);
		$reflectionProperty->setAccessible(true);
		return $reflectionProperty;
	}

}