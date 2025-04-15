<?php

/**
*
*/

class Epayco
{
	protected static $_instance = null;
    protected $info;
	private function __construct()
    {
        $info = array();
        $info['PRIVATE_KEY'] = Config_Config::getInstance()->getValue('epayco/PRIVATE_KEY');
        $info['PUBLIC_KEY'] = Config_Config::getInstance()->getValue('epayco/PUBLIC_KEY');
        $info['P_KEY'] = Config_Config::getInstance()->getValue('epayco/P_KEY');
        $info['P_CUST_ID_CLIENTE'] = Config_Config::getInstance()->getValue('epayco/P_CUST_ID_CLIENTE');
        $info['url_apify'] = Config_Config::getInstance()->getValue('epayco/url_apify');
        $info['responseUrl'] = Config_Config::getInstance()->getValue('epayco/responseUrl');
        $info['confirmationUrl'] = Config_Config::getInstance()->getValue('epayco/confirmationUrl');
        $info['buyerEmail'] = Config_Config::getInstance()->getValue('epayco/buyerEmail');
        $this->info = $info;
    }

    public function get(){
    	return $this->info;
    }

	public static function getInstance()
    {
         if (null == self::$_instance) {
            self::$_instance = new Epayco();
        }
        return self::$_instance;
    }
}