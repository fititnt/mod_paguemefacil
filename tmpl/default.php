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
<?php echo $modbefore; 
if( $params->get('exibir_formulario_produto', 1 ) ):
?>
<fieldset id="paguemefacil_produto<?php echo $pmf->sufixo; ?>">
    <span class="pmf_prod_n_nome">
        <?php echo JTEXT::_('MOD_PAGUEMEFACIL_PROD_NOME'); ?>:
    </span>
    <span class="pmf_prod_v_nome">
        <?php echo $pmf->produto_nome; ?>
    </span>
    <span class="pmf_prod_n_descricao">
        <?php echo JTEXT::_('MOD_PAGUEMEFACIL_PROD_DESCRICAO'); ?>:
    </span>
    <span class="pmf_prod_v_descricao">
        <?php echo $pmf->produto_descricao; ?>
    </span>
    <span class="pmf_prod_n_codigo">
        <?php echo JTEXT::_('MOD_PAGUEMEFACIL_PROD_CODIGO'); ?>:
    </span>
    <span class="pmf_prod_v_codigo">
        <?php echo $pmf->produto_codigo; ?>
    </span>
    <span class="pmf_prod_n_peso">
        <?php echo JTEXT::_('MOD_PAGUEMEFACIL_PROD_PESO'); ?>:
    </span>
    <span class="pmf_prod_v_peso">
        <?php echo $pmf->produto_peso; ?>
    </span>
    <span class="pmf_prod_n_quantidade">
        <?php echo JTEXT::_('MOD_PAGUEMEFACIL_PROD_QUANTIDADE'); ?>:
    </span>
    <span class="pmf_prod_v_quantidade">
        <?php echo $pmf->produto_quantidade; ?>
    </span>
    <span class="pmf_prod_n_precounitario">
        <?php echo JTEXT::_('MOD_PAGUEMEFACIL_PROD_PRECO_UNITARIO'); ?>:
    </span>
    <span class="pmf_prod_v_precounitario">
        <?php echo $pmf->produto_precounitario; ?>
    </span>
    <span class="pmf_prod_n_precofinal">
        <?php echo JTEXT::_('MOD_PAGUEMEFACIL_PROD_PRECO_FINAL'); ?>:
    </span>
    <span class="pmf_prod_v_precofinal">
        <?php echo $pmf->produto_precofinal; ?>
    </span>
    
</fieldset>
<?php
endif;
if( $params->get('exibir_formulario_comprador', 1 ) ):
?>
<fieldset id="paguemefacil_comprador<?php echo $pmf->sufixo; ?>">
    <label for="_name"><?php echo JTEXT::_('MOD_PAGUEMEFACIL_NOME'); ?></label>
    <input type="text" name="name" id="pmf_nome<?php echo $pmf->sufixo; ?>" value="<?php echo $pmf->comprador_nome; ?>" /> 

    <label for="email"><?php echo JTEXT::_('MOD_PAGUEMEFACIL_EMAIL'); ?></label> 
    <input type="text" name="email" id="pmf_email<?php echo $pmf->sufixo; ?>" value="<?php echo $pmf->comprador_email; ?>"  />
    
    <label for="cep"><?php echo JTEXT::_('MOD_PAGUEMEFACIL_CEP'); ?></label> 
    <input type="text" name="cep" id="pmf_cep<?php echo $pmf->sufixo; ?>"value="<?php echo $pmf->comprador_cep; ?>"  />
    
    <label for="endecero"><?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENDERECO'); ?></label> 
    <input type="text" name="endecero" id="pmf_endereco<?php echo $pmf->sufixo; ?>" value="<?php echo $pmf->comprador_endereco; ?>"  />
    
    <label for="numero"><?php echo JTEXT::_('MOD_PAGUEMEFACIL_NUMERO'); ?></label> 
    <input type="text" name="numero" id="pmf_numero<?php echo $pmf->sufixo; ?>"value="<?php echo $pmf->comprador_numero; ?>"  />
    
    <label for="cidade"><?php echo JTEXT::_('MOD_PAGUEMEFACIL_CIDADE'); ?></label> 
    <input type="text" name="cidade" id="pmf_cidade<?php echo $pmf->sufixo; ?>"value="<?php echo $pmf->comprador_cidade; ?>"  />
    
    <label for="estado"><?php echo JTEXT::_('MOD_PAGUEMEFACIL_ESTADO'); ?></label> 
    <input type="text" name="estado" id="pmf_estado<?php echo $pmf->sufixo; ?>" value="<?php echo $pmf->comprador_estado; ?>"  />
</fieldset>
<?php
endif;
//https://pagseguro.uol.com.br/desenvolvedor/botoes_de_pagamento.jhtml
if( $params->get('exibir_ps', 1 ) ):
?>
<form target="pagseguro" action="https://pagseguro.uol.com.br/v2/checkout/cart.html?action=add" method="post" class="paguemefacil_pagseguro">
    <input type="hidden" name="receiverEmail" value="<?php echo $pmf->mp_ps_email; ?>" />
    <input type="hidden" name="currency" value="BRL" />
    <input type="hidden" name="itemId" value="<?php echo $pmf->produto_codigo; ?>" />
    <input type="hidden" name="itemDescription" value="<?php echo $pmf->produto_nome; ?>" />
    <input type="hidden" name="itemQuantity" value="<?php echo $pmf->produto_quantidade; ?>" />
    <input type="hidden" name="itemAmount" value="" />
    <input type="hidden" name="itemWeight" value="<?php echo $pmf->produto_peso; ?>" />
    <input type="hidden" name="itemShippingCost" value="" />
    <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_PS'); ?>" name="submit" class="submit" />
</form>
<?php
endif;
//https://www.pagamentodigital.com.br/site/Integracao/Carrinho/
if( $params->get('exibir_pd', 1 ) ):
?>
<form action="https://www.pagamentodigital.com.br/checkout/car/" method="post" target="carrinho" class="paguemefacil_pagamentodigital">
    <input name="email_loja" type="hidden" value="<?php echo $pmf->mp_pd_email; ?>">
    <input name="acao" type="hidden" value="add">
    <input name="cod_prod" type="hidden" value="<?php echo $pmf->produto_codigo; ?>">
    <input name="nome_prod" type="hidden" value="<?php echo $pmf->produto_nome; ?>">
    <input name="valor_prod" type="hidden" value="<?php echo $pmf->produto_precofinal; ?>" >
    <input name="peso_prod" type="hidden" value="<?php echo $pmf->produto_peso; ?>">
    <input name="quant_prod" type="hidden" value="<?php echo $pmf->produto_quantidade; ?>">
    <input type="hidden" name="nome" value="<?php echo $pmf->comprador_nome; ?>"/>
    <input type="hidden" name="email" value="<?php echo $pmf->comprador_email; ?>"/>
    <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_PD'); ?>" name="submit" class="submit" />
</form>
<?php
endif;
/* 
 * Mercado Pago
 * https://www.mercadopago.com/mlb/buttonConfigNew?step=fourthStep&ck=78572.38333537398
 */
if( $params->get('exibir_mp', 1 ) ):
?>
<form action="https://www.mercadopago.com/mlb/buybutton" method="post" class="paguemefacil_pagamentodigital">
    <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_MP'); ?>" name="submit" class="submit" />
    <input type="hidden" name="acc_id" value="12967111">
    <input type="hidden" name="url_cancel" value="http://http:/http://fititnt.org">
    <input type="hidden" name="item_id" value="<?php echo $pmf->produto_codigo; ?>">
    <input type="hidden" name="name" value="<?php echo $pmf->comprador_nome; ?>">
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
endif;
/* 
 * iPagare
 * http://documentacao.ipagare.com.br/inicio/gratis/b-integracao-2/2-integracao-html/2-1-exemplo
 */
if( $params->get('exibir_ipag', 1 ) ):
?>
<form action="https://ww2.ipagare.com.br/service/process.do" method="POST" class="paguemefacil_iparare">
    <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_IPAG'); ?>" name="submit" class="submit" />
    <input type="hidden" name="estabelecimento" value="estabelecimento">
    <input type="hidden" name="acao" value="acao">
    <input type="hidden" name="valor_total" value="valor_total">
    <input type="hidden" name="chave" value="chave">
    <input type="submit" value="Realizar o pagamento">
</form>

<?php
endif;
/* 
 * F2b
 * http://www.f2b.com.br/pt_BR/f2b/billing/web.jsp
 */
if( $params->get('exibir_f2b', 1 ) ):
?>
<!--
<FORM method="POST" action="http://www.f2b.com.br/BillingWeb" target="_BLANK">
    <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_F2B'); ?>" name="submit" class="submit" />
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
endif;
// Moip
//https://www.moip.com.br/AdmSimplePaymentButton.do
if( $params->get('exibir_moip', 1 ) ):
?>
<form method='post' action='https://www.moip.com.br/PagamentoSimples.do' class="paguemefacil_moip">
    <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_MOIP'); ?>" name="submit" class="submit" />
    <input type='hidden' name='id_carteira' value='fititnt'/>
    <input type='hidden' name='valor' value='12300'/>
    <input type='hidden' name='nome' value='mod_paguemefacil'/>
    <input type='hidden' name='descricao' value='descricao'/>
    <input type='hidden' name='id_transacao' value='meuid'/>
    <input type='hidden' name='tempo_entrega' value='123'/>
    <input type='hidden' name='frete' value='1'/>
    <input type='hidden' name='peso_compra' value='12000'/>
</form>

<?php
endif;
/*
 * Paypal
 * https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=developer/e_howto_html_formbasics
 */
if( $params->get('exibir_pp', 1 ) ):
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="paguemefacil_paypal">
 <input type="submit" value="<?php echo JTEXT::_('MOD_PAGUEMEFACIL_ENVIAR_PP'); ?>" name="submit" class="submit" />
 <input type="hidden" name="cmd" value="_cart">
 <input type="hidden" name="business" value="seller@designerfotos.com">
 <input type="hidden" name="item_name" value="hat">
 <input type="hidden" name="item_number" value="123">
 <input type="hidden" name="amount" value="15.00">
 <input type="hidden" name="first_name" value="John"> 
 <input type="hidden" name="last_name" value="Doe">
 <input type="hidden" name="address1" value="9 Elm Street">
 <input type="hidden" name="address2" value="Apt 5">
 <input type="hidden" name="city" value="Berwyn">
 <input type="hidden" name="state" value="PA">
 <input type="hidden" name="zip" value="19312">
 <input type="hidden" name="night_phone_a" value="610"> 
 <input type="hidden" name="night_phone_b" value="555"> 
 <input type="hidden" name="night_phone_c" value="1234">
 <input type="hidden" name="email" value="jdoe@zyzzyu.com">  
</form> 
<?php 
endif;
echo $modafter; 
?>