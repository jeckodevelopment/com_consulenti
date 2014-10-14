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
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_CONSULENTI_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-incarico-delete-' + item_id).submit();
        }
    }
</script>

<div class="items">
    <table class="items_list">
	<thead>
		<tr>
		<th>Cognome</th>
		<th>Nome</th>
		<th>Inizio Incarico</th>
		<th>Fine Incarico</th>
		<th>Oggetto Incarico</th>
		<th>Importo in Euro</th>
		</tr>
	</thead>
	<tbody>
<?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>

            
				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_consulenti'))):
						$show = true;
						?>
						<tr>
							<td><?php echo $item->cognome; ?></td>
							<td><?php echo $item->nome; ?></td>
							<?php $dateini = new JDate($item->inizioincarico); ?>
							<td><?php echo $dateini->format('d-M-Y', false, false); ?></td>
							<?php $dateend = new JDate($item->fineincarico); ?>
							<td><?php echo $dateend->format('d-M-Y', false, false); ?></td>
							<td><?php echo $item->oggetto; ?></td>
							<td><?php echo $item->importo; ?></td>
							</tr>
						<?php endif; ?>

<?php endforeach; ?>
		</tbody>
		</table>
        <?php
        if (!$show):
            echo JText::_('COM_CONSULENTI_NO_ITEMS');
        endif;
        ?>
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>

