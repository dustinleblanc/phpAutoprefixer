<?php

namespace spec\DustinLeblanc\Autoprefixer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrefixerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(['latest 2']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('DustinLeblanc\Autoprefixer\Prefixer');
    }

    function it_adds_prefixes()
    {
        $this->prefix(":fullscreen a { display: flex }")->shouldReturn(":-webkit-full-screen a {
    display: -webkit-box;
    display: -webkit-flex;
    display: flex
}
:-moz-full-screen a {
    display: flex
}
:-ms-fullscreen a {
    display: -ms-flexbox;
    display: flex
}
:fullscreen a {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex
}");
        $this->prefix("a {
    display: flex;
}")->shouldReturn("a {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex
}");
    }
}
