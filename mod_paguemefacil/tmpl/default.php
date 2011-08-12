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
/* 
 * Mercado Pago
 * https://www.mercadopago.com/mlb/buttonConfigNew?step=fourthStep&ck=78572.38333537398
 */
?>
<form action="https://www.mercadopago.com/mlb/buybutton" method="post"  class="paguemefacil_pagamentodigital">
    <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_MERCADOPAGO'); ?>" name="submit" class="submit" />
    <input type="hidden" name="acc_id" value="12967111">
    <input type="hidden" name="url_cancel" value="http://http:/http://fititnt.org">
    <input type="hidden" name="item_id" value="codigo">
    <input type="hidden" name="name" value="nome">
    <input type="hidden" name="currency" value="REA">
    <input type="hidden" name="price" value="1.0">
    <input type="hidden" name="url_process" value="">
    <input type="hidden" name="url_succesfull" value="">
    <input type="hidden" name="shipping_cost" value="">
    <input type="hidden" name="enc" value="73b98bFa0c8iNboYT2MtSP%2FXsZs%3D"><!-- @todo: descobrir que merda e essa -->
    <input type="hidden" name="ship_cost_mode" value="CO">
    <input type="hidden" name="op_retira" value="B">
    <input type="hidden" name="extra_part" value="codigo">
    <input type="hidden" name="cart_cep" value="">
    <input type="hidden" name="cart_street" value="">
    <input type="hidden" name="cart_number" value="">
    <input type="hidden" name="cart_complement" value="">
    <input type="hidden" name="cart_phone" value="">
    <input type="hidden" name="cart_district" value="">
    <input type="hidden" name="cart_city" value="">
    <input type="hidden" name="cart_state" value="">
    <input type="hidden" name="cart_name" value="">
    <input type="hidden" name="cart_surname" value="">
    <input type="hidden" name="cart_email" value="">
    <input type="hidden" name="cart_doc_nbr" value="">
    <input type="hidden" name="cep" value="90650000">
    <input type="hidden" name="ship_weight" value="0.3">
    <input type="hidden" name="ship_comprimento" value="16.00">
    <input type="hidden" name="ship_largura" value="16.00">
    <input type="hidden" name="ship_altura" value="16.00">
    <input type="hidden" name="ship_assurance" value="N">
    <input type="hidden" name="ship_pack_hand" value="">
    <input type="hidden" name="ship_notificacion" value="">
</form>
<?php
/* 
 * iPagare
 * http://documentacao.ipagare.com.br/inicio/gratis/b-integracao-2/2-integracao-html/2-1-exemplo
 */
?>
<form action="https://ww2.ipagare.com.br/service/process.do" method="POST">
    <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_IPAGARE'); ?>" name="submit" class="submit" />
    <input type="hidden" name="estabelecimento" value="estabelecimento">
    <input type="hidden" name="acao" value="acao">
    <input type="hidden" name="valor_total" value="valor_total">
    <input type="hidden" name="chave" value="chave">
    <input type="submit" value="Realizar o pagamento">
</form>

<?php
/* 
 * F2b
 * http://www.f2b.com.br/pt_BR/f2b/billing/web.jsp
 */
?>
<!--
<FORM method="POST" action="http://www.f2b.com.br/BillingWeb" target="_BLANK">
      <TABLE>
        <TR><TD>conta</TD><TD><INPUT type="text" name="conta"></TD></TR>

        <TR><TD>senha</TD><TD><INPUT type="text" name="senha"></TD></TR>
        <TR><TD>valor</TD><TD><INPUT type="text" name="valor"></TD></TR>
        <TR><TD>tipo_cobranca</TD><TD><INPUT type="text" name="tipo_cobranca">B - Boleto; C - Cartão de crédito; D - Cartão de débito; T - Transferência On-line</TD></TR>
        <TR><TD>num_document</TD><TD><INPUT type="text" name="num_document"></TD></TR>
        <TR><TD>cod_banco</TD><TD><INPUT type="text" name="cod_banco"></TD></TR>
        <TR><TD>demonstrativo_1</TD><TD><INPUT type="text" name="demonstrativo_1"></TD></TR>

        <TR><TD>demonstrativo_2</TD><TD><INPUT type="text" name="demonstrativo_2"></TD></TR>
        <TR><TD>demonstrativo_3</TD><TD><INPUT type="text" name="demonstrativo_3"></TD></TR>
        <TR><TD>demonstrativo_4</TD><TD><INPUT type="text" name="demonstrativo_4"></TD></TR>
        <TR><TD>demonstrativo_5</TD><TD><INPUT type="text" name="demonstrativo_5"></TD></TR>
        <TR><TD>demonstrativo_6</TD><TD><INPUT type="text" name="demonstrativo_6"></TD></TR>
        <TR><TD>demonstrativo_7</TD><TD><INPUT type="text" name="demonstrativo_7"></TD></TR>

        <TR><TD>demonstrativo_8</TD><TD><INPUT type="text" name="demonstrativo_8"></TD></TR>
        <TR><TD>demonstrativo_9</TD><TD><INPUT type="text" name="demonstrativo_9"></TD></TR>
        <TR><TD>demonstrativo_10</TD><TD><INPUT type="text" name="demonstrativo_10"></TD></TR>
        <TR><TD>sacador_avalista</TD><TD><INPUT type="text" name="sacador_avalista"></TD></TR>
	<TR><TD>desconto_valor</TD><TD><INPUT type="text" name="desconto_valor"></TD></TR>
	<TR><TD>tipo_desconto</TD><TD><SELECT  name="tipo_desconto"><OPTION VALUE="0">R$</OPTION><OPTION VALUE="1">%</OPTION></SELECT></TD></TR>

        <TR><TD>desconto_antecedencia</TD><TD><INPUT type="text" name="desconto_antecedencia"></TD></TR>
        <TR><TD>multa_valor</TD><TD><INPUT type="text" name="multa_valor"></TD></TR>
	<TR><TD>tipo_multa</TD><TD><SELECT  name="tipo_multa"><OPTION VALUE="0">R$</OPTION><OPTION VALUE="1">%</OPTION></SELECT></TD></TR>
        <TR><TD>multa_valor_dia</TD><TD><INPUT type="text" name="multa_valor_dia"></TD></TR>
	<TR><TD>tipo_multa_dia</TD><TD><SELECT  name="tipo_multa_dia"><OPTION VALUE="0">R$</OPTION><OPTION VALUE="1">%</OPTION></SELECT></TD></TR>

        <TR><TD>multa_atraso</TD><TD><INPUT type="text" name="multa_atraso"></TD></TR>
        <TR><TD>vencimento</TD><TD><INPUT type="text" name="vencimento"></TD></TR>
        <TR><TD>prazo de vencimento</TD><TD><INPUT type="text" name="prazo_vencimento">* O Prazo deve ser em dias e será contado a partir da data atual. Utilizando esse campo não é necessário enviar a data de vencimento.</TD></TR>
        <TR><TD>contra apresentação</TD><TD><INPUT type="text" name="sem_vencimento"></TD></TR>
        <TR><TD>ultimo_dia</TD><TD><INPUT type="text" name="ultimo_dia"></TD></TR>
        <TR><TD>antecedencia</TD><TD><INPUT type="text" name="antecedencia"></TD></TR>

        <TR><TD>periodicidade</TD><TD><INPUT type="text" name="periodicidade"></TD></TR>
        <TR><TD>periodos</TD><TD><INPUT type="text" name="periodos"></TD></TR>
        <TR><TD>agendamento</TD><TD><INPUT type="text" name="agendamento"></TD></TR>
        <TR><TD>nome</TD><TD><INPUT type="text" name="nome"></TD></TR>
        <TR><TD>email_1</TD><TD><INPUT type="text" name="email_1"></TD></TR>
        <TR><TD>email_2</TD><TD><INPUT type="text" name="email_2"></TD></TR>

        <TR><TD>endereco_logradouro</TD><TD><INPUT type="text" name="endereco_logradouro"></TD></TR>
        <TR><TD>endereco_numero</TD><TD><INPUT type="text" name="endereco_numero"></TD></TR>
        <TR><TD>endereco_complemento</TD><TD><INPUT type="text" name="endereco_complemento"></TD></TR>
        <TR><TD>endereco_bairro</TD><TD><INPUT type="text" name="endereco_bairro"></TD></TR>
        <TR><TD>endereco_cidade</TD><TD><INPUT type="text" name="endereco_cidade"></TD></TR>
        <TR><TD>endereco_estado</TD><TD><INPUT type="text" name="endereco_estado"></TD></TR>

        <TR><TD>endereco_cep</TD><TD><INPUT type="text" name="endereco_cep"></TD></TR>
        <TR><TD>telefone_ddd</TD><TD><INPUT type="text" name="telefone_ddd"></TD></TR>
        <TR><TD>telefone_numero</TD><TD><INPUT type="text" name="telefone_numero"></TD></TR>
	<TR><TD>telefone_ddd_comercial</TD><TD><INPUT type="text" name="telefone_ddd_comercial"></TD></TR>
        <TR><TD>telefone_numero_comercial</TD><TD><INPUT type="text" name="telefone_numero_comercial"></TD></TR>
	<TR><TD>telefone_ddd_celular</TD><TD><INPUT type="text" name="telefone_ddd_celular"></TD></TR>

        <TR><TD>telefone_numero_celular</TD><TD><INPUT type="text" name="telefone_numero_celular"></TD></TR>
        <TR><TD>cpf</TD><TD><INPUT type="text" name="cpf"></TD></TR>
        <TR><TD>cnpj</TD><TD><INPUT type="text" name="cnpj"></TD></TR>
        <TR><TD>grupo</TD><TD><INPUT type="text" name="grupo"></TD></TR>
        <TR><TD>codigo</TD><TD><INPUT type="text" name="codigo"></TD></TR>
        <TR><TD>envio</TD><TD><INPUT type="text" name="envio"></TD></TR>

        <TR><TD>observacao</TD><TD><INPUT type="text" name="observacao"></TD></TR>
        <TR><TD>atualizar</TD><TD><INPUT type="text" name="atualizar"></TD></TR>
        <TR><TD>tipo parcelamento</TD><TD><INPUT type="text" name="tipo_parcelamento">A - Administradora; L - Lojista;</TD></TR>
        <TR><TD>número parcelas</TD><TD><INPUT type="text" name="num_parcelas">* Máximo de 12 para Administradora e 6 para Lojista</TD></TR>
        <TR><TD colspan="2"><INPUT type="button" onclick="javascript: this.disabled=true; enviar();" value="Enviar"></TD></TR>
      </TABLE>

    </FORM>
-->
<?php
//Moip nao sei se vou liberar
?>
<?php
//Paypal latter
?>
<?php echo $modafter; ?>