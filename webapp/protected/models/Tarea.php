<?php

/**
 * This is the model class for table "tbl_tarea".
 *
 * The followings are the available columns in table 'tbl_tarea':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $incidencia_id
 * @property integer $tipo_id
 * @property integer $estado_id
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 * @property integer $tiempo_realizacion
 *
 * The followings are the available model relations:
 * @property Incidencia $incidencia
 */
class Tarea extends CActiveRecord
{
    
        const TIPO_ARREGLO=0;
        const TIPO_MEJORA=1;
        
        const ESTADO_SIN_EMPEZAR=0;
        const ESTADO_EMPEZADA=1;
        const ESTADO_FINALIZADA=2;
        

    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tarea the static model class
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
		return 'tbl_tarea';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('incidencia_id, tipo_id, estado_id, create_user_id, update_user_id, tiempo_realizacion', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			array('descripcion, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, incidencia_id, tipo_id, estado_id, propietario_id, responsable_id, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'incidencia' => array(self::BELONGS_TO, 'Incidencia', 'incidencia_id'),
		);
	}

	/**
	 * @return array customized attribut'estado_id',
                'prioridad_id',e labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'incidencia_id' => 'Incidencia',
			'tipo_id' => 'Tipo',
			'estado_id' => 'Estado',
			'create_time' => 'Creada',
			'create_user_id' => 'Usuario que la creó',
			'update_time' => 'Actualización',
			'update_user_id' => 'Usuario que la actualizó',
                        'tiempo_realizacion' => 'Tiempo de realización (en minutos)',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('incidencia_id',$this->incidencia_id);
		$criteria->compare('tipo_id',$this->tipo_id);
		$criteria->compare('estado_id',$this->estado_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);
                $criteria->compare('tiempo_realizacion',$this->tiempo_realizacion);

                $criteria->condition='incidencia_id=:incidenciaID';
                $criteria->params=array(':incidenciaID'=>$this->incidencia_id);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getTipoOptions()
        {
            return array(
                self::TIPO_ARREGLO=>'Arreglo',
                self::TIPO_MEJORA=>'Mejora',
            );
        }
        
        public function getEstadoOptions()
        {
            return array(
                self::ESTADO_SIN_EMPEZAR=>'Sin empezar',
                self::ESTADO_EMPEZADA=>'Empezada',
                self::ESTADO_FINALIZADA=>'Finalizada',
            );
        }

    public function getEstadoText()
    {
        $estadoOptions=$this->estadoOptions;
        return isset($estadoOptions[$this->estado_id]) ? $estadoOptions[$this->estado_id] : "unknown status ({$this->estado_id})";
    }
    
    public function getTipoText()
    {
        $tipoOptions=$this->tipoOptions;
        return isset($tipoOptions[$this->tipo_id]) ? $tipoOptions[$this->tipo_id] : "unknown status ({$this->tipo_id})";
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
    
    protected function beforeSave()
    {
        if(null !== Yii::app()->user)
            $id=Yii::app()->user->id;
        else
            $id=1;
        if($this->isNewRecord)
            $this->create_user_id=$id;
            $this->update_user_id=$id;
        return parent::beforeSave();
    }
    
    public function getTiempoRealizacionText()
    {
        $minutes = $this->tiempo_realizacion;
    
        $d = floor ($minutes / 1440);
        $h = floor (($minutes - $d * 1440) / 60);
        $m = $minutes - ($d * 1440) - ($h * 60);
        
        $result = "";
        if($h>0) $result .= "{$h} horas y ";
        $result .= "{$m} minutos";
        
        return $result;
    }
}