<?php

namespace PHPSpec2;

use Mockery\Expectation;

class ExpectationStub
{
    private $expectation;

    public function __construct(Expectation $expectation, array $arguments = array())
    {
        $this->expectation = call_user_func_array(array($expectation, 'with'), $arguments);
        $this->expectation->atLeast(1);
        $this->expectation->andReturn(null);
    }

    public function shouldReturn($value = null)
    {
        $this->expectation->andReturn($value);
    }

    public function shouldNotBeCalled()
    {
        $this->expectation->never();
    }

    public function shouldThrow($exception, $message = '')
    {
        $this->expectation->andThrow($exception, $message);
    }

    public function should_return($value = null)
    {
        $this->shouldReturn($value);
    }

    public function should_not_be_called()
    {
        $this->shouldNotBeCalled();
    }

    public function should_throw($exception, $message = '')
    {
        $this->shouldThrow($exception, $message);
    }
}
