<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1 align="center">用户登录</h1>
    <!--登录表单，包括用户名，密码，注册，登录和重置功能-->
    <form action="/messageboard/index.php/Home/User/do_login" method="post">
        <table align="center">
            <tr>
                <td><label for="username">用户名</label></td>
                <td><input type="text" name="username" id="username" required></td>
            </tr>
            <tr>
                <td><label for="password">密码</label></td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <button type="submit">登录</button>
                    <button type="reset">重置</button>
                </td>
            </tr>
        </table>
    </form>
    <p align="center">
        <a href="/messageboard/index.php/Home/User/register">没有账户？点击注册</a>
    </p>
</body>
</html>