<?php

namespace TunisiaMallBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TunisiaMallBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
