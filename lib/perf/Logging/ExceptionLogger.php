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
