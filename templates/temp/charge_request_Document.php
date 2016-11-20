<?$jdf = new jdf()?>
<br/>
<div style = "min-width:90%; width:90%; min-height:870px; direction: rtl; border:2px solid; margin:20px auto 20px auto;">
    <div style="min-height:820px; margin: 20px;">
        <div>
            <div style="margin-top:10px; font-size:14px; text-align: center;">
                بسمه تعالی
            </div>
            <?$src = $type != 'word' ? "../../core/images/logo/document_logo.png" : 'http://192.168.10.111/core/images/logo/document_logo.png'?>   
            <div style="float: right; margin-right:40px; margin-top:10px; font-size:14px;">
                <img src="<?=$src?>" alt="<?=$_SESSION['companyTitle']?>">
            </div>
            <div style="float:left; border:1px solid; margin-left:5px; margin-top: 5px; padding: 2px 2px 2px 50px; font-size:12px;">
                تاریخ: <?=str_replace('-','/',$param['formValue']['date'])?>
                <br>
                شماره:<?=$param['formValue']['number']?>
                <br>
                پیوست:<?=$param['formValue']['attachment']?>
            </div> 
        </div>  
        <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:15px;"><strong>سال دولت و ملت، همدلی و همزبانی</strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><strong>امور محترم مالي</strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><p>باسلام احتراما پيرو تصميمات متخذه در جلسات كميته برنامه ريزي خريد ودستوراكيد مديريت محترم عامل مبني بر خريد فوري 
        <?=$param['trade']['generalInfo']['data']['title']?> جهت <?=$param['formValue']['project']?>
         ، خواهشمند است دستور فرمائيد جهت تسريع در امرخريد وتصميم گيري به موقع در انجام معامله نسبت به واريز  مبلغ حدودا <?=$param['formValue']['mablagh']?>
          (به حساب وكالتي ) بابت <?=$param['formValue']['percent']?> درصد تاييد سفارش خريد <?=$param['trade']['generalInfo']['data']['title']?> از طريق <?=$param['formValue']['bazar']?>
           ،اقدام لازم وبه موقع بعمل آورده شود. بديهي است پس از تاييد و ثبت سفارش قطعي خريد ،مبلغ كل  معامله با كسر <?=$param['formValue']['percent']?>
            مبلغ فوق  بايستي  برابر شرايط مندرج در اعلاميه فروش  به حساب  مذكوركارسازي و پرداخت شود. كليه اسناد ومدارك مثبته پس از ثبت سفارش ارائه خواهد شد  </p></div>

    
        </br>                                   
        </br>
        <div style="font-weight: bold; text-align: left; margin-left: 150px;">
            <div><?=$param['role']['generalInfo']['data'][2]['lname']?></div>
            <div>مدیر امور تدارکات</div>
        </div> 
    </div>
</div>  
