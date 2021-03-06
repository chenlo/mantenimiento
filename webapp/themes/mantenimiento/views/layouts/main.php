<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header"></div><!-- header image is embeded into the #header declaration in main.css -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				///Estaticas, visibles para los invitados
                                array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Personal', 'url'=>array('/site/page', 'view'=>'personal'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Contacto', 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->isGuest),
				///Admin
                                array('label'=>'Permisos', 'url'=>array('/rights'), 'visible'=>Yii::app()->user->checkAccess('admin')),
                                array('label'=>'Usuarios', 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->checkAccess('admin')),
				array('label'=>'Incidencias', 'url'=>array('/incidencia/admin'), 'visible'=>Yii::app()->user->checkAccess('admin')),
                                ///Usuario
                                array('label'=>'Nueva incidencia', 'url'=>array('/incidencia/create'), 'visible'=>Yii::app()->user->checkAccess('usuario')),    
                                array('label'=>'Mis incidencias', 'url'=>array('/incidencia/misincidencias'), 'visible'=>Yii::app()->user->checkAccess('usuario')),
                                ///Personal
                                array('label'=>'Incidencias asignadas', 'url'=>array('/incidencia/asignadas'), 'visible'=>Yii::app()->user->checkAccess('personal')),
                                ///Responsable
                                array('label'=>'Incidencias', 'url'=>array('/incidencia/admin'), 'visible'=>Yii::app()->user->checkAccess('responsable')),
                                ///Común
                                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                                array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by TrackStar.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
