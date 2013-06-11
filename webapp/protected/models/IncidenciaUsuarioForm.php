<?php
/**
 * ProjectUserForm class.
 * ProjectUserForm is the data structure for keeping
 * the form data related to adding an existing user to a project. It is used by the 'Ad-duser' action of 'ProjectController'.
 */
class IncidenciaUsuarioForm extends CFormModel
{
	/**
	 * @var string username of the user being added to the project
	 */
	public $username;
	
	public $incidencia;
	
	private $_user;
	
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated using the verify() method
	 */
	public function rules()
	{
		return array(
			// username and role are required
			array('username', 'required'),
			//username needs to be checked for existence 
			array('username', 'exist', 'className'=>'User'),
			array('username', 'verify'),
		);
	}

	
	/**
	 * Authenticates the existence of the user in the system.
	 * If valid, it will also make the association between the user, role and project
	 * This is the 'verify' validator as declared in rules().
	 */
	public function verify($attribute,$params)
	{
		if(!$this->hasErrors())  // we only want to authenticate when no other input errors are present
		{
			$user = User::model()->findByAttributes(array('username'=>$this->username));
	        if($this->incidencia->isUsuarioAsignado($user))
	        {
				$this->addError('username','Este usuario ya está asignado al proyecto'); 
			}
			else
			{
				$this->_user = $user;
			}
		}
	}
	
	public function assign()
	{
		if($this->_user instanceof User)
		{
			
			$this->incidencia->asignarUsuario($this->_user->id);  
			return true;
		}
		else
		{
			$this->addError('username','Error al asignar el usuario a la incidencia.'); 
			return false;
		}
		
	}
	
	/**
	 * Generates an array of usernames to use for the autocomplete
	 */
	public function createUsernameList()
	{
		$sql = "SELECT username FROM users";
		$command = Yii::app()->db->createCommand($sql);
		$rows = $command->queryAll();
		//format it for use with auto complete widget
		$usernames = array();
		foreach($rows as $row)
		{
			$usernames[]=$row['username'];
		}
		return $usernames;
		
	}
        
}
