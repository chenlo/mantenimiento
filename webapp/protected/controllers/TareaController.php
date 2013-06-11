<?php

class TareaController extends Controller
{
    
    ///Incidencia asociada a la tarea    
    private $_incidencia = null;

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
                        'incidenciaSeleccionada + create index admin',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tarea;
                $model->incidencia_id = $this->_incidencia->id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tarea']))
		{
			$model->attributes=$_POST['Tarea'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser wil<?php echo $form->dropDownList($model,'owner_id', $model->project-
>getUserOptions()); ?>
l be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tarea']))
		{
			$model->attributes=$_POST['Tarea'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            ///$dataProvider=new CActiveDataProvider('Tarea');
            $dataProvider=new CActiveDataProvider('Tarea', array(
                'criteria'=>array(
                    'condition'=>'incidencia_id=:incidenciaId',
                    'params'=>array(':incidenciaId'=>$this->_incidencia->id),
                ),
            ));

            $this->render('index',array(
                    'dataProvider'=>$dataProvider,
            ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tarea('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tarea']))
			$model->attributes=$_GET['Tarea'];
                
                $model->incidencia_id = $this->_incidencia->id;

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tarea the loaded model<?php echo $form->dropDownList($model,'owner_id', $model->project-
>getUserOptions()); ?>

	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tarea::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tarea $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tarea-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        protected function cargarIncidencia($incidenciaId)	 
        {
		if($this->_incidencia===null)
		{
			$this->_incidencia=Incidencia::model()->findbyPk($incidenciaId);
			if($this->_incidencia===null)
	        {
				throw new CHttpException(404,'La incidencia seleccionada no existe.'); 
			}
		}

		return $this->_incidencia; 
	} 
	
	public function filterIncidenciaSeleccionada($filterChain)
	{   
		if(isset($_GET['iid']))
			$this->cargarIncidencia($_GET['iid']);   
		else
			throw new CHttpException(403,'Debe seleccionar una incidencia antes.');
			
		//complete the running of other filters and execute the requested action
		$filterChain->run(); 
	} 	
        
        
        
}
