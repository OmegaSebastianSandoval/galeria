<?php

/**
*
*/

class Payu
{
	protected static $_instance = null;
    protected $info;
	private function __construct()
    {
        $info = array();
        $info['urlpayment'] = Config_Config::getInstance()->getValue('payu/urlpayment');
        $info['merchant_id'] = Config_Config::getInstance()->getValue('payu/merchant_id');
        $info['apyKey'] = Config_Config::getInstance()->getValue('payu/apyKey');
        $info['test'] = Config_Config::getInstance()->getValue('payu/test');
        $info['account_id'] = Config_Config::getInstance()->getValue('payu/account_id');
        $info['responseUrl'] = Config_Config::getInstance()->getValue('payu/responseUrl');
        $info['confirmationUrl'] = Config_Config::getInstance()->getValue('payu/confirmationUrl');
        $info['buyerEmail'] = Config_Config::getInstance()->getValue('payu/buyerEmail');
        $this->info = $info;
    }

    public function get(){
    	return $this->info;
    }

	public static function getInstance()
    {
         if (null == self::$_instance) {
            self::$_instance = new Payu();
        }
        return self::$_instance;
    }
}