<?php
/*
 * @package         mod_paguemefacil
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - @fititnt -  http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GPL3
 */
// no direct access
defined('_JEXEC') or die;


class PaguemeFacil {
    
    /* Paguemefacil
     * 
     * @var         string
     */
    public $comprador_cep;
    
    /* Paguemefacil
     * 
     * @var         string
     */
    public $comprador_cidade;
    
    /* Paguemefacil
     * 
     * @var         string
     */
    public $comprador_email;
    
    /* Paguemefacil
     * 
     * @var         string
     */
    public $comprador_endereco;
    
    /* Paguemefacil
     * 
     * @var         string
     */
    public $comprador_estado;
    
    
    /* Paguemefacil
     * 
     * @var         string
     */
    public $comprador_nome;
    
    /* Paguemefacil
     * 
     * @var         string
     */
    public $comprador_numero;
    
    /* Paguemefacil
     * Nome do produto
     * 
     * @var         string
     */
    public $produto_nome;
    
    /* Paguemefacil
     * Descricao do produto
     * 
     * @var         string
     */
    public $produto_descricao;
    
    /* Paguemefacil
     * Codigo do produto
     * 
     * @var         string
     */
    public $produto_codigo;
    
    /* Paguemefacil
     * Codigo do produto
     * 
     * @var         string
     */
    public $produto_peso;
    
    /* Paguemefacil
     * Codigo do produto
     * 
     * @var         string
     */
    public $produto_quantidade;
    
    /* Paguemefacil
     * Preco do produto, unitario
     * 
     * @var         string
     */
    public $produto_precounitario;
    
    /* Paguemefacil
     * Preco do produto, final
     * 
     * @var         string
     */
    public $produto_precofinal;

    /* Metodo de Pagamento: Pagamento Digital
     * Este é o email do vendedor que receberá o valor a ser pago
     * 
     * @var         string
     */
    public $mp_pd_email;
    
    /* Metodo de Pagamento: PagSeguro
     * Este é o email do vendedor que receberá o valor a ser pago
     * 
     * @var         string
     */
    public $mp_ps_email;
    
    /* Paguemefacil: variavel interna
     * Sufixo do modulo e de IDs. Essencial para estilizar e permitir selecao via javascript
     * 
     * @var         string
     */
    var $sufixo;
    
   function __construct() 
   {
       
   }
   
   public function set($var, $value)
   {
       $this->$var = $value;
       return $this;
   }
   
   public function initialize( $params )
   {
   }

   
      
}
