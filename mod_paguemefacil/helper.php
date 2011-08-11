<?php
/*
 * @package         Mod_simpletable
 * @author          Emerson Rocha Luiz ( emerson@webdesign.eng.br - @fititnt -  http://fititnt.org )
 * @copyright       Copyright (C) 2005 - 2011 Webdesign Assessoria em Tecnologia da Informacao.
 * @license         GPL3
 */
// no direct access
defined('_JEXEC') or die;


class SimpleTable {
    
    
    var $prelink = NULL;
    
    /*
     * Replace {$user->id} with id of current user and {$user->username} with username
     * @var         string          $string: string to search and replace
     * @return      string          $string
     */
    function convertFromSession($string){
        $user = JRequest::getuser();
        $string = str_replace('{$user->id}', $user->id, $string );
        $string = str_replace('{$user->username}', $user->id, $string );

        return $string;
    }
    
    /*
     * Return param of mod_simpletable
     */
    
    function getParam( &$params, $param, $default = NULL){
        //$module = &JModuleHelper::getModule('mod_simpletable');
        //$params = new JParameter($module->params);
        //$param = $params->get($param, $default);
        $params->get($param);
        return $param;
    }

    function getHeader( $params, $field){
        
        if( $params->get('jtextheading', 0) != 1 ) {
            return $field;
        }
        $field = JTEXT::_(strtoupper( $params->get('jtextheadingtext', 'MOD_SIMPLETABLE_') . $field  ) );
        return $field;
    }
    
    function addLink( $params, $row, $key, $item){
        
        if ($params->get('linkuse', 1) != 1){
            return $field;
        }
        
        $linkitens = $params->get('linkitens');
        if( $linkitens != '' ){
            $index = array();
            $index = explode(',', $linkitens );
        }
                
        $linkprefix = $params->get('linkprefix', 'index.php?option=com_content&amp;view=article&amp;id=');
        $linkvar = $params->get('linkvar', 'id');
        $linktarget = $params->get('linktarget', '');
        if($linktarget != ''){
            $linktarget = 'target="'.$linktarget.'" ';
        }
        switch ($params->get('linktranslate', 0)) {
            case 2:
                $linkfinal = JURI::base(true) . JRoute::_( $linkprefix . $row->$linkvar) ;
                break;
            case 1:
                $linkfinal = JRoute::_( $linkprefix . $row->$linkvar) ;
                break;
            default:
                $linkfinal = $linkprefix . $row->$linkvar;
                break;
        }
        //@todo: solve one really strange bug that makes the framework change the URL of this one when sef is enabled
        if( $linkitens == '' || in_array($key, $index )){           
            $link = '<a '.$linktarget.'href="'. $linkfinal . '">'.$item.'</a>';
            return $link ;
        }
        return $item;
    }

    function runQueryRaw( $params ){
        $query = $params->get('rawquery', NULL);
        $db = &JFactory::getDbo();
        $db->setQuery($query);
        $tableObject = $db->loadObjectList();
        return $tableObject;
    }
    
    /*
     * Prepare query and execute it
     * @return          object
     */

    function runQuery( $params ){

        if ( ! $params->get('advanced', 0) ){
            $where = $params->get('where', NULL);
            $where2 = $params->get('where2', NULL);
            $where3 = $params->get('where3', NULL);

        } else {
            $where = convertFromSession( $params->get('where', NULL) );
            $where2 = convertFromSession( $params->get('where2', NULL) );
            $where3 = convertFromSession( $params->get('where3', NULL) );
        }
        $select = $params->get('select', '*');
        $table = $params->get('table', '#__content_articles');
        $order = $params->get('order', NULL);
        $order2 = $params->get('order2', NULL);
        $order3 = $params->get('order3', NULL);

        $db = &JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select( $select );
        $query->from( $table );// do not try convert
        if ( $where  ) $query->where( $where );
        if ( $where2 ) $query->where( $where2 );
        if ( $where3 ) $query->where( $where3 );
        if ( $order  ) $query->order( $order );// do not try convert
        if ( $order2 ) $query->order( $order2 );// do not try convert
        if ( $order3 ) $query->order( $order3 );// do not try convert

        $db->setQuery($query);
        $tableObject = $db->loadObjectList();

        return $tableObject;
    } 
    
}
