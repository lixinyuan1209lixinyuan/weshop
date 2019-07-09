<header>
    <div class="top center">
        <div class="left fl">
            <ul>
                <li><a href="http://weshop.io">小米商城</a></li>
                <li>|</li>
                <li><a href="">MIUI</a></li>
                <li>|</li>
                <li><a href="">米聊</a></li>
                <li>|</li>
                <li><a href="">游戏</a></li>
                <li>|</li>
                <li><a href="">多看阅读</a></li>
                <li>|</li>
                <li><a href="">云服务</a></li>
                <li>|</li>
                <li><a href="">金融</a></li>
                <li>|</li>
                <li><a href="">小米商城移动版</a></li>
                <li>|</li>
                <li><a href="">问题反馈</a></li>
                <li>|</li>
                <li><a href="">Select Region</a></li>
                <div class="clear"></div>
            </ul>
        </div>
        <div class="right fr">
            <div class="gouwuche fr"><a href="/shopping">购物车</a></div>
            <div class="fr">
                <ul>
                    <li>
                        @if((!empty($thisUser)))
                            <a href="me" target="_blank">{{$thisUser['uname']}}</a>
                        @else
                            <a href="login" target="_self">登录</a>
                        @endif
                    </li>
                    @if(!empty($thisUser))
                        <li>|</li>
                        <li><a href="loginout">退出</a></li>
                    @endif
                    <li>|</li>
                    <li><a href="register" target="_blank" >注册</a></li>
                    <li>|</li>
                    <li><a href="">消息通知</a></li>

                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</header>