<?php
/**
 * 2007-2014 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2007-2014 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

include_once dirname(__FILE__) . '/../../../../config/config.inc.php';
include_once dirname(__FILE__) . '/../../../../init.php';
include_once dirname(__FILE__) . '/../../pagseguro.php';

class PagSeguroErrorModuleFrontController extends ModuleFrontController
{

    public $context;

    public function initContent()
    {

        parent::initContent();

        $this->context = Context::getContext();
        $this->context->smarty->assign('version', $this->_whichVersion());

        $this->setTemplate('error.tpl');
    }

    private function _whichVersion()
    {
    	if (version_compare(_PS_VERSION_, '1.7.0.0', '>=')) {
            $version = '7';
        } else if (version_compare(_PS_VERSION_, '1.6.0.1', ">=") && version_compare(_PS_VERSION_, '1.7.0.0', "<")) {
    		$version = '6';
    	} else if(version_compare(_PS_VERSION_, '1.5.0.1', "<")){
    		$version = '4';
    	} else {
    		$version = '5';
    	}
    	return $version;
    }
}
