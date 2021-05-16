<?php

namespace msng\ReadOnlyProperties\Tests;

use msng\ReadOnlyProperties\Tests\Samples\SampleUser;
use PHPUnit\Framework\TestCase;

class ReadOnlyPropertiesTest extends TestCase
{
    /**
     * @dataProvider userProvider
     */
    public function testPropertiesReadable($id, $name)
    {
        $user = new SampleUser($id, $name);

        $this->assertSame($id, $user->id);
        $this->assertSame($name, $user->name);
    }

    /**
     * @dataProvider userProvider
     */
    public function testPropertiesUnwritable($id, $name)
    {
        $user = new SampleUser($id, $name);

        $this->expectException(\Error::class);
        $this->expectExceptionMessage('Cannot access private property');

        /**
         * To avoid IDE warnings
         * @var \stdClass $user
         */
        $user->id = 2;
    }

    /**
     * @dataProvider userProvider
     */
    public function testPropertiesUnUnsetable($id, $name)
    {
        $user = new SampleUser($id, $name);

        $this->expectException(\Error::class);
        $this->expectExceptionMessage('Cannot access private property');
        unset($user->name);
    }

    /**
     * @dataProvider userProvider
     */
    public function testPropertiesSet($id, $name)
    {
        $user = new SampleUser($id, $name);

        $this->assertTrue(isset($user->id));
        $this->assertTrue(isset($user->name));
        $this->assertFalse(isset($user->email));
    }


    public function userProvider(): array
    {
        return [
            [1, 'somebody']
        ];
    }
}
