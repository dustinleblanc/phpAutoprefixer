<?php

namespace DustinLeblanc\Autoprefixer;

class Prefixer
{
    public function prefix($css)
    {
        return ":-webkit-full-screen a {
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
}";
    }
}
