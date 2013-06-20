<div class="row">
	<div class="span8">
		<table class="table table-striped table-hover">
			<tbody>
				<?foreach($weeks as $week) {?>
					<tr>
						<td><?=$week->id?></td>
						<td><?=$week->start?></td>
						<td><?=$week->end?></td>
						<td>
							<?switch ($week->status) : case 1 : ?>
								<a class="btn btn-mini btn-primary btn-danger" title="tancar comandes"><i class="fui-pause"></i></a>
								<a class="btn btn-mini disabled" title="fer comanda proveidors"><i class="fui-mail"></i></a>
								<a class="btn btn-mini disabled" title="revisar stock"><i class="fui-tag"></i></a>
								<a class="btn btn-mini disabled" title="repostar"><i class="fui-exit"></i></a>
								<a class="btn btn-mini disabled" title="tancar setmana"><i class="fui-cross"></i></a>
							<? break; case 2: ?>
								<a class="btn btn-mini disabled" title="tancar comandes"><i class="fui-pause"></i></a>
								<a class="btn btn-mini btn-primary btn-inverse" title="fer comanda proveidors"><i class="fui-mail"></i></a>
								<a class="btn btn-mini btn-primary btn-inverse" title="revisar stock"><i class="fui-tag"></i></a>
								<a class="btn btn-mini btn-primary btn-inverse" title="repostar"><i class="fui-exit"></i></a>
								<a class="btn btn-mini btn-primary btn-danger" title="tancar setmana"><i class="fui-cross"></i></a>
							<? break; case 3: ?>
								<a class="btn btn-mini disabled" title="tancar comandes"><i class="fui-pause"></i></a>
								<a class="btn btn-mini disabled" title="fer comanda proveidors"><i class="fui-mail"></i></a>
								<a class="btn btn-mini disabled" title="revisar stock"><i class="fui-tag"></i></a>
								<a class="btn btn-mini disabled" title="repostar"><i class="fui-exit"></i></a>
								<a class="btn btn-mini disabled" title="tancar setmana"><i class="fui-cross"></i></a>
							<? endswitch;?>
						</td>
					</tr>
				<?}?>
			</tbody>
			<thead>
				<tr>
					<th><?=__('week');?></th>
					<th><?=__('starts');?></th>
					<th><?=__('ends');?></th>
					<th><?=__('actions');?></th>
				</tr>
			</thead>
		</table>
	</div>
	<div class="span4">
		<p><a class="btn btn-primary"><i class="fui-play"></i> Obrir nova setmana</a></p>
		<p>Llegenda:</p>
		<p><a class="btn btn-mini btn-primary btn-danger"><i class="fui-pause"></i></a> tancar comandes</p>
		<p><a class="btn btn-mini btn-primary btn-inverse"><i class="fui-mail"></i></a> fer comanda proveidors</p>
		<p><a class="btn btn-mini btn-primary btn-inverse"><i class="fui-tag"></i></a> revisar stock</p>
		<p><a class="btn btn-mini btn-primary btn-inverse"><i class="fui-exit"></i></a> repostar</p>
		<p><a class="btn btn-mini btn-primary btn-danger"><i class="fui-cross"></i></a> tancar setmana</p>
	</div>
</div>