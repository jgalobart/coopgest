<div class="row">
	<div class="span8">
		<label><?=__('Search product');?> <input type="text" name="search" id="standSearch"/></label>
		<table class="table table-striped table-hover" id="stand">
			<thead>
				<tr>
					<th class="col_product"><?=__('Product');?></th>
					<th class="col_features"><?=__('Features');?></th>
					<th class="col_price"><?=__('Price');?></th>
					<th class="col_quantity"><?=__('Quantity');?></th>
					<th class="col_actions"><?=__('Actions');?></th>
				</tr>
			</thead>
			<tbody>
				<?foreach ($categories as $category) {
					$products_cat=$products->where('category','=',$category->id)->limit(2)->find_all();
					?>
				<tr class="category-<?=$category->id;?>"><th colspan="5"><i class="fui-triangle-right-large"></i><?=$category->category;?> (<?=sizeof($products_cat)?>)</th></tr>
				<?foreach ($products_cat as $product) {?>
					<tr class="category-<?=$category->id;?>">
						<td class="col_product">
							<?=$product->product?><br />
							<small>Ecoviand - Vallès Oriental</small>
						</td>
						<td class="col_features"><span class="label label-primary">ECO</span><span class="label label-warning">Temporada</span><span class="label label-important">Envàs de plàstic</span><span class="label label-info">Producte recomanat</span></td>
						<td class="col_price"><?=$product->price?>&nbsp;€/Kg</td>
						<td class="col_quantity">
 							<?//=FORM::input('quantity',0);?>
 							<input type="text" id="q<?=$product->id;?>" placeholder="" value="0" class="spinner">
						</td>
						<td class="col_actions"><a href="" id="p<?=$product->id;?>" class="btn btn-block btn-primary"><i class="fui-plus"></i>Afegir</a></td>
					</tr>
				<?}}?>
			</tbody>
			
		</table>
	</div>
	<div class="span4">
		<table class="table table-striped table-hover" id="orderSummary">
		</table>

		<table class="table table-striped table-hover" id="orderDetails">
		</table>
	</div>
</div>