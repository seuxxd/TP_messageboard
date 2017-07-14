<?php

/**
 * Created by PhpStorm.
 * User: SEUXXD
 * Date: 2017-07-14
 * Time: 10:07
 */
namespace Home\Model;


use Think\Model\ViewModel;


class MessageViewModel extends ViewModel {
    public $viewFields = array(
        //Message数据表取出的字段
        'Message' => array('messageId','content','createAt'),
        //User数据表取出的字段和关联字段
        'User'    => array('userId','username','_on'=>'User.userId = Message.userId')
    );
}