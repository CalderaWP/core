<?php


namespace calderawp\caldera\Core\Tests\Unit;


use calderawp\interop\Caldera;

class AccessorFunctionTest extends TestCase
{

    /***
     * @covers \caldera()
     */
    public function testSameInstance()
    {
        $this->assertSame(caldera(), caldera());
    }
}
