# dynamic-database-manager

#### 介绍
基于webman框架的动态数据库管理插件

#### 软件架构
软件架构说明


#### 安装教程

1.  composer require yesgooo/dynamic-database-manager
2.  打开配置config/plugin/yesgooo/dynamic-database-manager/conf.php，并配置数据库接信息
例如：
return [
    'flag' => 'companyId', //切换标识
    'method' => 'header', //标识传送方法 支持header,get,post
    'conn_prefix' => 'conn_', //数据库连接前缀
    'database_prefix' => 'serp_', //数据库名前缀
    'default_database' => 'dev_serp',//默认数据库
    'host'        => envs('DB_HOST','127.0.0.1'),
    'port'        => envs('DB_PORT',3306),
    'database'    => envs('DB_DATABASE', 'dev_serp'),
    'username'    => envs('DB_USERNAME','root'),
    'password'    => envs('DB_PASSWORD','root'),

];

3.  根据切换标识，发起请求，查看数据查询是否走到对应的数据库链接

#### 使用说明

1.  xxxx
2.  xxxx
3.  xxxx

#### 参与贡献

1.  Fork 本仓库
2.  新建 Feat_xxx 分支
3.  提交代码
4.  新建 Pull Request


#### 特技

1.  使用 Readme\_XXX.md 来支持不同的语言，例如 Readme\_en.md, Readme\_zh.md
2.  Gitee 官方博客 [blog.gitee.com](https://blog.gitee.com)
3.  你可以 [https://gitee.com/explore](https://gitee.com/explore) 这个地址来了解 Gitee 上的优秀开源项目
4.  [GVP](https://gitee.com/gvp) 全称是 Gitee 最有价值开源项目，是综合评定出的优秀开源项目
5.  Gitee 官方提供的使用手册 [https://gitee.com/help](https://gitee.com/help)
6.  Gitee 封面人物是一档用来展示 Gitee 会员风采的栏目 [https://gitee.com/gitee-stars/](https://gitee.com/gitee-stars/)
