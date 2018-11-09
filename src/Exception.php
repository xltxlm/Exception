<?php

namespace xltxlm\exception;


/**
 * 最基础的异常类,其他的异常均写在自己的业务里面;
 */
class Exception extends \Exception
{

    /**
     * LockFall_Exception constructor.
     */
    public function __construct(string $message = "", int $code = 0)
    {
        if ($message) {
            parent::__construct($message, $code);
        } else {
            parent::__construct(static::class, $code);
        }
    }

}