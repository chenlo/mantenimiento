<?php

class IncidenciaController extends Controller
{
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','misincidencias','view','asignadas','asignar','historico'),
				'users'=>array('@'),
			),
			array('allow', 
                                'actions'=>array('admin'),
				'users'=>array('maroto','admin'),
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
            $tareaDataProvider=new CActiveDataProvider('Tarea',
            array(
                    'criteria'=>array(
                    'condition'=>'incidencia_id=:incidenciaId',
                    'params'=>array(':incidenciaId'=>$this->loadModel($id)->id),
                ),
                    'pagination'=>array(
                    'pageSize'=>1,
                ),
            ));

            $incidencia = $this->loadModel($id,true);
            $comentario = $this->crearComentario($incidencia);
            
            
            $this->render('view',array(
                    'model'=>$this->loadModel($id),
                    'tareaDataProvider'=>$tareaDataProvider,
                    'comentario'=>$comentario,
            ));
            

	}
        
        protected function crearComentario($incidencia)
        {
            $comentario = new Comentario;
            if(isset($_POST['Comentario']))
            {
                $comentario->attributes=$_POST['Comentario'];
                if($incidencia->annadirComentario($comentario))
                {
                    Yii::app()->user->setFlash('comentarioEnviado',"Se ha añadido su comentario" );
                    $this->refresh();
                }
            }
            return $comentario;
        }


	/**
	 * Creates a new model.http://dx.com/s/android+4.0+media+player.html?category=103&sort=-DateAdded&gclid=CO6E1v6ZurcCFdHMtAodZHgAzg
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Incidencia;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Incidencia']))
		{
			$model->attributes=$_POST['Incidencia'];
                        $model->estado_id=0;
                        $model->prioridad_id=0;
                        //Por defecto asignada al responsable
                        $model->asignado_usuario_id=2;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Incidencia']))
		{
			$model->attributes=$_POST['Incidencia'];
                        $model->update_usuario_id=Yii::app()->user->id;
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
		
                $dataProvider=new CActiveDataProvider('Incidencia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        public function actionAsignadas()
	{
		
                $misIncidenciasDataProvider=new CActiveDataProvider('Incidencia',
                array(
                        'criteria'=>array(
                        'condition'=>'estado_id!=3 AND asignado_usuario_id=:UsuarioId',
                        'params'=>array(':UsuarioId'=>Yii::app()->user->id),
                        'order'=>'prioridad_id DESC',
                    ),
                        'pagination'=>array(
                        'pageSize'=>5,
                    ),
                ));
		$this->render('index',array(
			'dataProvider'=>$misIncidenciasDataProvider,
		));
	}
        
        /**
	 * Lists all models.
	 */
	public function actionMisincidencias()
	{
		
                $misIncidenciasDataProvider=new CActiveDataProvider('Incidencia',
                array(
                        'criteria'=>array(
                        'condition'=>'create_usuario_id=:UsuarioId AND estado_id!=3',
                        'params'=>array(':UsuarioId'=>Yii::app()->user->id),
                    ),
                        'pagination'=>array(
                        'pageSize'=>5,
                    ),
                ));
		$this->render('index',array(
			'dataProvider'=>$misIncidenciasDataProvider,
		)); 
	}

        
         /**
	 * Lists all models.
	 */
	public function actionHistorico()
	{
		
                $historicoDataProvider=new CActiveDataProvider('Incidencia',
                array(
                        'criteria'=>array(
                        'condition'=>'estado_id=3 AND create_usuario_id=:UsuarioId',
                        'params'=>array(':UsuarioId'=>Yii::app()->user->id),
                        'order'=>'create_time DESC',
                    ),
                        'pagination'=>array(
                        'pageSize'=>5,
                    ),
                ));
		$this->render('index',array(
			'dataProvider'=>$historicoDataProvider,
		));
	}
        
        

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Incidencia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Incidencia']))
			$model->attributes=$_GET['Incidencia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionCerradas()
	{
            $dataProvider=new CActiveDataProvider('Incidencia',
            array(
                    'criteria'=>array(
                    'condition'=>'estado_id=3',
                    'order'=>'create_time DESC',
                ),
                    'pagination'=>array(
                    'pageSize'=>10,
                ),
            ));

            $this->render('cerradas',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Incidencia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id, $conComentarios=false)
	{
		if($conComentarios)
                    $model = Incidencia::model()->with(array('comentarios'=>array('with'=>'autor')))->findByPk($id);
                else
                    $model=Incidencia::model()->findByPk($id);
                
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Incidencia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='incidencia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionAsignar($id)
        {
            $incidencia = $this->loadModel($id);
            if(!Yii::app()->user->checkAccess('admin')){
                throw new CHttpException(403,'You are not authorized to perform his action.');
            }
            $form=new IncidenciaUsuarioForm;
            if(isset($_POST['IncidenciaUsuarioForm']))
            {
                $form->attributes=$_POST['IncidenciaUsuarioForm'];
                $form->incidencia = $incidencia;
                if($form->validate())
                {
                    if($form->assign())
                    {
                        Yii::app()->user->setFlash('success',$form->username . "has been added to the project." );
                        $form->unsetAttributes();
                        $form->clearErrors();
                    }
                }
            }
            $form->incidencia = $incidencia;
            $this->render('asignar',array('model'=>$form));
        }
}
