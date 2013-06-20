<div class="row">
	<div class="span8">
		<table class="table table-striped table-hover">
			<tbody>
				<? for ($i=0;$i<39;$i++) {?>
					<tr>
						<td>Escarola ECO</td>
						<td>x2</td>
						<td>0,79 &euro;</td>
						<td>1,58 &euro;</td>
					</tr>
				<?}?>
			</tbody>
			<thead>
				<tr>
					<th>Producte</th>
					<th>Quantitat</th>
					<th>Preu</th>
					<th>Total</th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="span4">
		<table class="table table-striped table-hover">
			<tbody>
				<tr>
					<td>Productes:</td>
					<td>39</td>
				</tr>
				<tr>
					<td>Total:</td>
					<td>983,00 &euro;</td>
				</tr>
			</tbody>
			<thead>
				<tr><th colspan="2">
					<select>
							<?foreach ($providers as $provider){?>
								<option><?=$provider->provider?></option>
							<?}?>
						</select>
				</th></tr>
			</thead>
		</table>
	</div>
</div>