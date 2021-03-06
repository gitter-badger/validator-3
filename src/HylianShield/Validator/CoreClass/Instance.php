<?php
/**
 * Validate class instances.
 *
 * @package HylianShield
 * @subpackage Validator
 */

namespace HylianShield\Validator\CoreClass;

use \InvalidArgumentException;

/**
 * Instance.
 */
class Instance extends \HylianShield\Validator
{
    /**
     * The type.
     *
     * @var string $type
     */
    protected $type = 'class_instance';

    /**
     * Accept a class to test the existence of methods.
     *
     * @param string $class
     * @throws \InvalidArgumentException when the $class does not exist
     */
    public function __construct($class)
    {
        if (!is_string($class)) {
            throw new InvalidArgumentException(
                'Class must be a string: (' . gettype($class) . ') '
                . var_export($class, true)
            );
        }

        // Create a validator on the fly.
        $this->validator = function ($instance) use ($class) {
            return $instance instanceof $class;
        };
    }
}
