<div class="row">
<div class="span4">
	<?=Form::open('user/signup',array('class'=>'form-signup'))?>
  <h2 class="form-signup-heading"><?=__('Please sign up');?></h2>
  <?=Form::input('fname','',array('class'=>'input-block-level','placeholder'=>__('First name')));?>
  <?=Form::input('lname','',array('class'=>'input-block-level','placeholder'=>__('Last name')));?>
  <?=Form::input('username','',array('class'=>'input-block-level','placeholder'=>__('Email address')));?>
  <?=Form::button('signin', __('Sign up'), array('type' => 'submit', 'class'=>'btn btn-large btn-primary'));?>
  <?=Form::close()?>
</div>
<div class="span8">
</div>
</div>