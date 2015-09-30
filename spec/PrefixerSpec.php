<?php

namespace spec\DustinLeblanc\Autoprefixer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrefixerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DustinLeblanc\Autoprefixer\Prefixer');
    }
}
