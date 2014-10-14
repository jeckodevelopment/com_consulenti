<?php
/**
 * @version     1.0.1
 * @package     com_consulenti
 * @copyright   Copyright (C) 2014 Jecko Development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Luca Marzo <luca.marzo@live.com> - http://www.jeckodevelopment.com
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Incarico controller class.
 */
class ConsulentiControllerIncarico extends JControllerForm
{

    function __construct() {
        $this->view_list = 'incarichi';
        parent::__construct();
    }

}