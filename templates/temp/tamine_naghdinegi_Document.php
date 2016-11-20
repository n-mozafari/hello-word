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
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><p>باسلام ،احتراما " برابر تصميمات متخذه در جلسه كميته برنامه ريزي خريد مبني بر <?=$param['formValue']['mozooeJalaseKharid']?> ،بدينوسيله يك فقره درخواست خريد ميلگرد جمعا" به مبلغ 
        <?=$param['formValue']['mablagheCheck']?> ريال  ارسال ميگردد خواهشمند است دستور فرمائيد با توجه به اينكه خريد ميلگرد از طريق بورس فلزات تهران انجام مي گيرد نسبت به تامين نقدينگي لازم اقدام لازم بعمل آورده شود</p>
         </div>

    
        </br>                                   
        </br>
        <div style="font-weight: bold; text-align: left; margin-left: 150px;">
            <div><?=$param['role']['generalInfo']['data'][2]['lname']?></div>
            <div>مدیر امور تدارکات</div>
        </div>  
    </div>
</div>  
