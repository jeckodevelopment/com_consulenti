<?php
/**
 * @version     1.0.1
 * @package     com_consulenti
 * @copyright   Copyright (C) 2014 Jecko Development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Luca Marzo <luca.marzo@live.com> - http://www.jeckodevelopment.com
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_consulenti/assets/css/consulenti.css');
?>
<script type="text/javascript">
    function getScript(url,success) {
        var script = document.createElement('script');
        script.src = url;
        var head = document.getElementsByTagName('head')[0],
        done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState
                || this.readyState == 'loaded'
                || this.readyState == 'complete')) {
                done = true;
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            }
        };
        head.appendChild(script);
    }
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',function() {
        js = jQuery.noConflict();
        js(document).ready(function(){
            

            Joomla.submitbutton = function(task)
            {
                if (task == 'incarico.cancel') {
                    Joomla.submitform(task, document.getElementById('incarico-form'));
                }
                else{
                    
                    if (task != 'incarico.cancel' && document.formvalidator.isValid(document.id('incarico-form'))) {
                        
                        Joomla.submitform(task, document.getElementById('incarico-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
        });
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_consulenti&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="incarico-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_CONSULENTI_LEGEND_INCARICO'); ?></legend>
            <ul class="adminformlist">

                				<li><?php echo $this->form->getLabel('id'); ?>
				<?php echo $this->form->getInput('id'); ?></li>
				<li><?php echo $this->form->getLabel('state'); ?>
				<?php echo $this->form->getInput('state'); ?></li>

				<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php } 
				else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

				<?php } ?>				<li><?php echo $this->form->getLabel('cognome'); ?>
				<?php echo $this->form->getInput('cognome'); ?></li>
				<li><?php echo $this->form->getLabel('nome'); ?>
				<?php echo $this->form->getInput('nome'); ?></li>
				<li><?php echo $this->form->getLabel('codfisc'); ?>
				<?php echo $this->form->getInput('codfisc'); ?></li>
				<li><?php echo $this->form->getLabel('inizioincarico'); ?>
				<?php echo $this->form->getInput('inizioincarico'); ?></li>
				<li><?php echo $this->form->getLabel('fineincarico'); ?>
				<?php echo $this->form->getInput('fineincarico'); ?></li>
				<li><?php echo $this->form->getLabel('oggetto'); ?>
				<?php echo $this->form->getInput('oggetto'); ?></li>
				<li><?php echo $this->form->getLabel('importo'); ?>
				<?php echo $this->form->getInput('importo'); ?></li>


            </ul>
        </fieldset>
    </div>

    

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    <div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>