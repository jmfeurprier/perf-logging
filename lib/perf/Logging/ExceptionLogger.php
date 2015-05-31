<?php

namespace perf\Logging;

/**
 *
 *
 */
class ExceptionLogger
{

    /**
     *
     *
     * @var ExceptionFormatter
     */
    private $exceptionFormatter;

    /**
     * Static constructor.
     *
     * @return CookieClient
     */
    public static function createDefault()
    {
        $formatter = new ExceptionFormatter();

        return new self($formatter);
    }

    /**
     * Static constructor.
     *
     * @param ExceptionFormatter $formatter
     * @return CookieClient
     */
    public static function create(ExceptionFormatter $formatter)
    {
        return new self($formatter);
    }

    /**
     *
     *
     * @param ExceptionFormatter $formatter
     * @return void
     */
    private function __construct(ExceptionFormatter $formatter)
    {
        $this->exceptionFormatter = $formatter;
    }

    /**
     *
     *
     * @param \Exception $exception
     * @return void
     */
    public function log(\Exception $exception)
    {
        $message = $this->getExceptionFormatter()->format($exception);

        error_log($message);
    }

    /**
     *
     *
     * @return ExceptionFormatter
     */
    private function getExceptionFormatter()
    {
        if (!$this->exceptionFormatter) {
            $exceptionFormatter = new ExceptionFormatter();

            $this->setExceptionFormatter($exceptionFormatter);
        }

        return $this->exceptionFormatter;
    }
}
