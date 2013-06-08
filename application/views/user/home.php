<div class="row">
<div class="span8">
	<h1><?=__('Hello, world!')?></h1>
	<p><?=__('L’associació Remenant les Cireres es va constituir a l’abril de 2010 amb l’objectiu de promoure el consum responsable de productes ecològics i de proximitat. Ens diferenciem d’altres associacions similars pel fet que el treball voluntari no hi és obligatori, sinó que tenim tres persones que s’encarreguen de la tasca diària.')?></p>
	<p><?=__('Està formada per famílies que volen organitzar conjuntament les compres per tal de poder consumir de manera responsable. Per això, fem una comanda d’una setmana per l’altra mitjançant una cistella oberta, és a dir, escollint els productes que cada família desitja. Cada setmana es va ampliant la llista dels productes per poder arribar a una gran varietat: verdures, fruites, llegums, fruits secs, embotits, làctics, carn, conserves, melmelades, pa i productes de fleca, pasta, arròs, sucs…')?></p>
	<p><?=__('Ens podeu trobar els dijous a la tarda, de 5 a 9, al c. del Vapor, 1, al barri Centre-Creueta de Sabadell. O, si ho preferiu, podeu escriure’ns a: remenantlescireres@gmail.com.')?></p>
</div>
<div class="span4">
	<?=Form::open('user/home',array('class'=>'form-signin'))?>
	<h3 class="form-signin-heading"><?=__('Please sign in');?></h3>
	<?=Form::input('username','',array('class'=>'input-block-level','placeholder'=>__('Email address')));?>
	<?=Form::password('password','',array('class'=>'input-block-level','placeholder'=>__('Password')));?>
	<label class="checkbox">
		<?=Form::checkbox('remember-me',1,'');?> <?=__('Remember me');?>
	</label>
	<?=Form::button('signin', __('Sign in'), array('type' => 'submit', 'class'=>'btn btn-large btn-primary'));?>
	<?=Form::close()?>
	<?/*<p>Not a user? <?=HTML::anchor('user/signup',__('Create a leagbox account'));?></p>*/?>
	<?/*<p><?=HTML::anchor('user/forgot',__('Forgot your password?'));?></p>*/?>
</div>
</div>