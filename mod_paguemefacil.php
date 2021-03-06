<?php
/*
 * @package         mod_paguemefacil
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - @fititnt -  http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GPL3
 */
// no direct access
defined('_JEXEC') or die;

// Include helper.php once
require_once dirname(__FILE__).'/helpers/DynamicCreateFile.php'; //Library to manipulate files
require_once dirname(__FILE__).'/helpers/paguemefacil.php'; //Own Library

$modbefore = htmlspecialchars_decode(($params->get('modbefore','')));
$modafter = htmlspecialchars_decode(($params->get('modafter','')));

$doc = &JFactory::getDocument();
$doc->addStyleSheet( 'modules/mod_paguemefacil/css/css.php' );
$doc->addScript( 'modules/mod_paguemefacil/js/js.php' );
if($params->get('include_css', NULL) != '-1')
{    
    if( strlen( $params->get('include_css',NULL) ) < 3)
    {
        $doc->addStyleSheet( $params->get('include_css',NULL) );
    } else {
        $doc->addStyleSheet( 'modules/mod_paguemefacil/css/jdcf_css.php' );
    }
}
if($params->get('include_js', NULL) != '-1')
{    
    if( strlen( $params->get('include_js',NULL) ) > 3)
    {
        $doc->addScript( $params->get('include_js',NULL) );
    } else {
        $doc->addScript( 'modules/mod_paguemefacil/js/jdcf_js.php' );
    }
}

$pmf = new PaguemeFacil; //Fluent Interface!

if($params->get('obter_dados_usuario_autenticado', 1)){
    $user = JFactory::getUser();
    $pmf->set('comprador_nome', $user->name);
    $pmf->set('comprador_email', $user->email);
}
$pmf->set('produto_nome', $params->get('produto_nome', '') );
$pmf->set('produto_descricao', $params->get('produto_descricao', '') );
$pmf->set('produto_codigo', $params->get('produto_codigo', '') );
$pmf->set('produto_peso', $params->get('produto_peso', 0) );
$pmf->set('produto_quantidade', $params->get('produto_quantidade', 1) );
$pmf->set('produto_precounitario', $params->get('produto_precounitario', 0) );


require JModuleHelper::getLayoutPath('mod_paguemefacil', $params->get('layout', 'default'));
