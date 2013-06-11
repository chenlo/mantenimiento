<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="es"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta name="description" content="Gestor de Incidencias del Departamento de Mantenimiento" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/css.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/zerogrid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/responsiveslides.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/logo.css" />


    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" rel='icon' type='image/x-icon'/>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>	
    
</head>
<body>
<!--------------Header--------------->
<header>
<div class="subnav">
    <div class="wrap-subnav zerogrid">
        <div class="links">
            <?php $this->widget('zii.widgets.CMenu',array(
                'items'=>array(
                        ///Estaticas, visibles para los invitados
                        array('label'=>'Home', 'url'=>array('/site/index')),
                        array('label'=>'Personal', 'url'=>array('/site/page', 'view'=>'personal')),
                        array('label'=>'Contacto', 'url'=>array('/site/contact')),
                ),
        )); ?>
            
    </div>
    <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
            )); ?><!-- breadcrumbs -->
    <?php endif?>
</div>
</div>
    <div class="wrap-header zerogrid">
        <div id="logo">
            <!-- <img src="./images/logo.png"/> -->
            <h1 class="logo">
                <a href="site/index"><?php echo CHtml::encode(Yii::app()->name); ?></a>
            </h1>
        </div>
        <div id="search">

        </div>
    </div>
</header>

<nav>
	<div class="wrap-nav zerogrid">
		<div class="menu">
			<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				
				///Usuario
				array('label'=>'Nueva incidencia', 'url'=>array('/incidencia/create'), 'visible'=>Yii::app()->user->checkAccess('usuario')),    
				array('label'=>'Mis incidencias', 'url'=>array('/incidencia/misincidencias'), 'visible'=>Yii::app()->user->checkAccess('usuario')),
				///Personal
				array('label'=>'Incidencias asignadas', 'url'=>array('/incidencia/asignadas'), 'visible'=>Yii::app()->user->checkAccess('personal')),
				///Responsable
				array('label'=>'Incidencias', 'url'=>array('/incidencia/admin'), 'visible'=>Yii::app()->user->checkAccess('responsable')),
                                 ///Admin
                                array('label'=>'Incidencias', 'url'=>array('/incidencia/admin'), 'visible'=>Yii::app()->user->checkAccess('admin')),
                                array('label'=>'Usuarios', 'url'=>array('/user/admin'), 'visible'=>Yii::app()->user->checkAccess('admin')),
                                array('label'=>'Permisos', 'url'=>array('/rights'), 'visible'=>Yii::app()->user->checkAccess('admin')),
				
                                
                            
                            
				
				///Común
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
                                array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Registration"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
                            
                                array('label'=>'Estadísticas','url'=>array('/site/page', 'view'=>'estadisticas'),
                                    'items' => array(
                                        array('label'=>'Incidencias','url'=>array('/site/page', 'view'=>'estadisticas_incidencias')),
                                        array('label'=>'Tareas','url'=>array('/site/page', 'view'=>'estadisticas_tareas')),
                                        array('label'=>'Personal','url'=>array('/site/page', 'view'=>'estadisticas_personal')),
                                    ),'visible'=>Yii::app()->user->checkAccess('admin'),
                                )
                            
				),
                            
                            
		)); ?>
		</div>
		
	</div>
</nav>

<!--------------Content--------------->
<section id="wrapper">
	<div class="wrap-content zerogrid">
            <div id="main-content">
                    <?php echo $content; ?>
            </div>	
	</div>
</section>
<!--------------Footer--------------->
<footer>
	<div class="copyright">
		<p>
                    <a href="http://www.yiiframework.com" target="_blank">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/yii.png" />
                    </a>
		</p>
	</div>
</footer>
</body>
</html>
