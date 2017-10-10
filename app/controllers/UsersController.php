<?php 
namespace app\controllers;
use core\App;
use core\Session;
use app\models\Users;

class UsersController
{
	public function index()
	{
		$users=Users::all();
		return view('admin/users/index',['users'=>$users]);
	}
	public function add()
	{
		return view('admin/users/add');
	}

	public function store()
	{
		if(isset($_POST['submit'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$fullname=$_POST['fullname'];
			$email=$_POST['email'];
			$phone=$_POST['phone'];
			$address=$_POST['address'];
			$level=$_POST['level'];
			$avatar=$_FILES['avatar']['name'];
			$new_User = array(
				'username' =>$username, 
				'password' =>$password, 
				'fullname' =>$fullname, 
				'email' =>$email, 
				'phone' =>$phone, 
				'address' =>$address, 
				'level' =>$level
				);
			if($avatar==''){
				$new_User['avatar']='';
				if(Users::insert($new_User)){
					return redirect('admin/users?msg=Added Successfully!');
				}
			}else{
				$tmp_name=$_FILES['avatar']['tmp_name'];
				$tmp=explode('.',$avatar);
				$file_end=end($tmp);
				$new_file_name='avatar-'.$username.'-'.time().'.'.$file_end;
				$pathUpload=$_SERVER['DOCUMENT_ROOT'].'/public/admin/upload/avatar/'.$new_file_name;
				$uploadAction=move_uploaded_file($tmp_name, $pathUpload);
				if($uploadAction){
					$new_User['avatar']=$new_file_name;
					if(Users::insert($new_User)){
						return redirect('admin/users?msg=Added Successfully!');
					}
				}
			}
		}
	}

	public function edit()
	{	
		$id=$_GET['id'];
		$user=Users::find($id);
		return view('admin/users/edit',['user'=>$user]);
	}

	public function destroy()
	{
		$id=$_GET['id'];
		if(Users::delete($id)){
			return redirect('admin/users?msg=Deleted Successfully!');
		}
	}

	public function search()
	{
		if(isset($_POST['search']))
		{
			$username=$_POST['username'];
			$fullname=$_POST['fullname'];
			$active=$_POST['active'];
			$level=$_POST['level'];
			$search_User = array(
				'username' =>$username, 
				'fullname' =>$fullname, 
				'active' =>$active, 
				'level' =>$level
				);

			$users=Users::search($search_User);
			return view('admin/users/index',['users'=>$users,'search_User'=>$search_User]);
		}
		

		// if(Users::delete($id)){
		// 	return redirect('admin/users?msg=Deleted Successfully!');
		// }
	}
	// public function index()
	// {
	// 	$users=Users::all();
	// 	return view('users',['users'=>$users]);
	// }
	// public function add()
	// {
	// 	return view('users-add');
	// }
	// public function store()
	// {
	// 	$new_User=[
	// 		'name' =>$_POST['name'],
	// 		'phone' =>$_POST['phone'],
	// 		'address' =>$_POST['address']
	// 	];
	// 	if(Users::insert($new_User)==true){
	// 		return redirect('users');
	// 	}
	// }
	// public function destroy()
	// {
	// 	$id=$_GET['id'];
	// 	if(Users::deleteById($id)==true){
	// 		return redirect('users');
	// 	}
	// }

	// public function edit()
	// {
	// 	$id=$_GET['id'];
	// 	$user=Users::find($id);
	// 	return view('user-edit',['user'=>$user]);
	// }

	// public function update()
	// {
	// 	$id=$_POST['id'];
	// 	$edit_User=[
	// 		'name' =>$_POST['name'],
	// 		'phone' =>$_POST['phone'],
	// 		'address' =>$_POST['address']
	// 	];
	// 	if(Users::update($edit_User,$id)){
	// 		return redirect('users');
	// 	}
	// }
}

?>