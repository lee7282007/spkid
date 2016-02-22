<!--copyright-start-->
<div class="copyright clearfix">
     <div class="copyright-show clearfix">
          <div class="copyright-lb">
               <ul class="f-regular-list clearfix">
               <li class="copyright-bz">严格准入标准</li>
               <li class="copyright-tuihuo">7天无理由退货</li>
               <li class="copyright-mianfei">15天免费换货</li>
               <li class="copyright-pinpai">品牌授权</li>
               <li class="copyright-rongyu">权威荣誉</li>
               </ul>
          </div>
     </div>
     
     <div class="f-product-info min-width clearfix">
          <div class="f-product-left">
                 <div class="copyright-tel"><img src="<?php echo static_style_url('pc/images/tel.png')?>"></div>
                 <div class="f-info-inner">
                      <a target="_blank" href="/about_us/about_us">关于悦牙网</a>
                      <a target="_blank" href="/about_us/service">服务条款</a>
                      <a target="_blank" href="/about_us/feedback">意见反馈</a>
                      <a target="_blank" href="/about_us/sales_policy">售后政策</a>
                      <a target="_blank" href="/about_us/team_work">合作咨询</a>
                      <a target="_blank" href="/about_us/join_us">加入我们</a>
                </div>
          </div>
          <div class="f-focus-us">
               <div class="copyright-txt">
                    关注我们:
                    <div class="f-focus-icon">
                         <img id="wechat_qrcode" style="display:none;position: absolute; width: 120px; z-index: 99999; margin-top: -120px;" src="<?php echo static_style_url('pc/images/wechat_qrcode.jpg')?>">

                         <a class="c-weixin" target="_blank" href="javascript:void(0)" onmouseover="var wechat_qrcode = document.getElementById('wechat_qrcode'); wechat_qrcode.style.display='block';" onmouseout="var wechat_qrcode = document.getElementById('wechat_qrcode'); wechat_qrcode.style.display='none';"
                         ></a>
                         <a class="c-weibo" target="_blank" href="http://weibo.com/oswelldental"></a>
                         
                   </div>
              </div>
              <div class="phone-wx"><p>手机悦牙网</p><img src="<?php echo static_style_url('pc/images/mobile_qrcode.jpg')?>"></div>
              
              
        </div>
    
    
    </div>
     
     

</div>    
</body>

<script>

    var is_hover = false;
    function hide_menu() {
      if (is_hover) {
        return false;
      } else {
        $('.menu_tips').removeClass('arrow_down').addClass('arrow_up');
        $('.menu_items').hide('slow');
      }
    }
    /*
    //判断用户是否登录
    $(function(){
      var cookies = document.cookie ? document.cookie.split('; ') : [];
      var v_user_name = '';
      for (var i = cookies.length - 1; i >= 0; i--) {
        var item = cookies[i].split('=');
        if (item[0]=='v_user_name') {
          v_user_name = decodeURIComponent(item[1]);
        };
      };

      if (!v_user_name) {
        $('.naver-login').html('<a href="/user/login" class="nav-user">登录</a>');
      } else {
        var str = '<a href="/user/index.html" class="nav-user">' + v_user_name + '</a>';

        $('.naver-login').html(str);
      }

 */
    $(function(){
$('#response_num').load('/user/my_response');
     $('.menu_tips').addClass('arrow_up');
      $('.nav-user').hover(
        function(){
          $('.menu_tips').removeClass('arrow_up').addClass('arrow_down');
          
          $('.menu_items').show('slow');
        },
        function(e) {
          //console.log(e.target);
          
          setTimeout("hide_menu()", 5000);
        }
);
$('.naver-login').mouseover(function(){
        $('.menu_items').show();
	$('.menu_tips').removeClass('arrow_down').addClass('arrow_up');
      });


      $('.naver-login, .menu_items').mouseout(function(){
        $('.menu_items').hide();
        
        $('.menu_tips').removeClass('arrow_up').addClass('arrow_down');
      });

      $('.autocomplete,.nav-search').mouseleave(function(){
        $('.autocomplete').empty();
      });

        if ($('[data-toggle="popover"]')){
            $('[data-toggle="popover"]').popover();
        }
    })


</script>
</html>

