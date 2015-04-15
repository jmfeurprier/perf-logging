<?php

namespace perf\Logging;

/**
 *
 *
 */
class ExceptionFormatter
{

    /**
     *
     *
     * @param \Exception $exception
     * @return string
     */
    public function format(\Exception $exception)
    {
        $exceptions = array(
            $exception,
        );

        while ($previousException = $exception->getPrevious()) {
            $exceptions[] = $previousException;

            $exception = $previousException;
        }

        $exceptionMessages = array();

        foreach ($exceptions as $exception) {
            $exceptionMessage = "{$exception->getFile()}:{$exception->getLine()} "
                              . "{$exception->getMessage()}\n"
                              . "{$exception->getTraceAsString()}";

            $exceptionMessages[] = $exceptionMessage;
        }

        $message = join("\n", $exceptionMessages);

        return $message;
    }
}
