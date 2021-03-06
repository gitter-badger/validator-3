<?php
/**
 * Test for \HylianShield\Validator\Float.
 *
 * @package HylianShield
 * @subpackage Test
 */

namespace HylianShield\Tests\Validator;

use \HylianShield\Validator\Float;

/**
 * Float test.
 */
class FloatTest extends \HylianShield\Tests\Validator\TestBase
{
    /**
     * The name of our class to test.
     *
     * @var string $validatorClass
     */
    protected $validatorClass = '\HylianShield\Validator\Float';

    /**
     * A set of validations to pass.
     *
     * @var array $validations
     */
    protected $validations = array(
        array('Aap Noot Mies', false),
        array('0123456789', false),
        array('', false),
        array('€αβγδε', false),
        array(0.123456789, true),
        array(null, false),
        array(0, false),
        array(.1, true)
    );

    /**
     * Test if zero is an actual length that will be checked, as opposed to the
     * default value null.
     */
    public function testDefaultNotZero()
    {
        $validator = $this->validatorClass;
        /** @var \HylianShield\Validator\Float $validator */
        $validator = new $validator(0, 0);

        $this->assertTrue($validator->validate(0.));
        $this->assertFalse($validator->validate(1.));
        $this->assertFalse($validator->validate(-1.));
    }
}
