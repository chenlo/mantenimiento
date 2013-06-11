<?php $this->pageTitle=Yii::app()->name . " del Departamento de mantenimiento "; ?>
<h1>Bienvenido/a al <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<?php if(!Yii::app()->user->isGuest){ ?>
<br>
    <h2>Hola <?php echo Yii::app()->user->username ?></h2>
    <br>
    <p>
        Tu último login fué el <?php echo date("d-m-Y",strtotime(Yii::app()->user->lastvisit_at)); ?>.
    </p>
<?php } else { ?>
    <h2>Misión y objetivos</h2>
    <p>
        Este departamento de la Escuela Técnica planifica, asesora, ejecuta y controla  el mantenimiento 
        total de la infraestructura y equipo universitario en todas sus instalaciones.
    </p>
    <p>
        Trabajamos para que todos los sistemas estén en óptimas condiciones de funcionamiento y seguridad, 
        asumiendo en todo momento el compromiso de mejorar la calidad de vida dentro del centro.
    </p>
    <p>La función es asistir a todos los Departamentos académicos y no académicos en las actividades que requieran apoyo logístico y mantenimiento edilicio.</p>
    <p>Se garantiza la seguridad física y la de los bienes de la universidad. Además se colabora en la realización de obras nuevas</p>
    <h2>Funcionamiento del gestor de incidencias</h2>
    <p>
        Para mejorar la relación con nuestros usuarios y dar un mejor servicio, disponemos de una plataforma online para el
        alta y gestión de incidencias.
    </p>
    <p>
        Para empezar a utilizar la aplicación debe registrarse en la misma. A partir de ese momento, ya podrá
        dar de alta sus incidencias y seguir su evolución. Así, podrá hacernos los comentarios que considere oportunos
        para la mejor solución de la misma.
    </p>     
<?php };?>    
