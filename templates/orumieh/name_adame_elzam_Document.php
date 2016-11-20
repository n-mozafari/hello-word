<?$jdf = new jdf()?>
<br/>
<div style = "min-width:90%; width:90%; min-height:870px; direction: rtl; border:2px solid; margin:20px auto 20px auto;">
    <div style="min-height:820px; margin: 20px;">
        <div>
            <div style="margin-top:10px; font-size:14px; text-align: center;">
                بسمه تعالی
            </div>   
            <div style="float: right; margin-right:40px; margin-top:10px; font-size:14px;">
                <img src="../../core/images/logo/document_logo.png" alt="<?=$_SESSION['companyTitle']?>">
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
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><strong>معاونت محترم مالي وپشتيباني</strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><p>با سلام: احتراماً باستحضار ميرساند یک فقره درخواست ذيل از طرف <?=$param['formValue']['darkhastKonande']?>
         در دستور کار اين امور می باشد. لذا با توجه به اينکه موضوع مذكور برابر بند 6 ماده 26 آيين نامه معاملات شرکت، عدم الزام بوده و باستناد تبصره ذيل ماده 12 چون انتخاب مشاور برای اجرای خدمات مذکور از طريق رقابت (مناقصه/ استعلام بهاء) تعيين نگرديده است، لذا حق الزحمه مشاور بايستی با پيشنهاد مدير عامل و تاييد هئيت مديره محترم شرکت انجام گيرد. مراتب جهت استحضار و صدور دستورات لازم جهت طرح در هئيت محترم مديره ايفاد ميگردد. 
        <br> 1- <?=$param['trade']['generalInfo']['data']['title']?> بامبلغ <?=$param['trade']['generalInfo']['data']['baravard']?> ريال باشرکت <?=$param['trade']['girandegan']['data'][0]['title']?></p>
         </div>

    
        </br>                                   
        </br>
        <div style="font-weight: bold; text-align: left; margin-left: 150px;">
            <div><?=$param['role']['generalInfo']['data'][2]['lname']?></div>
            <div>مدیر امور تدارکات</div>
        </div>  
    </div>
</div>  
