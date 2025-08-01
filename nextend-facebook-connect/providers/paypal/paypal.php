<?php

class NextendSocialProviderPaypal extends NextendSocialProviderDummy {

    protected $color = '#014ea0';

    public function __construct() {
        $this->id     = 'paypal';
        $this->docUrl = 'https://social-login.nextendweb.com/documentation/providers/paypal/';
        $this->label  = 'PayPal';
        $this->path   = dirname(__FILE__);
    }
}

NextendSocialLogin::addProvider(new NextendSocialProviderPaypal());