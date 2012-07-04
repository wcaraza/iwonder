<?php
class ZC_Controller_Plugin_LangSelector extends Zend_Controller_Plugin_Abstract
{  
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        $lang = $request->getParam('lang', '');

        $langs = $_SESSION['langs'];

        if (!array_key_exists(strtolower($lang), $langs) ) {
            $_SESSION['nolang'] = '1';
        } else {
            $lang = $request->getParam('lang');
            define('LANG', $lang);
            define('LANG_ID', $langs[$lang]);
            $locale = $langs[$lang];

            $zendLocale = new Zend_Locale();
            $zendLocale->setLocale($locale);
            Zend_Registry::set('locale', $zendLocale);

            $translate = new Zend_Translate('csv', APPLICATION_PATH . '/lang/' . $lang . '.csv', $lang);
            Zend_Registry::set('translate', $translate);
        }
    }
}