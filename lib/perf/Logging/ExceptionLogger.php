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
     *
     *
     * @param \Exception $exception
     * @return void
     */
    public function __construct()
    {
        $this->setExceptionFormatter(new ExceptionFormatter());
    }

    /**
     *
     *
     * @param ExceptionFormatter $formatter
     * @return void
     */
    public function setExceptionFormatter(ExceptionFormatter $formatter)
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
        $message = $this->exceptionFormatter->format($exception);

        error_log($message);
    }
}
