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
		$arr=$user->where($where)->find();
		
		$username=$_POST['username'];
		
		
		if($arr){
				
				$_SESSION['username']=$username;	
				$_SESSION['userid']=$arr['ID'];
				$_SESSION['logintime']=date("Y-m-d H:i:s",NOW_TIME);
				$_SESSION['sex']=$arr['sex'];
			/*	$f=M('Follow');
				$focusnum=$f->where("userid={$arr['ID']}")->count();
				$follownum=$f->where("focusid={$arr['ID']}")->count();
						
				$b=M('Blog');
				$blognum=$b->where("userid={$arr['ID']}")->count();
				
				$_SESSION['blognum']=$blognum;
				$_SESSION['focusnum']=$focusnum;
				$_SESSION['follownum']=$follownum;
			*/
				$this->assign('name',$username);
				//$this->display();
				$this->success('登录成功','main');
			}else{
				$this->error('登录失败');
			}
		
	}
	
	public function logout()
	{
		session(null);
		$this->display('index');
	}

	public function main()
	{
		$f=M('Follow');
		$focusnum=$f->where("userid={$_SESSION['userid']}")->count();
		$follownum=$f->where("focusid={$_SESSION['userid']}")->count();
						
		$b=M('Blog');
		$blognum=$b->where("userid={$_SESSION['userid']}")->count();
				
		$_SESSION['blognum']=$blognum;
		$_SESSION['focusnum']=$focusnum;
		$_SESSION['follownum']=$follownum;
			
	
	
		$b=M('Blog');
		$f=M('Follow');
		$arrid=$f->where("userid='{$_SESSION['userid']}'")->getField('focusid',true);
		if($arrid==null)
		{
			$mod="userid='{$_SESSION['userid']}'";
			//dump($arrid);
		}
		else{
		
			$mod="userid in (" . implode(',', $arrid) . ")"." or userid="."'{$_SESSION['userid']}'";
			}
		//dump($mod);
		$testarr=$b->where($mod)->select();
		//dump($testarr);
		$condition['userid']=$_SESSION['userid'];
		$barr=$b->where($mod)->order('time asc')->select();
		$c=M('Comment');
		//dump($barr[0]);
		$num=sizeof($barr);
		for($i=0;$i<sizeof($barr);$i++)
		{
			//dump($barr[$i]['ID']);
			$con['blogid']=$barr[$i]['ID'];
			$carr=$c->where($con)->select();
			$comnum=$c->where($con)->count();
			//dump($carr);
			$barr[$i]['comment']=$carr;
			$barr[$i]['comnum']=$comnum;
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
			$user->sex=$_POST['sex'];
			$idNum=$user->add();
			
				if( $idNum>0){
					$userid=$user->where("username='{$_POST['username']}'")->field('ID')->find();
					//dump($userid);
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
						$b->username=$_SESSION['username'];
						$b->img='0';
						$b->isrepeat='0';
						$b->like=0;
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
							$b->username=$_SESSION['username'];
							$b->img=$info['photo']['savename'];
							$b->isrepeat='0';
							$b->like=0;
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
	
		$f=M('Follow');
		$u=M('User');
		$condition['username']=array('like',"%{$_POST['searchname']}%");
		$condition['ID']=array('neq',"{$_SESSION['userid']}");
		$mod['userid']=$_SESSION['userid'];
		$arr=$u->where($condition)->select();
		$allarrid=$u->where($condition)->getfield('ID',true);
		$focusid=$f->where($mod)->getfield('focusid',true);
		if($focusid==null)
		{
			$unfocusarr=$allarrid;
		}
		else{
			$unfocusarr = array_diff($allarrid,$focusid);
		}
		$focusarr = array_intersect($allarrid,$focusid);
		//dump($focusid);
		//dump($allarrid);
		//dump($unfocusarr);
		//dump($focusarr);
		$focusmod="ID in (" . implode(',', $focusarr) . ")";
		$unfocusmod="ID in (" . implode(',', $unfocusarr) . ")";
		$arr=$u->where($condition)->select();
		$focuslist=$u->where($focusmod)->select();
		$unfocuslist=$u->where($unfocusmod)->select();
		if(sizeof($arr)>0)
		{
			$this->assign('focuslist',$focuslist);
			$this->assign('unfocuslist',$unfocuslist);
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
			$this->success('关注成功','/weibo/index.php/Home/User/main');
		}
		else{
			$this->error('关注失败','/weibo/index.php/Home/User/main');
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
		$fid=$f->where("focusid='{$_SESSION['userid']}'")->getfield('userid',true);
		$mod="ID in (" . implode(',', $fid) . ")";
		$userarr=$u->where($mod)->select();
		$this->assign('userarr',$userarr);
		$this->display();
		
	}

	public function showfocus()
	{
		
		$f=M('Follow');
		$u=M('User');
		//echo($_SESSION['userid']);
		$fid=$f->where("userid='{$_SESSION['userid']}'")->getfield('focusid',true);
		//dump($fid);
		$mod="ID in (" . implode(',', $fid) . ")";
		$userarr=$u->where($mod)->select();
		$this->assign('userarr',$userarr);
		$this->display();
		
	}
	
	public function	transmit()
	{
		$b=M('Blog');
		$b->isrepeat='1';
		$b->originaluser=$_POST['username'];
		//$b->originaluserid=$_POST['userid'];
		$b->blog=$_POST['blog'];
		$b->username=$_SESSION['username'];
		$b->userid=$_SESSION['userid'];
		
		$b->time= date("Y-m-d H:i:s",NOW_TIME); 
		$dateinfo= date("Y-m-d",NOW_TIME);
		$b->dateinfo=$dateinfo;
		if($_POST['imgurl']=='')
		{
			$b->img='0';
		}
		else{
			$dirname="./Public/Uploads/{$_SESSION['userid']}/{$dateinfo}";
			if(!is_dir($dirname)) {
				mkdir($dirname, 0777, true);
				}
			$b->img=$_POST['img'];
			$orurl=$_POST['imgurl'];
			$deurl="./Public/Uploads/{$_SESSION['userid']}/{$dateinfo}/{$_POST['img']}";
			$ok=copy($orurl,$deurl);
		
		}
		$b->like=0;
		$b->ps="转发自【{$_POST['username']}】".$_POST['ps'];
		$num=$b->add();
		if($num>0)
		{
			$this->success('转发成功','/weibo/index.php/Home/User/main');
		}
		else{
			$this->error('转发失败','/weibo/index.php/Home/User/main');
		}
		
	/*	dump($b->img);
		dump($b->originaluser);
		dump($b->blog);
		dump($b->username);
		dump($b->time);
		dump($b->dateinfo);
		dump($dirname);
		dump($orurl);
		dump($deurl);
		dump($b->ps);
	*/
	}

	public function like()
	{
		$b=M('Blog');
		$blogid=$_GET['blogid'];
		$bloglike=$b->where("ID = {$blogid} ")->getfield('like',true);
		//dump((int)$bloglike[0]);
		$like=(int)$bloglike[0]+1;
		//dump($like);
		$data['like']=$like;
		$result=$b->where("ID = {$blogid} ")->save($data);
		//dump($result);
		 if($result>0){
			 //$this->success('评论成功','main');
			   $this->redirect("main");
		 }else{
			echo '数据更新失败！';
		 }
		//dump($like);

	}



}