<?php

namespace spec\MageSchool\PayInStore\Block;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SuccessSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('MageSchool\PayInStore\Block\Success');
    }
}
