<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
	
		$this->display();
	}
	
	
	public function login(){
		$user=M('User');
		$where['username']=$_POST['username'];
		$where['password']=$_POST['password'];
		$arr=$user->field('ID')->where($where)->find();
		$username=$_POST['username'];
	
		dump($username);
		if($arr){
				$_SESSION['username']=$username;
				$_SESSION['id']=$arr['id'];
				$this->assign('name',$username);
				//$this->display();
				$this->success('登录成功','main');
			}else{
				$this->error('登录失败');
			}
		
	}

	public function main()
	{
		$this->display();
	}

	public function regist()
	{
		$this->display();
	}

	public function adduser()
	{
		$user=M('User');
		
		$count=$user->where("username='{$_POST['username']}'")->count(); 
		
		if($count>0)
		{
			$this->error('用户名已存在');
		}
		else{
			
			$user->username=$_POST['username'];
			$user->password=$_POST['password'];
			$user->email=$_POST['email'];
			$idNum=$user->add();
			
				if( $idNum>0){
					$mk=mkdir("./Public/Uploads/{$_POST['username']}",0700);
					$this->success('注册成功','index');
				}else{
					$this->show('数据添加失败');
				}
		}
	
	
		
	}

	public function newblog()
	{
		$this->display();
	}

	public function upload()
		{    

			dump($_POST['blog']);

			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小   
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
			$upload->rootPath  =      "./Public/Uploads/{$_SESSION['username']}/"; // 设置附件上传目录   
			$upload->saveName = $_SESSION['id'];
			// 上传文件     
			$info   =   $upload->upload();   
				if(!$info) {
					// 上传错误提示错误信息        
					$this->error($upload->getError());    
					}
						else{
							// 上传成功        
							$this->success('上传成功！');    
							}
		}


}