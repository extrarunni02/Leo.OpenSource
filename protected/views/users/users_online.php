<h1><?php echo Yii::t('translations','Пользователи Online')?></h1>

<h4>
<?php 
	foreach($users as $key => $user)
	{
		echo '<img src="http://mctop.im/static/img/flags/'.$user->language.'.png"> <a href="/u'.$user->id.'">'.$user->name. ' '.$user->surname.'</a><br><br>';
	}
?>
</h4>