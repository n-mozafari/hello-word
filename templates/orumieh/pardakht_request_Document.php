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
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><p>باسلام ، احتراما برابر اعلاميه خريد به شماره <?=$param['formValue']['nameKharidNumber']?> مورخ <?=str_replace('-','/',$param['formValue']['nameKharidDate'])?>
         شركت <?=$param['formValue']['kargozariCompanyName']?> ، با توجه به قطعيت معامله خريد <?=$param['trade']['generalInfo']['data']['title']?> موضوع سفارش ، خواهشمند است دستور فرمائيد جهت جلوگيري از اتلاف وقت واعمال جرائم مربوطه تا قبل از ساعت
         <?=$param['formValue']['pardakhtHour']?> روز <?=$param['formValue']['pardakhtDay']?> مورخ <?=str_replace('-','/',$param['formValue']['pardakhtDate'])?> ، مبلغ <?=$param['formValue']['mablaghMabeOtafavot']?> ريال  بابت مابه التفاوت معامله بصورت چك بانكي ويا واريز نقدي به حساب شماره 
         <?=$param['formValue']['shomareHesabeMabeOtafavot']?> بانك <?=$param['formValue']['shobeBankeMabeOtafavot']?> با شناسه پرداخت <?=$param['formValue']['shenaseParkhateMabeOtafavot']?>
          بنام <?=$param['formValue']['darandeHesabeMabeOtafavot']?> ومبلغ <?=$param['formValue']['mablagheMaliateArzeshAfzoode']?> ريال بابت <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total']*100?> درصد عوارض وماليات برارزش افزوده به حساب شماره <?=$param['formValue']['shomareHesabeMaliat']?> بانك <?=$param['formValue']['shobeBankeMaliat']?> 
          بنام <?=$param['formValue']['darandeHesabeMaliat']?> واريز واعلاميه هاي مربوطه را جهت اطلاع كارگزاري باهنر از طريق دورنگار <?=$param['formValue']['kargozariFaxNumber']?> ارسال نمايند . ضمنا مبلغ كل معامله (بدون ارزش افزوده ) 
          <?=$param['formValue']['mablaghePishpardakht']?>ريال ميباشد كه <?=$param['formValue']['pishpardakhtDarsad']?> درصد اين مبلغ در تاريخ <?=str_replace('-','/',$param['formValue']['pardakhtePishDate'])?>بعنوان پيش پرداخت از طريق حساب وكالتي در وجه <?=$param['formValue']['kargozariCompanyName']?> واريز شده است  </p></div>

    
        </br>                                   
        </br>
        <div style="font-weight: bold; text-align: left; margin-left: 150px;">
            <div><?=$param['role']['generalInfo']['data'][2]['lname']?></div>
            <div>مدیر امور تدارکات</div>
        </div> 
    </div>
</div>  
