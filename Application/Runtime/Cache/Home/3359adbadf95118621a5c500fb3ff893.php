<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1 align="center">用户注册</h1>
    <!--注册-->
    <form action="/messageboard/index.php/Home/User/do_register" method="post">
        <table align="center">
            <tr>
                <td><label for="username">用户名</label></td>
                <td><input type="text" name="username" id="username" required></td>
            </tr>
            <tr>
                <td><label for="password">密码</label></td>
                <td><input type="password" name="password" id="password" content="" required></td>
            </tr>
            <tr>
                <td><label for="password">再输入一次密码</label></td>
                <td><input type="password" name="repassword" id="repassword" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit">注册</button>
                    <button type="reset">重置</button>
                </td>
            </tr>
        </table>
    </form>
    <p align="center">
        <a href="/messageboard/index.php/Home/User/login">已有账户？点击登录</a>
    </p>
</body>
</html>