<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	private $_id;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
	//	echo $this->username . "<br>" . $this->password;
		$usuario = Pessoa::model()->findByAttributes(array('cpf'=>$this->username, 'senha'=>$this->password));

		if(!isset($usuario))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else{
			$this->errorCode=self::ERROR_NONE;
			$this->_id = $usuario->id;
		}
		return !$this->errorCode;
	}

	public function getId()	{
    	return $this->_id;
	}

}