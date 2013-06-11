<?php

/**
 * This is the model class for table "tbl_comentario".
 *
 * The followings are the available columns in table 'tbl_comentario':
 * @property integer $id
 * @property string $contenido
 * @property integer $incidencia_id
 * @property string $create_time
 * @property integer $create_user_id
 * @property string $update_time
 * @property integer $update_user_id
 */
class Comentario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Comentario the static model class
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
		return 'tbl_comentario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contenido, incidencia_id', 'required'),
			array('incidencia_id, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, contenido, incidencia_id, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'actualizador' => array(self::BELONGS_TO, 'User', 'update_user_id'),
			'incidencia' => array(self::BELONGS_TO, 'Incidencia', 'incidencia_id'),
			'autor' => array(self::BELONGS_TO, 'User', 'create_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'contenido' => 'Contenido',
			'incidencia_id' => 'Incidencia',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
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

		$criteria->compare('contenido',$this->contenido,true);

		$criteria->compare('incidencia_id',$this->incidencia_id);

		$criteria->compare('create_time',$this->create_time,true);

		$criteria->compare('create_user_id',$this->create_user_id);

		$criteria->compare('update_time',$this->update_time,true);

		$criteria->compare('update_user_id',$this->update_user_id);
                
                $criteria->condition('ORDER BY create_time DESC');

		return new CActiveDataProvider('Comentario', array(
			'criteria'=>$criteria,
		));
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
        
        public function scopes()
        {
            return array(
                'recientes'=>array(
                    'order'=>'create_time DESC',
                    'limit'=>'5',
                ),
            );   
        }
 
}