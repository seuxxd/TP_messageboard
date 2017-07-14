<?php
namespace Home\Controller;
use Home\Model\MessageViewModel;
use Think\Controller;
use Think\Page;

class IndexController extends Controller {
    public function index(){
        $model = new MessageViewModel();
        $count = $model -> count();

        $page = new Page($count , 4);
        $show = $page -> show();
        $list = $model -> order('messageid desc')->limit($page->firstRow.','.$page->listRows)->select();

        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display();
    }
//    登录检测函数
    public function loginCheck(){
        if (!session('user.username')){
            $this->error('请登录',U('User/login'));
        }
    }
//    留言处理
    public function do_post(){
        $this->loginCheck();
        $content = I('content');
        if (empty($content))
            $this->error('输入内容不能为空');
        if (mb_strlen($content,'utf-8') > 100)
            $this->error('最多输入100字');


        $model = M('Message');
        $userId = session('user.userId');
        $data = array(
            'content' => $content,
            'createAt' => time(),
            'userId' => $userId
        );
        if (!($model->create($data) && $model->add())){
            $this->error('留言失败');
        }
        $this->success('留言成功',U('Index/index'));
    }
//    发表留言
    public function post(){
        $this->loginCheck();
        $this->display();
    }
//    删除留言
    public function delete(){
        $id = I('id');
        if (empty($id))
            $this->error('缺少参数');
        $this->loginCheck();
        $model = M('Message');
        if (!($model->where(array('messageId' => $id, 'userid' => session('user.userId')))->delete())){
//            $model->getDbError();
            $this->error('删除失败');

        }
        $this->success('删除成功');
    }
}