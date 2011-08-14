<?php
/*
 * @package         mod_paguemefacil
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - @fititnt -  http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GPL3
 */
// no direct access
defined('_JEXEC') or die;

class Mod_paguemefacilInstallerScript {

	function install($parent) {
		echo '<p>'. JText::_('1.6 Custom install script') . '</p>';
	}
        
	function uninstall($parent) {
		echo '<p>'. JText::_('1.6 Custom uninstall script') .'</p>';
	}
        
	function update($parent) {
		echo '<p>'. JText::_('1.6 Custom update script') .'</p>';
	}

	function preflight($type, $parent) {
		echo '<p>'. JText::sprintf('1.6 Preflight for %s', $type) .'</p>';
	}

	function postflight($type, $parent) {
		echo '<p>'. JText::sprintf('1.6 Postflight for %s', $type) .'</p>';
	}
}