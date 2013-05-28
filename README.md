yiframework
===========

yet another php framework.

yiframework是一个轻量级的php框架，基于Mvc设计模式，本着业务逻辑抽象层独立于模版渲染层的严格分离，所以框架本身不涉及对html的处理，
框架没有对前端展示做任何辅助函数，得益于php本身语言的优势，所以模版的渲染没有特意象ci和zend framework定制类似于smarty的模版引擎，个人认为
前端页面的数据处理讲究适当的混编格式，可以使得web后端开发人员更好的渲染模版,讲究php独有的短标签格式照样可以实现清晰可见的页面展示和数据渲染

由于框架本身对M层的分离，所以可以将数据库处理层具体应用于M层的实现，core层只负责单例的实现，借助于PDO方式，即使得sql拼装简介高效，也使得数据库
操作层的高复用，所以这个框架必须开启pdo

yiframework不追求完美的oop,只讲究业务逻辑的高复用和清晰性，适当尝试接口方式实现业务逻辑的下层实现，但不拘泥于严格的约定方式，目的
在于尽量在开发中灵活多变而不追究形式的约定

yiframework不附带工具函数和类，一切都需要在项目中针对不同的业务自己定制，这也是yiframework目前为止做的不足的地方，后续主要的功夫希望花在
这块，其实实现mvc不难，难得是方便和高效性上面做好平衡点，后续逐步加入，但是会对工具类和函数做最高效的扩展性

目前做的不够好的地方还有autoload加载机制的优化不够，业务逻辑复杂之后可能性能会有损失，这也是下一步要花大力气优化的地方

总之，这个框架还有很多不足的地方，好多地方还不具有项目适用性，后续我会继续吸收别的框架的优秀之处来完善，也会利用项目中的经验继续

yiframework遵循[MIT](http://ocw.mit.edu/index.htm)协议

yiframework简短教程
===========

1.框架已经定义了一个Public目录，在线上的产品希望将此目录设置为web root，但是就像简介说的不拘泥于此，完全可以把框架包含在里面，因为在前端
控制器中定义了:

    //前端总控制器中检测是否非法入口
    defined('APP_PATH') || exit('Access Denied');

2.yiframework只是一个注重结构的框架，所以教程也就不是一个全的lib库，不是zf，没有类结构文档，也不是你读文档而不读框代码，所以设计之初，都是希望在
自己的开发环境中能够适应阅读源码去写代码的原则，相信一个试图达到合格的phper也在这样努力o(∩_∩)o

3.yiframework遵循mvc，所以但入口首当其说，在这个框架中已经定义了这样一个入口文件

    <?php

    //定义项目根目录
    defined("APP_PATH") || define('APP_PATH',dirname(__FILE__).'/../');
    //定义框架所在目录
    defined("FRAMEWORK_PATH") || define('FRAMEWORK_PATH',APP_PATH.'Library/yiframework/');
    //引入前段控制器
    include_once FRAMEWORK_PATH.'FrontController.php';
    //实例化类并调用run静态方法
    $frontController = FrontController::getInstance();
    $frontController->run();

4.yiframework在mvc上没有出彩的地方，一切都和你使用别的框架一样，由controller和action还有其他的参数来请求资源，例如下面的例子：

    ~/webroot/index.php?a=index&c=read&page=12

5.数据库操作

    interface IDbDriver{
             function prepare($sql);
             function execute($sql);
             function connect();
             function close();
             function getAllByAssocArray();
             function beginTrans();
             function commit();
             function rollback();
         }

具体的db uml如下:

![db uml](/assets/db_uml.png)

定义接口的目的在于我们在实现接口的时候可以使用mysqli和pdo两种方式中的任意一种去实现这个接口，而不需要下层去处理不同php扩展而造成的分支处理

