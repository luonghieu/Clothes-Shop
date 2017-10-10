<?php 
namespace App\Controllers;
use App\Core\App;
use App\Core\Pagination;
use App\Core\Session;
use App\Models\Users;

class UsersController
{
	public function index()
	{
		$pagination = $this->pagination();
		$paginghtml = $pagination['paginghtml'];
		$limit = $pagination['config']['limit'];
		$current_page = $pagination['config']['current_page'];
		$users=Users::all($current_page,$limit);	
		return view('admin/users/index',['users'=>$users, 'paginghtml'=>$paginghtml]);
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
	{	$id=$_GET['id'];
		if(Users::delete($id)){
			return redirect('admin/users?msg=Deleted Successfully!');
		}
	}
	public function pagination()
	{
		$count= Users::count();
		$config = array(
		    'current_page'  => isset($_GET['p']) ? $_GET['p'] : 1, // Trang hiện tại
		    'total_record'  => $count[0]->total_record, // Tổng số record
		 	//  'limit'         => 10,// limit
		    'link_full'     => '/admin/users?p={page}',// Link full có dạng như sau: domain/com/page/{page}
		    'link_first'    => '/admin/users?p=1',// Link trang đầu tiên
		    'range'         => 9, // Số button trang bạn muốn hiển thị 
		);
		$paging = new Pagination();
 		$paging->init($config);
 		$paginghtml = $paging->html();
 		return  array('config' => $paging->_config, 'paginghtml' => $paginghtml, );
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