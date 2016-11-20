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
                پیوست:<?=$param['formValue']['attachmnet']?>
            </div> 
        </div>  
        <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:15px;"><strong>سال دولت و ملت، همدلی و همزبانی</strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><strong>شركت محترم كارگزاري <?=$param['formValue']['kargozariName']?></strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><p>باسلام ،احتراما عطف به اعلاميه خريد به شماره <?=$param['formValue']['elamieKharidNumber']?> مورخ <?=str_replace('-','/',$param['formValue']['elamieKharidDate'])?>
          بدينوسيله باستحضار ميرساند مبالغ مشروجه ذيل ازبابت مابه التفاوت معامله خريد  <?=$param['trade']['aghlam']['data']['quantity']?> <?=$param['trade']['aghlam']['data']['vahed']?> <?=$param['trade']['generalInfo']['data']['title']?> و <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total']*100?> درصد عوارض و ماليات برارزش افزوده آن برابر <?=$param['formValue']['attachmnet']?>
          فيش بانكي پيوستي به حسابهاي بانكي اعلام شده از طرف آن كارگزاري واريز گرديده، خواهشمند است دستور فرمائيد ضمن اعلام وصول  مبالغ مذكور،دستورات لازم جهت تسريع در تحويل كالاي موضوع معامله را صادر نمايند.
          </p>
          <ol>
            <li>مبلغ <?=$param['formValue']['mablagheVarizeNaghdi']?> ريال  واريز نقدي به حساب شماره <?=$param['formValue']['shomareHesabeMabeOtafavot']?> بانك <?=$param['formValue']['bankeMabeOtafavot']?> با شناسه پرداخت  <?=$param['formValue']['shenasePardakhteMabeOtafavot']?> بنام <?=$param['formValue']['darandeHesabeMabeOtafavot']?></li>
            <li>مبلغ <?=$param['formValue']['mablagheArzeshAfzoode']?> ريال به حساب شماره <?=$param['formValue']['hesabeArzeshAfzoode']?> بانك <?=$param['formValue']['bankeArzeshAfzoode']?> بنام <?=$param['formValue']['darandeHesabeArzeshAfzoode']?></li>
          </ol></div>

    
        </br>                                   
        </br>
        <div style="font-weight: bold; text-align: left; margin-left: 150px;">
            <div><?=$param['role']['generalInfo']['data'][2]['lname']?></div>
            <div>مدیر امور تدارکات</div>
        </div>  
    </div>
</div>  
