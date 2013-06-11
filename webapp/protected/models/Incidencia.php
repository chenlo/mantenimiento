<?php

/**
 * This is the model class for table "tbl_incidencia".
 *
 * The followings are the available columns in table 'tbl_incidencia':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $create_time
 * @property integer $create_usuario_id
 * @property string $update_time
 * @property integer $update_usuario_id
 * @property integer $estado_id
 * @property integer $prioridad_id
 * @property integer $asignado_usuario_id
 *
 * The followings are the available model relations:
 * @property Tarea[] $tareas
 */
class Incidencia extends CActiveRecord
{
        const ESTADO_SIN_ASIGNAR=0;
        const ESTADO_SIN_EMPEZAR=1;
        const ESTADO_EMPEZADA=2;
        const ESTADO_FINALIZADA=3;
        const ESTADO_PENDIENTE=4;
        
        const PRIORIDAD_BAJA=0;
        const PRIORIDAD_MEDIA=1;
        const PRIORIDAD_ALTA=2;
        
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Incidencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_incidencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, descripcion', 'required'),
			array('create_usuario_id, update_usuario_id, estado_id, prioridad_id, asignado_usuario_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, create_time, create_usuario_id, update_time, update_usuario_id, estado_id, prioridad_id, asignado_usuario_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'creador' => array(self::BELONGS_TO, 'User', 'create_usuario_id'),
                        'actualizador' => array(self::BELONGS_TO, 'User', 'update_usuario_id'),
                        'asignado' => array(self::BELONGS_TO, 'User', 'asignado_usuario_id'),
                        'tareas' => array(self::HAS_MANY, 'Tarea', 'incidencia_id'),
                        'comentarios' => array(self::HAS_MANY, 'Comentario', 'incidencia_id', 'order'=>'`comentarios`.create_time DESC'),
                        'comentariosCount' => array(self::STAT, 'Comentario', 'incidencia_id'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripción',
			'create_time' => 'Fecha de alta',
			'create_usuario_id' => 'Usuario',
			'update_time' => 'Última actualización',
			'update_usuario_id' => 'Actualizada por',
			'estado_id' => 'Estado',
			'prioridad_id' => 'Prioridad',
                        'asignado_usuario_id' => 'Asignada a ',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $criteria->with = array('asignado');
                $criteria->with = array('creador');
                $criteria->order = "prioridad_id DESC, create_time";
                $criteria->condition = 'estado_id!=3';
		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_usuario_id',$this->create_usuario_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_usuario_id',$this->update_usuario_id);
		$criteria->compare('estado_id',$this->estado_id);
		$criteria->compare('prioridad_id',$this->prioridad_id);
                $criteria->compare('asignado_usuario_id',$this->asignado_usuario_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
          public function getEstadoOptions()
        {
            return array(
                self::ESTADO_SIN_ASIGNAR=>'Sin asignar',
                self::ESTADO_SIN_EMPEZAR=>'Sin empezar',
                self::ESTADO_EMPEZADA=>'Empezada',
                self::ESTADO_FINALIZADA=>'Finalizada',
                self::ESTADO_PENDIENTE=>'Pendiente',
            );
        }
        
        public function getPrioridadOptions()
        {
            return array(
                self::PRIORIDAD_BAJA=>'Baja',
                self::PRIORIDAD_MEDIA=>'Media',
                self::PRIORIDAD_ALTA=>'Alta',
            );
        }
        
        public function getEstadoText()
        {
            $estadoOptions=$this->estadoOptions;
            return isset($estadoOptions[$this->estado_id]) ? $estadoOptions[$this->estado_id] : "unknown status ({$this->estado_id})";
        }
        
        public function getPrioridadText()
        {
            $prioridadOptions=$this->prioridadOptions;
            return isset($prioridadOptions[$this->prioridad_id]) ? $prioridadOptions[$this->prioridad_id] : "unknown status ({$this->prioridad_id})";
        }
        
        public function getNombreText()
        {
            $result = $this->nombre;
            if(strlen($result)>100){
                $result = substr($result,0,100);
                $result .= "...";
            }
            return $result;
        }
        
        protected function beforeSave()
        {
            if(null !== Yii::app()->user)
                $id=Yii::app()->user->id;
            else
                $id=1;
            if($this->isNewRecord)
                $this->create_usuario_id=$id;
                $this->update_usuario_id=$id;
            return parent::beforeSave();
        }


        public function behaviors()
        {
            return array(
                'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time',
                'setUpdateOnCreate' => true,
                ),
            );
        }
        
        public function asignarUsuario($usuarioId)
        {
            $command = Yii::app()->db->createCommand();
            $command->insert('tbl_incidencia', array(
                'asignado_usuario_id'=>$this->asignado_usuario_id,
            ));
        }
        
        public function annadirComentario($comentario)
        {
            $comentario->incidencia_id=$this->id;
            return $comentario->save();
        }
        
        public function scopes()
        {
            return array(
                'cerradas'=>array(
                'condition'=>'estado_id=3',
                'order'=>'create_time DESC',
                'limit'=>10,
                ),
            );
            
        }

        public static function getPrioridades(){
           return array(
                self::PRIORIDAD_BAJA,
                self::PRIORIDAD_MEDIA,
                self::PRIORIDAD_ALTA,
            );
        }
}