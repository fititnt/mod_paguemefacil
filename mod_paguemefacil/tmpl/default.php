<?php
/*
 * @package         mod_paguemefacil
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - @fititnt -  http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GPL3
 */
// no direct access
defined('_JEXEC') or die;
?>
<?php echo $modbefore; ?>
<fieldset id="paguemefacil">
    <label for="_name"><?php echo JTEXT::_('MOD_PAGUEMEFACIL_NOME'); ?></label>
    <input type="text" name="name" value="<?php echo $pmf->comprador_nome; ?>" /> 

    <label for="email"><?php echo JTEXT::_('MOD_PAGUEMEFACIL_EMAIL'); ?></label> 
    <input type="email" name="email" value="<?php echo $pmf->comprador_email; ?>"  />
</fieldset>
<?php
//https://pagseguro.uol.com.br/desenvolvedor/botoes_de_pagamento.jhtml
?>
<form target="pagseguro" action="https://pagseguro.uol.com.br/v2/checkout/cart.html?action=add" method="post" class="paguemefacil_pagseguro">
    <input type="hidden" name="receiverEmail" value="<?php echo $pmf->ps_email; ?>" />
    <input type="hidden" name="currency" value="BRL" />
    <input type="hidden" name="itemId" value="<?php echo $pmf->produto_codigo; ?>" />
    <input type="hidden" name="itemDescription" value="<?php echo $pmf->produto_nome; ?>" />
    <input type="hidden" name="itemQuantity" value="" />
    <input type="hidden" name="itemAmount" value="" />
    <input type="hidden" name="itemWeight" value="" />
    <input type="hidden" name="itemShippingCost" value="" />
    <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_PAGSEGURO'); ?>" name="submit" class="submit" />
</form>
<?php
//https://www.pagamentodigital.com.br/site/Integracao/Carrinho/
?>
<form action="https://www.pagamentodigital.com.br/checkout/car/" method="post" target="carrinho" class="paguemefacil_pagamentodigital">
    <input name="email_loja" type="hidden" value="<?php echo $pmf->pd_email; ?>">
    <input name="acao" type="hidden" value="add">
    <input name="cod_prod" type="hidden" value="<?php echo $pmf->produto_codigo; ?>">
    <input name="nome_prod" type="hidden" value="<?php echo $pmf->produto_nome; ?>">
    <input name="valor_prod" type="hidden" value="" >
    <input name="peso_prod" type="hidden" value="">
    <input name="quant_prod" type="hidden" value="">
    <input type="hidden" name="nome" value="<?php echo $pmf->comprador_nome; ?>"/>
    <input type="hidden" name="email" value="<?php echo $pmf->comprador_email; ?>"/>
    <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_PAGAMENTODIGITAL'); ?>" name="submit" class="submit" />
</form>

<?php
//Moip nao sei se vou liberar
?>
<?php echo $modafter; ?>