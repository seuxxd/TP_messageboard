<?php
/**
 * Created by PhpStorm.
 * User: SEUXXD
 * Date: 2017-07-14
 * Time: 10:22
 */

namespace Home\Controller;

use Think\Controller;

//用户控制器
class UserController extends Controller {
//    登录界面
    public function login(){
        $this->display();
    }
//    处理登录
    public function do_login(){
        $username = I('username');
        $password = I('password');
        $model = M('User');
        $user = $model->where(array('username' => $username))->find();
        if (empty($user) || md5($password) != $user['password'])
            $this->error('账户或密码错误');

        /*print_r($user);
        echo "<br>";
        echo 'userId:   '.$user['userid']."<br>";
        echo 'username: '.$user['username']."<br>";
        echo 'password: '.$user['password']."<br>";
        echo 'createAt: '.$user['createat']."<br>";*/
        session('user.userId',$user['userid']);
        session('user.username',$user['username']);

        $this->redirect('Index/index');
    }
//    处理注册
    public function do_register(){
        $username = I('username');
        $password = I('password');
        $repassword = I('repassword');
        if (empty($username))
            $this->error('用户名不能为空');
        if (empty($password))
            $this->error('密码不能为空');
        if (empty($repassword))
            $this->error('密码不能为空');
        if (strcmp($password,$repassword))
            $this->error('练此密码不一致');//以后这些内容是要放到前端JS中进行处理

//        接下来就是检查数据库对应数据
        $model = M('User');
        $user = $model->where(array('username' => $username))->select();
        if (!empty($user))
            $this->error('用户名已存在');
        $data = array(
            'username' => $username,
            'password' => md5($password),
            'createAt' => time()
        );
        if (!($model->create($data) && $model->add()))
            $this->error('注册失败'.$model->getDbError());
        $this->success('注册成功，请登录',U('login'));
    }
//    注册
    public function register(){
        $this->display();
    }
//    退出登录
    public function logout(){
        if (!session('user.username'))
            $this->error('请登录',U('User/login'));
        session_destroy();
        $this->success('注销成功',U('Index/index'));
    }
}