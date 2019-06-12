<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/adminStatic/css/font.css">
        <link rel="stylesheet" href="/adminStatic/css/xadmin.css">
        <script type="text/javascript" src="/adminStatic/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/adminStatic/js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">

                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>菜单标题</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="m_title" required="" lay-verify="m_title" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">最大为6个汉字</div>
                    </div>

                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>URL</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="m_url" required="" lay-verify="m_url" autocomplete="off" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">URL最长为30个字符\若是父级，'/'表示</div>
                    </div>

                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>父级菜单</label>
                        <div class="layui-input-inline">
                            <select id="" name="m_pid" class="valid">
                                <option value="0">父级菜单</option>
                                @foreach ($menusData as $k => $v)
                                    <option value="{{   $v->m_id    }}">{{ $v->m_title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    @csrf

                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="add" lay-submit="">增加</button>
                    </div>

                </form>
            </div>
        </div>
        <script>
            layui.use(['form', 'layer','jquery'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                form.verify({
                    m_title: function(value) {
                        if (value.length <= 0 || value.length > 18) {
                            return '菜单标题最大为6个汉字';
                        }
                    },
                    m_url:function(value){
                       if(value.length <= 0 || value.length > 30){
                           return '菜单路由最长为30个字符';
                       }
                    },
                    // pass: [/(.+){6,12}$/, '密码必须6到12位'],
                    // repass: function(value) {
                    //     if ($('#L_pass').val() != $('#L_repass').val()) {
                    //         return '两次密码不一致';
                    //     }
                    // }
                });

                //监听提交
                form.on('submit(add)', function(data) {
                    /**
                     * 异步添加数据
                     */
                    // console.log(data);
                    var m_title = $("input[name='m_title']").val();
                    var m_url = $("input[name='m_url']").val();
                    var m_pid = $("select[name='m_pid']").val();
                    var _token = $("input[name='_token']").val();

                    $.post("/admin/addmenus",{m_title:m_title,m_url:m_url,m_pid:m_pid,_token:_token},function (jsonMsg) {
                        var objMsg = $.parseJSON(jsonMsg);
                        if(objMsg.errorCode == 200){
                            // location.href="admin/showmenus";
                        }else{
                            alert("添加菜单失败");return false;
                        }
                    });
                    //发异步，把数据提交给php
                    layer.alert("增加成功", {
                        icon: 6
                    },
                    function() {
                        //关闭当前frame
                        xadmin.close();

                        // 可以对父窗口进行刷新 
                        xadmin.father_reload();
                    });
                    return false;
                });

            });
        </script>
        <script>
            var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </body>

</html>