<?php foreach($comentarios as $comentario): ?>
<div class="comment">
    <div class="author">
        <?php echo CHtml::encode($comentario->autor->profile->firstname." ".$comentario->autor->profile->lastname); ?>:
        el <?php echo date('d-m-Y - h:i',strtotime($comentario->create_time)); ?>
    </div>
    <div class="content">
        <?php echo nl2br(CHtml::encode($comentario->contenido)); ?>
    </div>
<hr>
</div><!-- comment -->
<?php endforeach; ?>