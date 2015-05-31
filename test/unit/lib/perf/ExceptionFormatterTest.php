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
    }

    /**
     *
     */
    public function testFormatTakesFileIntoAccount()
    {
        $exception = new \Exception();

        $result = $this->formatter->format($exception);

        $this->assertContains($exception->getFile(), $result);
    }

    /**
     *
     */
    public function testFormatTakesLineIntoAccount()
    {
        $exception = new \Exception();

        $result = $this->formatter->format($exception);

        $this->assertContains((string) $exception->getLine(), $result);
    }

    /**
     *
     */
    public function testFormatTakesMessageIntoAccount()
    {
        $message = 'foo';

        $exception = new \Exception($message);

        $result = $this->formatter->format($exception);

        $this->assertContains($message, $result);
    }

    /**
     *
     */
    public function testFormatTakesPreviousExceptionIntoAccount()
    {
        $previousMessage = 'foo';
        $message         = 'bar';

        $previousException = new \Exception($previousMessage);

        $exception = new \Exception($message, 0, $previousException);

        $result = $this->formatter->format($exception);

        $this->assertContains($previousMessage, $result);
    }
}
