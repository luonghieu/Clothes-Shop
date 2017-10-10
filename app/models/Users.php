<?php 
namespace App\Models;
use App\Core\App;
use App\Core\Pagination;
class Users
{

	public static function all($current_page, $limit)
	{
		$start = ($current_page - 1) * $limit;
		$query='select * from users limit '.$start.', '.$limit;
		return App::get('database')->query_fetch($query);
	}

	public static function find($id)
	{
		$query='select * from users where id='.$id;
		return App::get('database')->query_fetch($query);
	}
	public static function count()
	{
		$query='select count(*) as total_record from users';
		return App::get('database')->query_fetch($query);
	}
	public static function insert($new_User){
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

	public static function delete($id)
	{
		$query="DELETE FROM users WHERE id={$id}";
		return App::get('database')->query_excute($query);
	}

	public function deleteById($id)
	{
		$query='delete from users where id='.$id;
		return App::get('database')->query_excute($query);
	}

	public function update($edit_User,$id)
	{
		$name=$edit_User['name'];
		$phone=$edit_User['phone'];
		$address=$edit_User['address'];
		$query='update users set name="'.$name.'",phone="'.$phone.'",address="'.$address.'" where id='.$id; 
		return App::get('database')->query_excute($query);
	}

}
?>