<?php

namespace perf\Logging;

/**
 *
 */
class ExceptionFormatterTest extends \PHPUnit_Framework_TestCase
{

    /**
     *
     */
    protected function setUp()
    {
        $this->formatter = new ExceptionFormatter();

        $this->exception = $this->getMock('\\Exception');
    }

    /**
     *
     */
    public function testFormatTakesLineIntoAccount()
    {
        $line = 123;

        $this->exception->expects($this->any())->method('getLine')->will($this->returnValue($line));

        $result = $this->formatter->format($this->exception);

        $this->assertContains($line, $result);
    }
}
