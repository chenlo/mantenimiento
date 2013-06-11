<?php
class Estadisticas {
    
    public static function getCountIncidenciasResueltas($usuario,$mes,$anno)
    {
        $sql = "SELECT username FROM users";
        $command = Yii::app()->db->createCommand($sql);
        $rows = $command->queryAll();
    }
    
    public static function getUsuariosPersonal(){
        $sql = "SELECT *
          FROM users u
          JOIN AuthAssignment aa ON aa.userid = u.id
          WHERE aa.itemname = 'personal' OR aa.itemname = 'responsable'
          ORDER BY u.username";
        $rows = Yii::app()->db->createCommand($sql)->queryAll();
        
        return $rows;
    }
    
    public static function getArrayFromAtributo($rows,$atributo){
        $result=array();
        foreach($rows as $max)
        {
            array_push($result,$max[$atributo]);
        }
            
        return $result;
    }
    
    public static function getIncidenciasPersonal($idusuario,$prioridad,$year,$month){
        $sql = "SELECT count(*)
          FROM tbl_incidencia         
          WHERE estado_id = 3 
          AND asignado_usuario_id = $idusuario 
          AND prioridad_id = $prioridad
          AND YEAR(create_time) = $year";
        
        if("00"!=$month)
          $sql .= " AND MONTH(create_time) = $month";
        
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        
        return (int) $result['count(*)'];
        
    }
    
    public static function getIncidencias($estado,$prioridad,$year,$month){
        $sql = "SELECT count(*)
          FROM tbl_incidencia         
          WHERE estado_id = $estado 
          AND prioridad_id = $prioridad
          AND YEAR(create_time) = $year";
        
        if("00"!=$month)
          $sql .= " AND MONTH(create_time) = $month";
        
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        
        return (int) $result['count(*)'];
        
    }
    
    
    public static function getTotalUsuario($idusuario,$year,$month){
        $sql = "SELECT sum(tiempo_realizacion) as suma
          FROM tbl_tarea         
          WHERE update_user_id = $idusuario 
          AND estado_id = 2
          AND YEAR(create_time) = $year";
        
        if("00"!=$month)
          $sql .= " AND MONTH(create_time) = $month";
        
        $result = Yii::app()->db->createCommand($sql)->queryRow();
        
        $total = (float) $result['suma'];
        
        return (float) $result['suma'];
    }
    
     public static function getPorcentajeTiempoTareas($idusuario,$year,$month){
        
        $sql = "SELECT tiempo_realizacion as tiempo
          FROM tbl_tarea         
          WHERE update_user_id = $idusuario 
          AND estado_id = 2
          AND YEAR(create_time) = $year";
        
        if("00"!=$month)
          $sql .= " AND MONTH(create_time) = $month";
        
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        
        $total = count($result);
        if($total==0){
            $porcentaje = array();
        } else {
            $menos15 = 0;
            $menos30 = 0;
            $menos60 = 0;
            $menos120 = 0;
            $mas120 = 0;
            foreach($result as $r){
                if($r["tiempo"]>0 && $r["tiempo"]<=15) {
                    $menos15++;
                } else if($r["tiempo"]>15 && $r["tiempo"]<=30) {
                    $menos30++;
                } else if($r["tiempo"]>30 && $r["tiempo"]<=60) {
                    $menos60++;
                } else if($r["tiempo"]>60 && $r["tiempo"]<=120) {
                    $menos120++;
                } if($r["tiempo"]>120) {
                    $mas120++;
                }
            }

            $menos15 = (float) (($menos15*100) / $total);
            $menos30 = (float) (($menos30*100) / $total);
            $menos60 = (float) (($menos60*100) / $total);
            $menos120 = (float) (($menos120*100) / $total);
            $mas120 = (float) (($mas120*100) / $total);

            $porcentaje = array($menos15,$menos30,$menos60,$menos120,$mas120);    
        }
        
        return $porcentaje;
    }
    
}
?>
