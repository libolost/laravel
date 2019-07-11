<!DOCTYPE html>
<html>

  <head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet" href="/static/Homes/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
    <link href="/static/Homes/css/dlstyle.css" rel="stylesheet" type="text/css">
    <script src="/static/Homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/static/Homes/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/static/Homes/bootstrap/css/bootstrap.min.css">

  </head>
  <style type="text/css">
    .cur{
      border:1px solid red;
    }

     .curs{
      border:1px solid green;
    }
  </style>
  <body>

    <div class="login-boxtitle">
      <a href="home/demo.html"><img alt="" src="/static/Homes/images/logobig.png" /></a>
    </div>

    <div class="res-banner">
      <div class="res-main">
        <div class="login-banner-bg"><span></span><img src="/static/Homes/images/big.jpg" /></div>
        <div class="login-box">

            <div class="am-tabs" id="doc-my-tabs">
              <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                <li class="am-active"><a href="">邮箱注册</a></li>
                <li><a href="">手机号注册</a></li>
              </ul>

              <div class="am-tabs-bd">
                <div class="am-tab-panel am-active">
                  <form  action="" method="post">
                 <div class="user-email">
                    <label for="email"><i class="am-icon-envelope-o"></i></label>
                    <input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                 </div>                   
                 <div class="user-pass">
                    <label for="password"><i class="am-icon-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="设置密码">
                 </div>                   
                 <div class="user-pass">
                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                    <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码">
                 </div> 

                  <div class="user-pass">
                    <label for="passwordRepeat"><i class="am-icon-code-fork"></i></label>
                    <img src="" onclick="this.src=this.src+'?a=1'" style="float:right"> 
                 </div>

                  <div class="verification">
                      <label for="code"><i class="am-icon-code-fork"></i></label>
                      <input type="tel" name="code" id="code" placeholder="请输入验证码">
                    </div> 
                 
                 
                 <div class="login-links">
                  </div>
                    <div class="am-cf">
                      <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                    </div>

                </div>

                </form>

                <div class="am-tab-panel">
                  <form method="post" action="/registerphone" id="ff">
                 <div class="user-phone" style="margin-top:20px">
                    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
                    <input type="tel" name="phone" id="phone" placeholder="请输入手机号" class="ll"reminder="请输入正确的手机号"><span></span>
                 </div>                                     
                    <div class="verification" style="margin-top:20px">
                      <label for="code"><i class="am-icon-code-fork"></i></label>
                      <input type="tel" name="code" id="code" placeholder="请输入验证码"  style="width:140px" class="ll" reminder="请输入验证码"><span></span>
                      <a href="javascript:void(0)"class="btn btn-info" style="float:right" id="ss">获取</a>
                    </div>
                 <div class="user-pass" style="margin-top:20px">
                    <label for="password"><i class="am-icon-lock"></i></label>
                    <input type="password" name="password" id="password" placeholder="设置密码" class="ll" reminder="请输入正确的密码"><span></span>
                 </div>                   
                 <div class="user-pass" style="margin-top:20px">
                    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                    <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码" class="ll" reminder="请再次重复密码"><span></span>
                 </div> 
                    <div class="am-cf">
                      <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                    </div>
                    </form>
                
                  <hr>
                </div>

                <script>
                  $(function() {
                      $('#doc-my-tabs').tabs();
                    })
                </script>

              </div>
            </div>

        </div>
      </div>
      
          <div class="footer ">
            <div class="footer-hd ">
              <p>
                <a href="# ">恒望科技</a>
                <b>|</b>
                <a href="# ">商城首页</a>
                <b>|</b>
                <a href="# ">支付宝</a>
                <b>|</b>
                <a href="# ">物流</a>
              </p>
            </div>
            <div class="footer-bd ">
              <p>
                <a href="# ">关于恒望</a>
                <a href="# ">合作伙伴</a>
                <a href="# ">联系我们</a>
                <a href="# ">网站地图</a>
                <em>© 2015-2025 Hengwang.com 版权所有</em>
              </p>
            </div>
          </div>
  </body>
  <script type="text/javascript">
  </script>
</html>