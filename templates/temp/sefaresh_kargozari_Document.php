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
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><strong>كارگزاري محترم <?=$param['formValue']['kargozariName']?></strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><strong>موضوع :درخواست ثبت سفارش خريد <?=$param['trade']['generalInfo']['data']['title']?></strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><p>باسلام : پيرو مذاکره تلفنی مورخ <?=str_replace('-','/',$param['formValue']['mozakereDate'])?> ، خواهشمنداست دستورفرمائيد نسبت به ثبت سفارش خريد <?=$param['trade']['aghlam']['data']['quantity'].' '.$param['trade']['aghlam']['data']['vahed'].' '.$param['trade']['generalInfo']['data']['title']?>
          در سايزهای ذيل(حتي المقدورتوليدات شركت هاي <?=$param['formValue']['sherkate1']?> یا <?=$param['formValue']['sherkate2']?>) اقدام ونتيجه را به اين شرکت اعلام نمايند.
          </p>
          <ol>
            <?
                $tfiArr = $param['trade']['aghlam']['data'];
                if(count($tfiArr)>0)
                { 
                    $counter = 0;
                    foreach($tfiArr as $value)
                    {
                        ?>
                        <li><?=$value['title']?></li>
                        <? 
                    }
                } ?>
          </ol></div>

    
        </br>                                   
        </br>
        <div style="font-weight: bold; text-align: left; margin-left: 150px;">
            <div><?=$param['role']['generalInfo']['data'][9]['lname']?></div>
            <div>معاون مالي وپشتيباني</div>
        </div>
        <div style="text-align: right;"> 
            <p style="font-weight: bold;">رونوشت به:</p>
            <p>-مديريت محترم عامل جهت استحضار وصدور دستورات لازم</p>
            <p>-امور محترم مالي جهت اطلاع واقدام لازم</p>
        </div>  
    </div>
</div>  
