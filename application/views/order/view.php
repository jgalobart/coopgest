<div class="row">
	<div class="span8">
		<label><?=__('Search product');?> <input type="text" name="search" id="standSearch"/></label>
		<table class="table table-striped table-hover" id="stand">
			<thead>
				<tr>
					<th><?=__('Product');?></th>
					<th><?=__('Features');?></th>
					<th><?=__('Price');?></th>
					<th><?=__('Quantity');?></th>
					<th><?=__('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?foreach ($categories as $category) {
					$products_cat=$products->where('category','=',$category->id)->find_all();
					?>
				<tr class="category-<?=$category->id;?>"><th colspan="5"><i class="fui-triangle-right-large"></i><?=$category->category;?> (<?=sizeof($products_cat)?>)</th></tr>
				<?foreach ($products_cat as $product) {?>
					<tr class="category-<?=$category->id;?>">
						<td>
							<?=$product->product?><br />
							<small>Ecoviand - Vallès Oriental</small>
						</td>
						<td><span class="label label-primary">ECO</span><span class="label label-warning">Temporada</span><span class="label label-important">Envàs de plàstic</span><span class="label label-info">Producte recomanat</span></td>
						<td><?=$product->price?>&nbsp;€/Kg</td>
						<td>
 			<div class="control-group">
				<span class="ui-spinner ui-widget ui-widget-content ui-corner-all"><input type="text" id="spinner-01" placeholder="" value="0" class="spinner ui-spinner-input" aria-valuemin="-99" aria-valuemax="99" aria-valuenow="0" autocomplete="off" role="spinbutton"><a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-n"></span></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-s"></span></a></span>
	</div>
						</td>
						<td><a href="" class="btn btn-block btn-primary"><i class="fui-plus"></i>Afegir</a></td>
					</tr>
				<?}}?>
			</tbody>
			
		</table>
	</div>
	<div class="span4">
		<table class="table table-striped table-hover">
			<tbody>
				<tr><td colspan="2"><?=__('Products');?></td><td>36</td></tr>
				<tr><td colspan="2"><?=__('Total');?></td><td>36,45&nbsp;€</td></tr>
			</tbody>
						<thead>
				<tr>
					<th colspan="3"><i class="icon-shopping-cart"></i> Resum de comanda</th>
				</tr>
			</thead>
		</table>

		<table class="table table-striped table-hover" id="order">
			<thead>
				<tr>
					<tr><th colspan="4"><i class="icon-pencil"></i> Detall de la comanda</th></tr>
				</tr>
			</thead>
			<tbody>
				<?for ($i=1;$i<20;$i++) {?>
				<tr>
					<td>BLEDA ECO Molt maques i tendres.</td>
					<td>x3</td>
					<td>7,80&nbsp;€</td>
					<td><?=HTML::anchor('','<i class="fui-cross"></i>');?></td>
				</tr>
				<?}?>
			</tbody>
		</table>
	</div>
</div>