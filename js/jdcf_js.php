<?php
/*
 * @package         DynamicFileCreate
 * @subpackage      Test files
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - @fititnt -  http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GPL3
 */
//Este arquivo, propositalmente, nao tem a restricao "defined('_JEXEC') or die;"

/*
if (isset($_GET['width'])) {
    switch($_GET['width']){
        case 1200:
            $width = 1200;
            break;
        case 420:
            $width = 420;
            break;
        case 960:
        default:
            $width = 960;
    }
} else {
    $width = 960;
}
*/
$sufixo = NULL;//Take it later...
$css =<<<CSS
    function obtemEnderecoDeCep( cep ){
        //chamada remota
        if ( encontrado )
        {    
            documento.pmf_endereco$sufixo.value = '';
            documento.pmf_endereco$sufixo.value = '';
            documento.pmf_numero$sufixo.value = '';
            documento.pmf_cidade$sufixo.value = '';
            documento.pmf_estado$sufixo.value = '';
        } else {
            documento.pmf_estado$sufixo.style.visibility = show;
        }    
    }
    function envia(){
    
    }
CSS;

//Include Library
include_once '../helpers/DynamicCreateFile.php';
$dcf = new DynamicCreateFile;//Fluent Interface!
$dcf->content( $css )->type('js')->show();