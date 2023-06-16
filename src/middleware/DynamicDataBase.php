<?php
namespace Yesgooo\DynamicDatabaseManager\middleware;

use Yesgooo\DynamicDatabaseManager\DataBaseManager\DynamicDataBaseManager;
use Webman\MiddlewareInterface;
use Webman\Http\Response;
use Webman\Http\Request;

class DynamicDataBase implements MiddlewareInterface
{
    public function process(Request $request, callable $handler) : Response
    {
        //执行动态数据库管理
        new DynamicDataBaseManager();
        return $handler($request);
    }
    
}
