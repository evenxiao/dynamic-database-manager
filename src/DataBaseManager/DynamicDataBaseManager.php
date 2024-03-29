<?php

namespace Yesgooo\DynamicDatabaseManager\DataBaseManager;

use Illuminate\Container\Container as IlluminateContainer;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use support\Db;

class DynamicDataBaseManager
{
    protected static $instance;
    protected $capsule;

    public function __construct($config = [], $name = 'serp_1')
    {
        $method = config('plugin.yesgooo.dynamic-database-manager.conf.method') ?? 'header';
        //从请求头部获取当前租户标识，默认0
        $flag = \request()->$method(config('plugin.yesgooo.dynamic-database-manager.conf.flag'), 0);
        echo $flag;
        echo "\n";

        //当前公司数据库名称，如未传公司ID取默认配置数据库名
        //$database = $flag ? 'serp_'.$flag : envs('DB_DATABASE','dev_serp');
        $database = $flag ? config('plugin.yesgooo.dynamic-database-manager.conf.database_prefix').$flag : config('plugin.yesgooo.dynamic-database-manager.conf.default_database');

        //当前的数据库连接名称
        $curConnect = $flag ? config('plugin.yesgooo.dynamic-database-manager.conf.conn_prefix') . $flag : 'default';

        $config = $config ?: [
            'driver' => 'mysql',
            'host'        => config('plugin.yesgooo.dynamic-database-manager.conf.host'),
            'port'        => config('plugin.yesgooo.dynamic-database-manager.conf.port'),
            'database'    => $database,
            'username'    => config('plugin.yesgooo.dynamic-database-manager.conf.username'),
            'password'    => config('plugin.yesgooo.dynamic-database-manager.conf.password'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ];

        $this->capsule = new Capsule(IlluminateContainer::getInstance());

        echo $this->capsule->getDatabaseManager()->getDefaultConnection();
        echo "\n";
        $defaultConnect = $this->capsule->getDatabaseManager()->getDefaultConnection();

        //通过容器获取全部数据库连接
        $allConnect = $this->capsule->getContainer()['config']['database.connections'];

        //如果当前连接还没有，则新增连接
        if(!in_array($curConnect, array_keys($allConnect))){
            $this->capsule->addConnection($config, $curConnect); // TODO: Change the autogenerated stub
        }

        print_r($this->capsule->getContainer()['config']['database.connections']);

        //如果默认连接不是当前连接，则设置成默认连接
        if($defaultConnect != $curConnect){
            //设置默认连接
            $this->capsule->getDatabaseManager()->setDefaultConnection($curConnect);
        }

        echo "new connect " . $this->capsule->getDatabaseManager()->getDefaultConnection();
        echo "\n";

        if (class_exists(Dispatcher::class) && !$this->capsule->getEventDispatcher()) {
            $this->capsule->setEventDispatcher(\support\Container::make(Dispatcher::class, [IlluminateContainer::getInstance()]));
        }

        $this->capsule->setAsGlobal();

        $this->capsule->bootEloquent();

    }

    /***
     * @return static
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

}