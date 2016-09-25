<?php
return array(
	//'配置项'=>'配置值'
        'DB_TYPE'               =>  'mysql',     // 数据库类型
        'DB_HOST'               =>  'localhost', // 服务器地址
        'DB_NAME'               =>  'cps',          // 数据库名
        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  'root',          // 密码
        'DB_PORT'               =>  '',        // 端口
        'DB_PREFIX'             =>  '',    // 数据库表前缀
        'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查
        'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
        'URL_HTML_SUFFIX' => '',
        // URL禁止访问的后缀设置(优先级更高)
        'URL_DENY_SUFFIX' => 'ini|conf',
        // 忽略URL大小写
        'URL_CASE_INSENSITIVE' => false,
        // 显示页面追踪调试窗体
        'SHOW_PAGE_TRACE' => false,
        // 开启模板渲染
        'LAYOUT_ON' => false,
        // 修改布局模板位置
        'LAYOUT_NAME' => 'Layout/layout',
        // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
        // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE 模式); 3 (兼容模式) 默认为PATHINFO 模式
        // 'URL_MODEL' => 2,

);