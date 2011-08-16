<?php
/*
 * @package         DynamicFileCreate
 * @subpackage      Test files
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - @fititnt -  http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GPL3
 */
//Este arquivo, propositalmente, nao tem a restricao "defined('_JEXEC') or die;"


$sufixo = NULL;//Take it later...
$css =<<<CSS
#paguemefacil_comprador input{
    display: block;
    margin-bottom: 10px;
}
#paguemefacil_produto$sufixo span[class^=pmf_prod_v]{
    display: block;
    margin-bottom: 10px;    
CSS;


//Include Library
include_once '../helpers/DynamicCreateFile.php';
$dcf = new DynamicCreateFile;
$dcf->content( $css )->type('css')->show();