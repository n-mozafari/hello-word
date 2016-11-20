<?$jdf = new jdf()?>
<?
    $receiverType = ($param['trade']['girandegan']['data']['type']==0)? 'شرکت ' : 'پیمانکار';
?>
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto;">
    <div style="margin-top: 50px; width: 100%;">
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
    <div style="clear: both;">به <?=$receiverType?> محترم : <?=$param['trade']['girandegan']['data']['title']?>
        <br>ازشركت توزيع برق آذربايجانغربي
        <br>موضوع : دعوت به مناقصه
    </div>
    <div>دراجراي تصميمات بعمل آمده بدينوسيله از آن <?=$receiverType?> محترم دعوت مي شود حداكثر تا تاریخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['mohlatePasokheAvalie']))?> در مناقصه ای محدود با مشخصات ذيل شركت نمايد :
    <br><strong>1- موضوع مناقصه :</strong> <?=$param['trade']['generalInfo']['data']['title']?>
    <br><strong>2- محل کار :</strong> <?=$param['trade']['specInfo']['data']['tahvilKhadamatPlace']?>
    <br><strong>3- مدت اجرای کار :</strong> <?=$param['trade']['specInfo']['data']['tahvilKhadamatModat']?>
    <br><strong>4- کارفرما :</strong> شرکت توزيع نيروی برق آذربايجان غربی
    <br><strong>5- تعيين برنده و مبلغ تضمين شرکت در مناقصه :</strong>
    <br>الف) تعيين برنده مناقصه بصورت <?=$param['trade']['specInfo']['data']['winner_selection_type']?> خواهد بود
    <br>ب) مبلغ کل سپرده شرکت در مناقصه <?=''?> (<?=''?>) ريال مي باشد و  بايستی به يکی از صورتهای(رسيد بانکی واريز وجه مزبور به حساب سيبا شماره 0105592677009  بانک ملی شعبه برق به نشانی اروميه - خيابان باکری - ساختمان مديريت برق اروميه/ چک تضمين شده بانکی به نفع کارفرما/ ضمانتنامه بانکی به نفع کارفرما) به همراه اسناد مناقصه به دستگاه مناقصه گزار تسليم شود :
    <br>مدت اعتبار ضمانتنامه شركت درمناقصه بايد حداقل سه ماه پس از تاريخ افتتاح پيشنهادها بوده و برای سه ماه ديگر نيز قابل تمديد باشد و علاوه بر آن ضمانتنامه های بانکی بايد طبق فرمهای مورد قبول ، تنظيم شود .
    <br><strong>6- نشانی محل تسليم پيشنهادها :</strong> اروميه - خيابان سربازان گمنام - نرسيده به ميدان مخابرات - دبيرخانه شرکت توزيع نيروی برق آذربايجان غربی
    <br>7- در صورتيکه مايل به مشارکت در اين مناقصه نيستيد ، مراتب را تا آخر وقت اداری مورخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['mohlatePasokheAvalie']))?> به دستگاه  مناقصه گزار اطلاع دهيد .
    <br>8- آخرين مهلت  تسليم پيشنهادها ، ساعت <?=$param['trade']['specInfo']['data']['tahvilPakatHour']?> روز <?=$param['trade']['specInfo']['data']['tahvilPakatDay']?> مورخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['tahvilPakatDate']))?> ميباشد.
    <br>9- تمام اسناد مناقصه ، از جمله اين دعوتنامه بايد به مهر و امضاي مجاز تعهدآور پيشنهاد دهنده برسد و همراه با پيشنهاد قيمت تسليم شود ضمناً تمام پاكات مناقصه ميبايستي لاك ومهر شده وتحويل گردد.
    <br>10- پيشنهادهای واصله در ساعت <?=$param['trade']['specInfo']['data']['monagheseJalase_hour']?> (<?=numToString($param['trade']['specInfo']['data']['monagheseJalase_hour'])?>) روز <?=$param['trade']['specInfo']['data']['monagheseJalaseDay']?> مورخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['monagheseJalase_ِdate']))?> در کميسيون مناقصه بازو خوانده ميشود . حضور يک نفر نماينده از طرف هر يک از پيشنهاد دهندگان در جلسه افتتاح پيشنهادها آزاد است .
    <br>11- دستگاه مناقصه گزار در رد يا قبول هر يک يا تمام پيشنهادها مختار است .
    <br>12- جهت کسب اطلاع بيشتر مي توانيد با شماره تلفنهای 33449002 و 33443691  اداره مناقصات و قراردادها تماس حاصل فرمائيد .
    </div>
    <div style="float: left; clear: both;"><?=$param['role']['generalInfo']['data'][9]['lname']?><br>معاون مالي و پشتيبانی
    </div>
</div>