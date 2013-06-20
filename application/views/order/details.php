			<thead>
				<tr>
					<tr><th colspan="4"><i class="icon-pencil"></i> Detall de la comanda</th></tr>
				</tr>
			</thead>
			<tbody>
				<?foreach ($lines as $line) {?>
				<tr>
					<td><strong><?=$line['product']?></strong><br />x<?=$line['quantity']?></td>
					<td><br /><?=$line['price']*$line['quantity']?>&nbsp;€</td>
					<td><br /><?=HTML::anchor('','<i class="fui-cross"></i>');?></td>
				</tr>
				<?}?>
			</tbody>