<?$jdf = new jdf()?>
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto;">
    <div style="margin-top: 50px; width: 100%; clear: both;">
        <div style="margin-top:10px; font-size:14px; text-align: center; float: right; width:33%; text-align: center;">
            <img src="../../core/images/logo/document_logo.png" width="200px" alt="<?=$_SESSION['companyTitle']?>">
        </div>   
        <div style="float: right; margin-top:10px; margin-right:40px; font-size:14px; width:30%; text-align: center;">
            <div><?=$_SESSION['companyTitle']?></div> 
        </div>
        <div style="float: right; margin-top:10px; margin-right:40px; font-size:14px; width:30%; text-align: center;">
            <div>شماره : <?=$param['formValue']['number']?></div>
            <div>تاریخ: <?=str_replace('-','/',$param['formValue']['date'])?></div>    
        </div>
    </div>
    <div style="clear: both;">دفتر تهران برق منطقه اي آذربايجان – جناب آقاي بهرامي
        <br>ارسال اسناد مناقصه شماره <?=$param['trade']['generalInfo']['data']['code']?>
    </div>
    <div>باسلام: بدينوسيله <?=$param['formValue']['tedadeAsnad']?> سری از اسناد و شرايط مناقصه عمومی شماره <?=$param['trade']['generalInfo']['data']['code']?> موضوع <?=$param['trade']['generalInfo']['data']['title']?> جهت ارائه به مراجعين ارسال ميگردد باستحضار ميرساند اسناد مربوطه در مقابل رسيد بانکی واريز وجه به مبلغ <?=number_format($param['trade']['specInfo']['data']['asnadCost'])?> (<?=numToString($param['trade']['specInfo']['data']['asnadCost'])?>) ريال بابت بهای اسناد مذکور (واريزی به حساب سيبا 0105592677009 شرکت نزد بانک ملی شعبه برق اروميه ـ کد بانک 5133) ومعرفينامه تا پايان وقت اداری روز <?=$param['trade']['specInfo']['data']['foroshMohlatDay']?> مورخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['foroshMohlat']))?> به فروش خواهد رسيد. خواهشمند است در حداقل زمان ممکن بعد از اتمام مهلت فروش اسناد، ليست دريافت کنندگان اسناد مربوطه را با ذکر شماره تلفن و دورنگار آنها از طريق دورنگار به اين امور ارسال فرمائيد. ضمناً ليست اشخاص و شركت هايي كه نبايد به آنها اسناد داده شود قبلا ارسال شده است.
    </div>
    <div style="float: left; clear: both;"><span style="padding-left: 30px;"><?=$param['role']['generalInfo']['data'][2]['lname']?></span><br>مدير امور تدارکات
    </div>
</div>