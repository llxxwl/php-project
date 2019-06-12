<?php
//创建socket
$host = "192.168.0.2";
$port = "12345";
set_time_limit(0);//最好在CLI模式下运行，保证服务不会超时
//创建socket
$socket = socket_create(AF_INET,SOCK_STREAM,0)or die("could not create socket");
//绑定socket到指定地址和端口
$result = socket_bind($socket,$host,$port)or die("could not bind to socket\n");
//开始监听连接
$result = socket_listen($socket,3)or die("could not set up socket listener\n");
//接收连接请求并调用另一个子socket处理客户端——服务期间的信息
$spawn = socket_accept($socket) or die("could not accept incoming oonnect\n");
//读取客户端输入
$input = socket_read($spawn,1024) or die("could not read input\n");
//clean up input string
$input = trim($input);
//反转客户端输入数据，返回客户端
$output = strrev($input)."\n";
socket_write($spawn,$output,strlen($output)) or die("could not write output\n");
//关闭sockets
socket_close($spawn);
socket_close($socket);