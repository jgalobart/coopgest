<div class="row">
<div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?=HTML::anchor('user/index',__('Remenant les cireres'),array("class"=>"brand"))?>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><?=HTML::anchor('league/list',__('Productes'))?></li>
              <li><?=HTML::anchor('club/list',__('Comandes'))?></li>
            </ul>
              <?if ($user) {?>
                <ul class="nav pull-right">
                  <li><a>Familia: <?=$user->id?></a></li>
                  <li><a><?=$user->email?></a></li>
                  <?/*<li><?=HTML::anchor('message/list','<span class="iconbar-unread">19</span>',array('class'=>'fui-mail'))?></li>*/?>
                  <li><?=HTML::anchor('user/logout','',array('class'=>'fui-exit'))?></li>
                </ul>
              <?}?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
</div>