
<?php 


$passwordku = "12345678";
$password_hash = password_hash($passwordku,PASSWORD_DEFAULT);
echo $password_hash;

    
$password = "12345678";
if(password_verify($password,$password_hash))
{
	echo "Password Valid";
}
else
{
	echo "Password Tidak Valid";
}
?>