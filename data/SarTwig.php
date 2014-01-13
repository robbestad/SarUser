<?php
namespace ZfcTwig\Twig\Extension;

use Twig_Extension;

class SarTwig extends Twig_Extension
{

    public function getName()
    {
         return 'sar-twig';
    }

    public function getGlobals()
    {
        return array(
            'session'   => $_SESSION,
        ) ;
    }
}
