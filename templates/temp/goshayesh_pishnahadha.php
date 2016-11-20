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
                کد فرم: <?=''?>
                <br>
                شماره:<?=''?>
                <br>
                تاریخ:<?=''?>
            </div> 
        </div>  
        <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:15px;"><strong>صورت جلسه گشایش پیشنهادها در استعلامبها</strong></div>
        <div align = "center" style = "text-align: right; min-width:90%; width:90%; margin: auto; border:1px solid #000;">                 
            <div style="width: 100%;">
                <div style="width:50%; float:right; border:1px solid #000; padding-right: 20px;  padding-left: 20px;">شماره استعلام بها : <?=$param['trade']['generalInfo']['data']['code']?></div>
                <div style="border:1px solid #000;padding-right: 20px; padding-left: 20px;">تاریخ جلسه:<?=''?></div>
            </div>
            <div style="width:100%; border:1px solid #000; clear:both;">موضوع : <?=$param['trade']['generalInfo']['data']['title']?></div>
            <div style="width:100%; border:1px solid #000;">برابر دعوتنامه استعلام بهای شماره <?=$param['trade']['generalInfo']['data']['code']?> مورخه <?=''?> ، جلسه گشایش پیشنهادات استعلام بهای مذکور در روز <?=''?> مورخه <?=''?> در محل دفتر امور تدارکات شرکت <?=$_SESSION['companyTitle']?> تشکیل گردید. در این راستا کارپرداز در مورد نحوه انجام کار، اظهار داشت </div>
            <div style="width:100%; border:1px solid #000;">
                <p style="font-weight: bold;">شرکت هایی که به برای شرکت در استعلام بها دعوت شده اند:</p>
                <p>
                    <?
                    $counter = 0;
                    foreach($param['trade']['girandegan']['data'] as $ebRow)
                    {
                        $counter++;
                        ?>
                        <?=$counter. ' - '.$ebRow['title']?>
                        <?}?>
                </p>
            </div>

            <div style="width:100%; border:1px solid #000;">
                <p style="font-weight: bold;">شرکت هایی که از پیشنهاد قیمت انصراف داده اند:</p>
                <p>
                    <?
                    $counter = 0;
                    foreach($param['trade']['girandegan_enseraf']['data'] as $ebRow)
                    {
                        $counter++;
                        ?>
                        <?=$counter. ' - '.$ebRow['title']?>
                        <?}?>
                </p>
            </div>

            <div style="width:100%; border:1px solid #000;">
                <p style="font-weight: bold;text-align: right;">شرکت هایی که پیشنهاد ارائه ننموده اند:</p>
                <p>
                    <?
                    $counter = 0;
                    foreach($param['trade']['girandegan_not_pishnahadat']['data'] as $ebRow)
                    {
                        $counter++;
                        ?>
                        <?=$counter. ' - '.$ebRow['title']?>
                        <?}?>
                </p>
            </div>

            <div style="width:100%; border:1px solid #000;text-align: right;">
                <p style="font-weight: bold;">شرکت هایی که اقدام به ارائه پیشنهاد نموده اند:</p>
                <p>
                    <?
                    $counter = 0;
                    foreach($param['trade']['girandegan_accept_pishnahadat']['data'] as $ebRow)
                    {
                        $counter++;
                        ?>
                        <?=$counter. ' - '.$ebRow['title']?>
                        <?}?>
                </p>
            </div>
            <div style="width:100%; border:1px solid #000;">
                <p >پس از بررسی و گشایش پاکات واصله، پاکات قیمت پیشنهادی مفتوح که نتیجه حاصله از بررسی و گشایش پیشنهاد قیمت شرکت کنندگان به شرح ذیل می باشد:</p>
            </div>
            <div style="width:100%; border:1px solid #000;text-align: right;">در نتیجه پس از بررسی و ارزیابی انجامی، پیشنهاد شرکت <?=$param['trade']['winner']['data']['title']?> با مبلغ <?=$param['trade']['winner']['data']['cost']?> ریال <label style="font-weight: bold;">حائز حداقل بها </label> و به عنوان <label style="font-weight: bold;">برنده استعلام بها</label>اعلام میگردد.</div>
            <div style="font-weight: bold;border:1px solid #000;">
                <table cellspacing="30">
                    <tr>
                        <td width="33%">امان اله ذبیحی (مامور خرید)</td>
                        <td width="33%">قاسم طاهری (سرپرست اداره خریدهای داخلی)</td>
                        <td width="33%">صادق کبیریان (مدیر امور مالی و ذیحسابی)</td>
                    </tr>
                    <tr>
                        <td width="33%">بهیار ابراهیمی (مدیر امور تدارکات)</td>
                        <td width="33%">علی رحمانی (معاون مالی و پشتیبانی)</td>
                        <td width="33%">مهدی متقی مجد (معاون برنامه و مهندسی)</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center;">قاسم شهابی (رئیس هیئت مدیره و مدیر عامل)</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>  