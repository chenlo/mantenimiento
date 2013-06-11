<?php
/**
 * RecentCommentsWidget is a Yii widget used to display a list of recent comments 
 */
class ComentariosRecientesWidget extends CWidget
{
	private $_comentarios;  
	public $elementos = 5;
	public $incidenciaId = null;
	
    public function init()
    {
        if(null !== $this->incidenciaId)
            $this->_comentarios = Comentario::model()->with(array('incidencia'=>array('condition'=>'id='.$this->incidenciaId)))->recent($this->incidenciaId)->findAll();
        else
            $this->_comentarios = Comentario::model()->recientes($this->elementos)->findAll();
    }  

    public function getData()
    {
            return $this->_comentarios;
    }

    public function run()
    {
        $this->render('comentariosRecientesWidget');
    }
}
