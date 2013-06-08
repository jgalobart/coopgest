<div class="row">
	<ul class="breadcrumb">
		<?foreach ($breadcrumbs as $key => $value) {?>
			<?if ($value!="") {?>
				<li><?=HTML::anchor($value,$key)?></li>
			<?}else{?>
				<li class="active"><?=$key;?></li>
			<?}?>
		<?}?>
	</ul>
</div>