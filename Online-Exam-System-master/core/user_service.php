<?php
include_once("data/user_data_access.php");
if(isset($_POST['back']))
{
	header("Location:index.php");
}
function addNewResult($name,$mail,$con,$pass,$age,$gender,$mark)
{
	$div = substr($mail,-4);
	$word = explode(" ", $name);
	if($div == ".com")
	{
		if(count($word) >= 2)
		{
			for($i=0;$i<strlen($name);$i++)
			{
				if((ord($name[$i])>=65 && ord($name[$i])<=90) || (ord($name[$i])>=97 && ord($name[$i])<=122) || ord($name[$i])== 32)
				{
					$nm = $name;
				}
				else
				{
					echo "Only letters";
					break;
				}
			}
			if($pass == $con)
			{
				$user=array("name"=>$name,"mark"=>$mark);
				return Result($user);
			}
		}
	}
}
function addNewUser($name,$mail,$con,$pass,$age,$gender)
{
	$div = substr($mail,-4);
	$word = explode(" ", $name);
	if($div == ".com")
	{
		if(count($word) >= 2)
		{
			for($i=0;$i<strlen($name);$i++)
			{
				if((ord($name[$i])>=65 && ord($name[$i])<=90) || (ord($name[$i])>=97 && ord($name[$i])<=122) || ord($name[$i])== 32)
				{
					$nm = $name;
				}
				else
				{
					echo "Only letters";
					break;
				}
			}
			if($pass == $con)
			{
				$user=array("name"=>$name,"mail"=>$mail,"pass"=>$pass,"age"=>$age,"gender"=>$gender);
				return addUser($user);
			}
			else 
				echo "Password Don't match";
		}
		else
			echo "Must be 2 word";
	}
	else
		echo "Invalid mail";

}
?>