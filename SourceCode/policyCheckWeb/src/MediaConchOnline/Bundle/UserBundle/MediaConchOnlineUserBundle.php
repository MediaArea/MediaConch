<?php

namespace MediaConchOnline\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MediaConchOnlineUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
