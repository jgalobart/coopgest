			<thead>
				<tr>
					<tr><th colspan="4"><i class="icon-pencil"></i> Detall de la comanda</th></tr>
				</tr>
			</thead>
			<tbody>
				<?foreach ($lines as $line) {?>
				<tr>
					<td><?=$line['product']?></td>
					<td>x<?=$line['quantity']?></td>
					<td><?=$line['price']?>&nbsp;€</td>
					<td><?=HTML::anchor('','<i class="fui-cross"></i>');?></td>
				</tr>
				<?}?>
			</tbody>