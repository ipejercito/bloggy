<?php

include_once("connection.php");
Class Users extends Database{

	protected $formatted_post_data;

	public function __construct()
	{
		parent::__construct();
		$json_post = file_get_contents('php://input');

		$this->formatted_post_data = $post_data = json_decode($json_post,true);
		if(isset($post_data["ang_reg_form"]) && $post_data["ang_reg_form"] == "registration")
			$this->registration();
		if(isset($post_data["ang_login_form"]) && $post_data["ang_login_form"]  == "login")
			$this->login(); 

	}

	public function registration()
	{
		$post_select_array = array(1 => $this->formatted_post_data["ang_first_name"],$this->formatted_post_data["ang_last_name"],$this->formatted_post_data["ang_email"]);
		$query_user = "SELECT users.first_name, users.last_name, users.email from users
						WHERE users.first_name = ? AND users.last_name = ?
						AND users.email = ?";
		$rows = $this->fetch_record($query_user, $post_select_array);
		if(!is_bool($rows) && count($rows) > 0)
		{
			$data["status"] = FALSE;
			$data["message"] = "User already taken";
		}
		else
		{
			//var_dump($this->formatted_post_data); die();
			$hash_password = password_hash($this->formatted_post_data["ang_password"], PASSWORD_DEFAULT);
			$post_insert_array = array(1=> $this->formatted_post_data["ang_first_name"],
											$this->formatted_post_data["ang_last_name"], 
											$this->formatted_post_data["ang_email"], 
											$hash_password, 
											$this->formatted_post_data["ang_photo"] = NULL);
			$query_insert = "INSERT INTO users 
							(first_name, last_name, email, password, photo, created_at)
							VALUES (?, ?, ?, ?, ?, NOW())";
			$insert_result = $this->insert($query_insert, $post_insert_array);
			if($insert_result)
			{
				$data["status"] = TRUE;
				$data["message"] = "You are now a user in db";
			}
			else
			{
				$data["status"] = FALSE;
				$data["message"] = "Incorrect Query";
			}
		}
		echo json_encode($data);
	}

	public function login()
	{
		$post_select_array = array(1 => $this->formatted_post_data["ang_email"]
										);
		$query_user = "SELECT users.email, users.password FROM users
					   WHERE users.email = ?";
		$rows = $this->fetch_record($query_user, $post_select_array);
		
		if(!is_bool($rows) && count($rows) > 0)
		{
			$result = $this->password_validator->isValid(
					  $this->formatted_post_data["ang_password"],$rows["password"]);
			if ($result->isValid()) 
			{
	    		$data["status"] = TRUE;
				$data["message"] = "You have sucessfully logged in";
			}
			else
			{
				$data["status"] = FALSE;
				$data["message"] = "Incorrect password";
			}
		}
		else
		{
			$data["status"] = FALSE;
			$data["message"] = "Email Address not found";
		}
		echo json_encode($data);
	}
}

$users = New Users();
?>