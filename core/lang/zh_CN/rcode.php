<?php
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
！！！！警告！！！！
以下为系统文件，请勿修改
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

//不能非法包含或直接执行
if (!defined('IN_BAIGO')) {
    exit('Access Denied');
}

/*++++++提示信息++++++
x开头为错误
y开头为成功
++++++++++++++++++*/

return array(
    /*@@@@@@ x-1---- 用户 @@@@@@*/

    /*++++++ x-1-1-- 数据 ++++++*/
    'y010101' => '用户注册成功',
    'x010101' => '用户注册失败',
    'y010102' => '用户存在',
    'x010102' => '用户不存在',
    'y010103' => '更新用户成功',
    'x010103' => '没有做任何修改',
    'y010104' => '删除用户成功',
    'x010104' => '未删除任何用户',
    'y010105' => '创建用户表成功',
    'x010105' => '创建用户表失败',
    'y010106' => '更新用户表成功',
    'x010106' => '没有做任何修改',
    'y010107' => '删除用户表成功',
    'x010107' => '未删除任何表',

    'y010108' => '创建用户视图成功',
    'x010108' => '创建用户视图失败',

    'y010111' => '无需更新用户表',

    /*++++++ x-1-2-- 验证 ++++++*/
    'x010201' => '请输入用户名',
    'x010202' => '用户名不能超过 10 中文，30 英文',
    'x010203' => '用户名只能使用中文、英文字母、数字、下划线和连字符',
    'x010204' => '用户名中含有禁止注册的词汇',
    'y010205' => '该用户名可以注册',
    'x010205' => '该用户名已存在',

    'x010206' => '请输入邮箱',
    'x010207' => '邮箱不能超过 300 英文',
    'x010208' => '邮箱格式错误',
    'x010209' => '该邮箱不允许注册',
    'x010210' => '该邮箱禁止注册',
    'y010211' => '该邮箱可以注册',
    'x010211' => '该邮箱已存在',

    'x010212' => '请输入密码',
    'x010213' => '密码错误',

    'x010214' => '昵称不能超过 10 中文，30 英文',
    'x010215' => '备注不能超过 10 中文，30 英文',
    'x010216' => '请选择状态',

    'x010217' => '获取用户 ID 错误',
    'x010218' => '用户 ID 必须为数字',
    'x010219' => '只能上传 CSV 文件',
    'x010220' => '用户名为必须项目', //CSV 导入验证
    'x010221' => '密码为必须项目',
    'x010222' => '请输入新密码',
    'x010223' => '新邮箱与原邮箱一样',
    'x010224' => '请确认密码',
    'x010225' => '两次密码输入不一致',
    'x010226' => '用户已激活',
    'x010227' => '参数错误',
    'x010228' => '获取访问口令错误',
    'x010229' => '访问口令最长 32 位',
    'x010230' => '访问口令错误',
    'x010231' => '访问口令过期',
    'x010232' => '获取刷新口令错误',
    'x010233' => '刷新口令最长 32 位',
    'x010234' => '刷新口令错误',
    'x010235' => '刷新口令过期',

    'x010236' => '密保问题不能超过 100 中文，300 英文',
    'x010237' => '请输入密保答案',
    'x010238' => '请输入密保问题',
    'x010240' => '您没有设置邮箱和密保问题，无法找回密码，请联系系统管理员！',
    'x010241' => '您没有设置邮箱！',
    'x010242' => '您没有设置密保问题！',
    'x010243' => '请输入原密码',
    'x010244' => '原密码错误',
    'x010245' => '密保答案错误',

    /*++++++ x-1-3-- 权限 ++++++*/
    'x010301' => '您没有浏览用户的权限',
    'x010302' => '您没有创建用户的权限',
    'x010303' => '您没有编辑用户的权限',
    'x010304' => '您没有删除用户的权限',
    'x010305' => '您没有批量导入的权限',

    /*++++++ x-1-4-- 状态 ++++++*/
    'y010401' => '用户登录成功',
    'x010401' => '用户被禁用',
    'y010402' => '导入成功',
    'x010402' => '未导入任何数据',
    'y010403' => 'CSV 文件上传成功',
    'x010403' => 'CSV 文件上传失败',
    'y010404' => 'CSV 文件删除成功',
    'x010404' => '未删除任何文件',
    'y010405' => '更换邮箱成功',
    'x010405' => '更换邮箱失败',
    'y010406' => '已将验证邮件发送至新的邮箱，请验证。',
    'x010406' => '更换邮箱失败',
    'y010407' => '修改密码成功',
    'x010407' => '密码未作修改',
    'y010408' => '已将验证邮件发送至您的邮箱，请验证。',
    'x010408' => '找回密码失败',
    'y010409' => '用户激活成功',
    'x010409' => '用户激活失败',
    'y010410' => '已将激活邮件发送至您的邮箱，请验证。',
    'x010410' => '发送激活邮件失败',
    'y010411' => '刷新访问口令成功',
    'x010411' => '刷新访问口令失败',
    'y010412' => '修改密保问题成功',
    'x010412' => '密保问题未作修改',
    'x010413' => '上传校验错误',

    /*@@@@@@ x-2---- 管理员 @@@@@@*/

    /*++++++ x-2-1-- 数据 ++++++*/
    'y020101' => '创建管理员成功',
    'x020101' => '创建管理员失败',
    'y020102' => '管理员存在',
    'x020102' => '管理员未授权',
    'y020103' => '更新管理员成功',
    'x020103' => '没有做任何修改',
    'y020104' => '删除管理员成功',
    'x020104' => '未删除任何管理员',
    'y020105' => '创建管理员表成功',
    'x020105' => '创建管理员表失败',
    'y020106' => '更新管理员表成功',
    'x020106' => '没有做任何修改',
    'y020107' => '删除管理员表成功',
    'x020107' => '未删除任何表',

    'y020108' => '更新个人资料成功',
    'x020108' => '禁止更新个人资料',
    'x020109' => '禁止修改密码',
    'x020110' => '禁止更换邮箱',

    'y020111' => '无需更新管理员表',

    /*++++++ x-2-2-- 验证 ++++++*/
    'x020201' => '请选择类型',
    'x020202' => '请选择状态',
    'x020203' => '备注不能超过 10 中文，30 英文',
    'x020204' => '昵称不能超过 10 中文，30 英文',
    'x020205' => '管理员已存在',
    'x020206' => '该用户已存在，请使用授权为管理员',
    'x020207' => '该用户不存在，请使用创建管理员',

    /*++++++ x-2-3-- 权限 ++++++*/
    'x020301' => '您没有浏览管理员的权限',
    'x020302' => '您没有创建管理员的权限',
    'x020303' => '您没有编辑管理员的权限',
    'x020304' => '您没有删除管理员的权限',
    'x020306' => '不能编辑自己',

    /*++++++ x-2-4-- 状态 ++++++*/
    'y020401' => '管理员登录成功',
    'x020401' => '管理员尚未登录',
    'x020402' => '管理员被禁用',
    'x020403' => '登录校验错误',
    'x020404' => '登录超时，请保存好相关信息，重新登录！',


    /*@@@@@@ x-3---- 系统 @@@@@@*/

    /*++++++ x-3-1-- 数据 ++++++*/
    'y030101' => '创建会话成功',
    'x030101' => '创建会话失败',
    'y030102' => '会话存在',
    'x030102' => '会话不存在',
    'y030103' => '更新会话成功',
    'x030103' => '没有做任何修改',
    'y030104' => '删除会话成功',
    'x030104' => '未删除任何会话',

    'y030105' => '创建会话表成功',
    'x030105' => '创建会话表失败',
    'y030106' => '更新会话表成功',
    'x030106' => '没有做任何修改',
    'y030107' => '删除会话表成功',
    'x030107' => '未删除任何表',

    'y030108' => '创建数据表成功',

    'x030111' => '无法连接数据库服务器',
    'x030112' => '选择的数据库不存在',

    /*++++++ x-3-2-- 验证 ++++++*/
    'x030201' => '请输入 4 位验证码',
    'x030202' => '至少选择一项',
    'x030203' => '请选择具体操作',
    'x030204' => '输入不完整',
    'x030205' => '验证码错误',
    'x030206' => '令牌错误',
    'x030213' => 'PHP 版本过低，最低要求 5.3.3！',

    /*++++++ x-3-3-- php 上传 ++++++*/
    'x030301' => '附件的大小超过了 php.ini 的设置', //上传的文件超过了 php.ini 中的设置
    'x030302' => '附件的大小超过了表单的设置', //上传文件的大小超过了表单的设置
    'x030303' => '文件只有部分被上传', //文件只有部分被上传
    'x030304' => '没有文件被上传', //没有文件被上传
    'x030306' => '找不到临时目录', //找不到临时目录
    'x030307' => '文件写入失败', //找不到临时目录
    'x030308' => 'IV 长度必须为 16 位',

    /*++++++ x-3-4-- 状态 ++++++*/
    'x030401' => '正在验证',
    'x030402' => '验证过程出错',
    'x030403' => '系统已安装',
    'y030404' => '数据库设置成功',
    'x030404' => '数据库未正确设置',
    'y030405' => '设置成功',
    'y030407' => '创建管理员成功',
    'y030408' => '安装成功',
    'y030409' => '升级成功',
    'x030409' => '数据表未正确创建',
    'x030410' => 'SSO 需要执行安装程序',
    'x030411' => 'SSO 需要执行升级程序',
    'x030412' => '数据库未正确设置',
    'x030413' => '服务器环境检查未通过',
    'x030414' => '服务器环境检查未通过',
    'x030415' => '系统未安装',


    /*@@@@@@ x-4---- 设置 @@@@@@*/

    /*++++++ x-4-1-- 数据 ++++++*/
    'y040101' => '创建设置项成功',
    'x040101' => '创建设置项失败',

    /*++++++ x-4-2-- 验证 ++++++*/
    'x040201' => '请输入',
    'x040202' => '不能超过 300 中文，900 英文',
    'x040203' => '格式错误',
    'x040204' => '请输入数据库地址',
    'x040205' => '地址不能超过 300 中文，900 英文',
    'x040206' => '请输入数据库名称',
    'x040207' => '名称不能超过 300 中文，900 英文',
    'x040208' => '请输入数据库端口',
    'x040209' => '端口不能超过 300 中文，900 英文',
    'x040210' => '请输入数据库用户名',
    'x040211' => '用户名不能超过 300 中文，900 英文',
    'x040212' => '请输入数据库密码',
    'x040213' => '密码不能超过 300 中文，900 英文',
    'x040214' => '请输入数据库编码',
    'x040215' => '编码不能超过 300 中文，900 英文',
    'x040216' => '请输入数据表前缀',
    'x040217' => '前缀不能超过 300 中文，900 英文',
    'x040218' => '请选择',

    /*++++++ x-4-3-- 权限 ++++++*/
    'x040301' => '您没有设置的权限',

    /*++++++ x-4-4-- 状态 ++++++*/
    'y040401' => '设置成功',
    'y040402' => '检查更新成功',


    /*@@@@@@ x-5---- 应用 @@@@@@*/

    /*++++++ x-5-1-- 数据 ++++++*/
    'y050101' => '创建应用成功',
    'x050101' => '创建应用失败',
    'y050102' => '应用存在',
    'x050102' => '应用不存在',
    'y050103' => '更新应用成功',
    'x050103' => '没有做任何修改',
    'y050104' => '删除应用成功',
    'x050104' => '未删除任何应用',
    'y050105' => '创建应用表成功',
    'x050105' => '创建应用表失败',
    'y050106' => '更新应用表成功',
    'x050106' => '没有做任何修改',
    'y050107' => '删除应用表成功',
    'x050107' => '未删除任何表',

    'y050111' => '无需更新应用表',

    /*++++++ x-5-2-- 验证 ++++++*/
    'x050201' => '请输入应用名称',
    'x050202' => '应用名称不能超过 10 中文，30 英文',
    'x050203' => '获取应用 ID 错误',
    'x050204' => '应用 ID 必须为数字',

    'x050205' => '备注不能超过 10 中文，30 英文',
    'x050206' => '请选择状态',

    'x050207' => '请输入通知接口 URL',
    'x050208' => '通知接口 URL 不能超过 3000 字符',
    'x050209' => '通知接口 URL 格式错误',

    'x050210' => '允许 IP 地址最长不能超过 3000 英文',
    'x050211' => '禁止 IP 地址最长不能超过 3000 英文',
    'x050212' => '不允许访问的 IP 地址',
    'x050213' => '禁止访问的 IP 地址',

    'x050214' => '通信密钥不能少于 32 位',
    'x050215' => '通信密钥不能大于 32 位',
    'x050216' => '通信密钥格式错误',
    'x050217' => '通信密钥错误',

    'x050218' => '请选择是否同步',

    'x050219' => '请输入同步登录通知 URL',
    'x050220' => '同步登录通知 URL 不能超过 3000 字符',
    'x050221' => '同步登录通知 URL 格式错误',
    'x050222' => '无待加密数据',
    'x050223' => '无待解密数据',
    'x050224' => '无时间戳',
    'x050225' => '时间戳格式错误',
    'x050226' => '签名长度不能少于 32 位',
    'x050227' => '时差超过 30 分钟',
    'x050228' => '签名长度不能大于 32 位',
    'x050229' => '无加密信息',

    /*++++++ x-5-3-- 权限 ++++++*/
    'x050301' => '您没有浏览应用的权限',
    'x050302' => '您没有创建应用的权限',
    'x050303' => '您没有编辑应用的权限',
    'x050304' => '您没有删除应用的权限',

    'x050305' => '本应用没有用户注册权限',
    'x050308' => '本应用没有编辑用户权限',
    'x050309' => '本应用没有删除用户权限',
    'x050310' => '本应用没有更换邮箱的权限',

    'x050316' => '系统禁止注册',
    'x050317' => '本应用没有检查新短信权限',
    'x050318' => '本应用没有读取短信权限',
    'x050319' => '本应用没有列出短信权限',
    'x050320' => '本应用没有发送短信权限',
    'x050321' => '本应用没有更改短信状态权限',
    'x050322' => '本应用没有撤回短信权限',

    /*++++++ x-5-4-- 状态 ++++++*/
    'y050401' => '通知接口测试成功',
    'x050401' => '通知接口测试失败',
    'x050402' => '应用被禁用',
    'y050403' => '签名正确',
    'x050403' => '签名错误',
    'y050404' => '生成签名成功',
    'y050405' => '加密成功',
    'y050406' => '解密成功',


    /*@@@@@@ x-6---- 日志 @@@@@@*/

    /*++++++ x-6-1-- 数据 ++++++*/
    'y060101' => '创建日志成功',
    'x060101' => '创建日志失败',
    'y060102' => '日志存在',
    'x060102' => '日志不存在',
    'y060103' => '更新日志成功',
    'x060103' => '没有做任何修改',
    'y060104' => '删除日志成功',
    'x060104' => '未删除任何日志',
    'y060105' => '创建日志表成功',
    'x060105' => '创建日志表失败',
    'y060106' => '更新日志表成功',
    'x060106' => '没有做任何修改',
    'y060107' => '删除日志表成功',
    'x060107' => '未删除任何表',

    'y060111' => '无需更新日志表',

    /*++++++ x-6-2-- 验证 ++++++*/
    'x060201' => '获取日志 ID 错误',
    'x060202' => '请选择状态',

    /*++++++ x-6-3-- 权限 ++++++*/
    'x060301' => '您没有浏览日志的权限',
    'x060302' => '您没有创建日志的权限',
    'x060303' => '您没有编辑日志的权限',
    'x060304' => '您没有删除日志的权限',


    /*@@@@@@ x-7---- 应用从属 @@@@@@*/

    /*++++++ x-7-1-- 数据 ++++++*/
    'y070101' => '创建应用从属成功',
    'x070101' => '创建应用从属失败',
    'y070102' => '应用从属存在',
    'x070102' => '应用从属不存在',
    'y070103' => '更新应用从属成功',
    'x070103' => '没有做任何修改',
    'y070104' => '删除应用从属成功',
    'x070104' => '未删除任何应用从属',
    'y070105' => '创建应用从属表成功',
    'x070105' => '创建应用从属表失败',
    'y070106' => '更新应用从属表成功',
    'x070106' => '没有做任何修改',
    'y070107' => '删除应用从属表成功',
    'x070107' => '未删除任何表',

    'y070111' => '无需更新应用从属表',

    /*++++++ x-7-4-- 状态 ++++++*/
    'y070401' => '授权成功',
    'x070401' => '授权失败',
    'y070402' => '取消授权成功',
    'x070402' => '取消授权失败',
    'y070407' => '数据清理完毕',
    'x070407' => '正在清理数据',


    /*@@@@@@ x-8---- 密文 @@@@@@*/

    /*++++++ x-8-2-- 验证 ++++++*/


    /*@@@@@@ x-9---- 签名 @@@@@@*/

    /*++++++ x-9-2-- 验证 ++++++*/


    /*@@@@@@ x10---- 签名 @@@@@@*/

    /*++++++ x10-2-- 验证 ++++++*/
    'y100401' => '调用同步登录接口成功',
    'y100402' => '调用同步登出接口成功',


    /*@@@@@@ x11---- 短信 @@@@@@*/

    /*++++++ x11-1-- 数据 ++++++*/
    'y110101' => '发送短信成功',
    'x110101' => '发送短信失败',
    'y110102' => '短信存在',
    'x110102' => '短信不存在',
    'y110103' => '更新短信成功',
    'x110103' => '没有做任何修改',
    'y110104' => '删除短信成功',
    'x110104' => '未删除任何短信',

    'y110105' => '创建短信表成功',
    'x110105' => '创建短信表失败',
    'y110106' => '更新短信表成功',
    'x110106' => '没有做任何修改',
    'y110107' => '删除短信表成功',
    'x110107' => '未删除任何表',

    'y110109' => '撤回短信成功',
    'x110109' => '未撤回任何短信',

    /*++++++ x11-2-- 验证 ++++++*/
    'x110201' => '请输入短信内容',
    'x110202' => '标题不能超过 30 中文，90 英文',
    'x110203' => '内容不能超过 300 中文，900 英文',
    'x110204' => '请选择群发方式',
    'x110205' => '请输入收件人',
    'x110206' => '请输入关键词',
    'x110207' => '请输入关键词',
    'x110208' => '请输入起始用户 ID',
    'x110209' => '用户 ID 只能为数字',
    'x110210' => '请输入结束用户 ID',
    'x110211' => '获取短信 ID 错误',
    'x110212' => '请输入起始时间',
    'x110213' => '时间格式错误',
    'x110214' => '请输入结束时间',
    'x110215' => '请输入起始时间',
    'x110216' => '时间格式错误',
    'x110217' => '请输入结束时间',
    'x110218' => '请选择短信类型',
    'x110219' => '请选择短信状态',

    /*++++++ x11-3-- 权限 ++++++*/
    'x110301' => '您没有浏览短信的权限',
    'x110302' => '您没有群发短信的权限',
    'x110303' => '您没有发送短信的权限',
    'x110304' => '您没有删除短信的权限',
    'x110305' => '您没有编辑短信的权限',

    /*++++++ x11-4-- 权限 ++++++*/
    'y110401' => '您有未读短信',
    'x110401' => '您没有未读短信',
    'y110402' => '列出短信成功',
    'x110403' => '该短信不属于您',


    /*@@@@@@ x12---- 验证 @@@@@@*/

    /*++++++ x12-1-- 数据 ++++++*/
    'y120101' => '创建验证成功',
    'x120101' => '创建验证失败',
    'y120102' => '验证存在',
    'x120102' => '验证不存在',
    'y120103' => '更新验证成功',
    'x120103' => '没有做任何修改',
    'y120104' => '删除验证成功',
    'x120104' => '未删除任何验证',

    'y120105' => '创建验证表成功',
    'x120105' => '创建验证表失败',
    'y120106' => '更新验证表成功',
    'x120106' => '没有做任何修改',
    'y120107' => '删除验证表成功',
    'x120107' => '未删除任何表',

    'y120111' => '无需更新验证表',

    /*++++++ x12-2-- 验证 ++++++*/
    'x120201' => '获取验证 ID 错误',
    'x120202' => '获取验证口令错误',
    'x120203' => '验证已失效',
    'x120204' => '验证已过期',
    'x120205' => '验证口令错误',
    'x120206' => '请选择状态',
    'x120207' => '验证类型错误',

    /*++++++ x12-3-- 权限 ++++++*/
    'x120301' => '您没有操作验证的权限',
);
