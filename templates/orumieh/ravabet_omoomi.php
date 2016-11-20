<?$jdf = new jdf()?>
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
        <div style="clear: both;">مدير محترم روابط عمومي
        <br>ارسال يك برگ از آگهي مناقصه شماره <?=$param['trade']['generalInfo']['data']['code']?>
        </div>
        <div>باسلام: بدينوسيله يک برگ آگهی مناقصه شماره <?=$param['trade']['generalInfo']['data']['code']?> موضوع <?=$param['trade']['generalInfo']['data']['title']?> به پيوست جهت نصب در پانل اعلانات ساختمان مرکزی ستاد شرکت ومديريت های توزيع استان  ارسال ميگردد. خواهشمند است دستورفرمائيد در اسرع وقت اقدام لازم بعمل آورند.
        </div>
        <div style="float: left; clear: both;"><?=$param['role']['generalInfo']['data'][2]['lname']?><br>مدير امور تدارکات
        </div>
        <div style="clear: both;"><strong>رونوشت به :</strong>
        <br>- کليه نواحی محترم تابعه بانضمام يک برگ از آگهی مذکور جهت استحضار واقدام مشابه
        </div>
    </div>