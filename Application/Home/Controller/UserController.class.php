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
		
		
		if($arr){

				$f=M('Follow');
				$follownum=$f->where("userid={$arr['ID']}")->count();
				$focusnum=$f->where("focusid={$arr['ID']}")->count();
				$_SESSION['username']=$username;	
				$_SESSION['userid']=$arr['ID'];
				$_SESSION['follownum']=$follownum;
				$_SESSION['focusnum']=$focusnum;
				$this->assign('name',$username);
				//$this->display();
				$this->success('登录成功','main');
			}else{
				$this->error('登录失败');
			}
		
	}

	public function main()
	{
		$b=M('Blog');
		$f=M('Follow');
		$arrid=$f->where("userid='{$_SESSION['userid']}'")->field('focusid')->select();
		//dump($arrid);
		$condition['userid']=$_SESSION['userid'];
		$barr=$b->where($condition)->select();
		$c=M('Comment');
		//dump($barr[0]);
		$num=sizeof($barr);
		for($i=0;$i<sizeof($barr);$i++)
		{
			//dump($barr[$i]['ID']);
			$con['blogid']=$barr[$i]['ID'];
			$carr=$c->where($con)->select();
			//dump($carr);
			$barr[$i]['comment']=$carr;
		}
		//dump($barr);
		$this->assign('blog',$barr);
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
					$userid=$user->where("username='{$_POST['username']}'")->field('ID')->find();
					dump($userid);
					$mk=mkdir("./Public/Uploads/{$userid['ID']}",0700);
					//$this->show();
					$this->success('注册成功','index');
				}else{
					$this->error('数据添加失败');
				}
		}
	
	
		
	}

	public function newblog()
	{
		$this->display();
	}

	public function upload()
		{    
	/*	dump($_SESSION['userid']);
			$blogcontent=$_POST['blog'];
		
			$b=M('Blog');
			$b->blog=$blogcontent;
			$b->time= NOW_TIME;
			$b->userid=$_SESSION['userid'];
			$idNum=$b->add();
			
				if( $idNum>0){
					dump($b->ID);
				}
		*/	
				$upload = new \Think\Upload();// 实例化上传类    
				$upload->maxSize   =     3145728 ;// 设置附件上传大小   
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
				$upload->rootPath  =      "./Public/Uploads/{$_SESSION['userid']}/"; // 设置附件上传目录   
				$upload->saveName = array('uniqid','');
				$upload->savePath  =      ''; // 设置附件上传（子）目录
				// 上传文件    
				
				$photo=$_POST['photo'];
				
				$info   =   $upload->upload();   
				
				if(!$info) {
					// 上传错误提示错误信息        
					//$this->error($upload->getError()); 
						$blogcontent=$_POST['blog'];
		
						$b=M('Blog');
						$b->blog=$blogcontent;
						$b->time= date("Y-m-d H:i:s",NOW_TIME); 
						$b->dateinfo= date("Y-m-d",NOW_TIME);
						$b->userid=$_SESSION['userid'];
						$b->img='0';
						$idNum=$b->add();
							if( $idNum>0){
							
							$this->success('发布成功','main');
							}else{
							$this->error('发布失败');
							}
					}
						else{
						//dump($info['photo']['savename']);
							// 上传成功        
							
							$blogcontent=$_POST['blog'];
		
							$b=M('Blog');
							$b->blog=$blogcontent;
							$b->time= date("Y-m-d H:i:s",NOW_TIME); 
							$b->dateinfo= date("Y-m-d",NOW_TIME);
							$b->userid=$_SESSION['userid'];
							$b->img=$info['photo']['savename'];
							$idNum=$b->add();
							if( $idNum>0){
							
							$this->success('发布成功','main');
							}else{
							$this->error('发布失败');
							}
						}
	
			
	}
	
	public function addcomment()
	{
		$c=M('Comment');
		$c->comment=$_POST['comment'];
		$c->blogid=$_POST['blogid'];
		//echo $_POST['blogid'];
		$c->username=$_SESSION['username'];
		$num=$c->add();
		if($num>0)
		{
			$this->success('评论成功','main');
		}else{
			$this->show();
		}	
	
	
	}
	
	public function searchuser()
	{
	
		
		$u=M('User');
		$condition['username']=array('like',"%{$_POST['searchname']}%");
		$arr=$u->where($condition)->select();
		
		if(sizeof($arr)>0)
		{
			$this->assign('userlist',$arr);
			$this->display();
		}
		else{
			$this->error('未查到相关用户');
		}
	}


	public function focus()
	{
		$u=M('Follow');
		//$condition['ID']=$_SESSION['userid'];
		//$str=$u->where($condition)->file('followlist')->find();
		$u->userid=$_SESSION['userid'];
		$u->focusid=$_GET['id'];
		$num=$u->add();
		if($num>0)
		{
			$this->success('关注成功');
		}
		else{
			$this->error('关注失败');
		}
		
	}

	public function cancelfocus()
	{
		$f=M('Follow');
		$condition['userid']=$_SESSION['userid'];
		$condition['focusid']=$_GET['id'];
		$num=$f->where($condition)->delete();
		if($num>0)
		{
			$this->success('取消关注成功');
		}
		else
		{
			$this->error('取消关注失败');
		}
	}

	public function showfollow()
	{
		$f=M('Follow');
		$u=M('User');
		$fid->$f->where("userid='{$_SESSION['userid']}'")->field('focusid')->select();
	
		
	}

	public function showfocus()
	{
		$f=M('Follow');
		$u=M('User');
		$fid->$f->where("userid='{$_SESSION['focusid']}'")->field('userid')->select();
	
		
	}



}