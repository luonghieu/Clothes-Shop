<?php 
namespace app\models;
use core\App;

class Users
{

	public static function all()
	{
		$query='select * from users';
		return App::get('database')->query_fetch($query);
	}

	public static function find($id)
	{
		$query='select * from users where id='.$id;
		return App::get('database')->query_fetch($query);
	}

	public static function insert($new_User)
	{
		$username=$new_User['username'];
		$password=$new_User['password'];
		$fullname=$new_User['fullname'];
		$email=$new_User['email'];
		$phone=$new_User['phone'];
		$address=$new_User['address'];
		$level=$new_User['level'];
		$avatar=$new_User['avatar'];
		$query="INSERT INTO users(username,password,fullname,email,phone,address,active,level,avatar)
		VALUES('{$username}','{$password}','{$fullname}','{$email}','{$phone}','{$address}',1,{$level},'{$avatar}')";
		return App::get('database')->query_excute($query);

	}

	public static function deleteById($id)
	{
		$query="DELETE FROM users WHERE id={$id}";
		return App::get('database')->query_excute($query);
	}

	public static function update($edit_User,$id)
	{
		$name=$edit_User['name'];
		$phone=$edit_User['phone'];
		$address=$edit_User['address'];
		$query='update users set name="'.$name.'",phone="'.$phone.'",address="'.$address.'" where id='.$id; 
		return App::get('database')->query_excute($query);
	}

	public static function search($search_User)
	{
		$username=$search_User['username'];
		$fullname=$search_User['fullname'];
		$active=$search_User['active'];
		$level=$search_User['level'];
		$query='select * from users where 1'; 
		if($username!='')
		{
			$query.=' and username like "%'.$username.'%"';
		}
		if($fullname!='')
		{
			$query.=' and fullname like "%'.$fullname.'%"';
		}
		if($active!=-1)
		{
			$query.=' and active ='.$active;
		}
		if($level!=0)
		{
			$query.=' and level ='.$level;
		}
		return App::get('database')->query_fetch($query);
	}

// $stmt = $conn->prepare('INSERT INTO users (name, email, age) values (:name, :mail, :age)');

// //Gán các biến (lúc này chưa mang giá trị) vào các placeholder theo tên của chúng
// $stmt->bindParam(':name', $name);
	// $stmt->execute();
}
?>