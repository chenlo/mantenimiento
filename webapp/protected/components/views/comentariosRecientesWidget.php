<ul>
<?php foreach($this->getData() as $comentario): ?>  
        <div class="author">
                <?php echo $comentario->autor->profile->firstname." ".$comentario->autor->profile->lastname; ?> añadió un comentario en la incidencia:
        </div>
        <div class="issue">      
           <?php echo CHtml::link(CHtml::encode($comentario->incidencia->nombre), array('incidencia/view', 'id'=>$comentario->incidencia->id)); ?>
            <br>
            <?php echo $comentario->update_time ?>
    </div>
    <hr/>
<?php endforeach; ?>
</ul>
