<div class="row">
	<div class="span8">
		<select>
			<option>Ecoviand</option>
			<option>Mas Grau</option>
		</select>
		<select>
			<option>Cistelles</option>
			<option>Nevera</option>
		</select>
		<select>
			<option>Per a repartir</option>
			<option>Repartides</option>
		</select>
		<a class="btn btn-primary"><i class="fui-check"></i> <?=__('Search');?></a>
	</div>
	<div class="span4">
		<div class="btn-toolbar">
                <div class="btn-group">
					<a class="btn btn-primary"><i class="fui-list-numbered"></i><?=__('Product view')?></a>
					<a class="btn btn-primary"><i class="fui-list-columned"></i><?=__('Family view')?></a>
                </div>
              </div>
	</div>
</div>
<div class="row">
	<div class="span12">
		<table class="table table-striped table-hover" id="replenishment">
			<tbody>
				<?foreach ($products as $product) {?>
					<tr>
						<td><strong><?=$product->product?></strong><br /> Ecoviand<br /><input type="text" value="<?=$product->price?>" style="width:4em;"/> &euro; / gr</td>
						<td class="col_families">
							<?for ($i=1;$i<8;$i++){?>
								<label style="float:left;">F<?=$i?>:<br /><input type="text" class="spinner" value="200" /></label>
							<?}?>
						</td>
						<td class="col_actions">
							<? if ($product->id<3) {?> 
								<a class="btn btn-mini btn-success" title="repostar"><i class="fui-check"></i></a>
							<?} else if ($product->id<5 ) {?>
								<a class="btn btn-mini btn-danger" title="repostar"><i class="fui-cross"></i></a>
							<?} else {?>
								<a class="btn btn-mini" title="repostar"><i class="fui-check"></i></a>
								<a class="btn btn-mini btn-error" title="repostar"><i class="fui-cross"></i></a>
							<?}?>
						</td>
						<td class="col_total">
							4.200 Kg
						</td>
					</tr>
				<?}?>

			</tbody>
			<thead>
				<tr>
					<th><?=__('Product');?></th>
					<th><?=__('Families');?></th>
					<th><?=__('Actions');?></th>
					<th><?=__('Total');?></th>
				</tr>
			</thead>
		</table>
	</div>
</div>