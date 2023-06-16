<?php
/**
 * 数据库连接配置文件
 */
return [

    'flag' => 'companyId', //切换标识
    'method' => 'header', //标识传送方法 支持header,get,post
    'conn_prefix' => 'conn_', //数据库连接前缀
    'database_prefix' => 'db_', //数据库名前缀
    'default_database' => 'dev_serp',//默认数据库
    'host'        => '127.0.0.1',
    'port'        => 3306,
    'database'    =>'DB_DATABASE',
    'username'    => 'DB_USERNAME',
    'password'    => 'DB_PASSWORD'

];