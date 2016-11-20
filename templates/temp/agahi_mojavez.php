<?$jdf = new jdf()?>
<br/><?
         $chap_aval_date = new DateTime($param['trade']['specInfo']['data']['chap_aval_date']);
         
         $chap_dovom_date = new DateTime($param['trade']['specInfo']['data']['chap_dovom_date']);
     ?>
<div style = "min-width:90%; width:90%; min-height:870px; direction: rtl; border:none; margin:20px auto 20px auto;">
    <table width="100%">
        <tr>
        <?$src = $type != 'word' ? "../../core/images/logo/document_logo.png" : 'http://192.168.10.111/core/images/logo/document_logo.png'?>
            <td align="center" width="33%"><img src="<?=$src?>" width="200px" alt="<?=$_SESSION['companyTitle']?>"></td>
            <td align="center" width="33%"><?=$_SESSION['companyTitle']?></td>
            <td align="center" width="33%">شماره : <?=$param['formValue']['number']?>
                <br>
                تاریخ: <?=str_replace('-','/',$param['formValue']['date'])?>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>امور محترم تداركات</td>
        </tr>
        <tr>
            <td>باسلام : در اجرای بند ب از ماده 13 آئين نامه معاملات شرکت که اعلام ميدارد " به اقتضای اهميت معامله آگهی از 2 تا 3 نوبت از طريق درج خلاصه فراخوان حداقل در يکی از روزنامه های کثير الانتشار کشوری يا استان مربوطه بايستی منتشر گردد . خواهشمنداست دستورفرمائيد درخصوص نحوه وشرايط اطلاع رسانی فراخوان مناقصه عمومی / مزايده عمومی شماره<?=$param['trade']['generalInfo']['data']['code']?> موضوع <?=$param['trade']['generalInfo']['data']['code']?> علاوه بر اطلاع رسانی از طريق شبکه اطلاع رسانی معاملات توانير وشرکت توزيع  به شرح پيشنهادات ذيل دستورات مقتضی صادر فرمائيد .</td>
        </tr>
        <tr><td>1- چاپ در روزنامه رسمی <input type="checkbox"> محلی <input type="checkbox"> برای  تعداد <?=$param['trade']['specInfo']['data']['tedad_nobat_chap']?> نوبت<? if($param['trade']['specInfo']['data']['tedad_nobat_chap']==2) {?> به فاصله <?=date_diff($chap_aval_date,$chap_dovom_date)->days?> روز<? }else {?> در تاریخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['chap_aval_date']))?><? }?>  دريکی از صفحات داخلی <input type="checkbox"> صفحه اول <input type="checkbox"></td></tr>
        <tr>
            <td>2- چاپ در روزنامه محلی <input type="checkbox"> صفحه اول <input type="checkbox"> صفحه داخلی <input type="checkbox"></td>
        </tr>
        <tr>
            <td>3- اطلاع رسانی از طريق نصب آگهی در پانل اعلانات ستاد وبرق اروميه<input type="checkbox"> معابر عمومی <input type="checkbox"> ارسال يک نسخه آگهی به اشخاص حقيقی وحقوقی <input type="checkbox"> الزامی است .</td>
        </tr>
        <tr>
            <td>4- اطلاع رسانی از طريق ساير رسانه های گروهی وارتباط جمعی مانند راديو وتلويزيون </td>
        </tr>
        <tr>
            <td>الزاميست <input type="checkbox"> الزامی نيست <input type="checkbox"></td>
        </tr>
        <tr>
            <td dir="ltr">مناقصات وقراردادها</td>
        </tr>
        <tr>
            <td><hr></td>
        </tr>
        <tr>
            <td>معاونت محترم مالی وپشتيبانی </td>
        </tr>
        <tr>
            <td>باسلام : احتراما" به منظور برگزاری مناقصه / مزايده عمومی فوق الاشاره به شرح پيشنهادات ارائه شده دستورات مقتضی صادر فرمايند .</td>
        </tr>
        <tr>
            <td dir="ltr"><span style="padding-left: 30px;"><?=$param['role']['generalInfo']['data'][2]['lname']?></span>
                <br>
                مدير امور تدارکات 
            </td>
        </tr>
        <tr>
            <td><hr></td>
        </tr>
        <tr>
            <td>امور محترم تدارکات </td>
        </tr>
        <tr>
            <td>باسلام : اقدام بلامانع است . </td>
        </tr>
        <tr>
            <td dir="ltr"><span style="padding-left: 30px;"><?=$param['role']['generalInfo']['data'][9]['lname']?></span>
                <br>
                معاون مالی وپشتيبانی
            </td>
        </tr>
        <tr>
            <td>اداره مناقصات وقراردادها</td>
        </tr>
        <tr>
            <td>باسلام : به شرح دستور اقدام نمايند .</td>
        </tr>
        <tr>
            <td dir="ltr"><span style="padding-left: 30px;"><?=$param['role']['generalInfo']['data'][2]['lname']?></span>
                <br>
                مدير امور تدارکات 
            </td>
        </tr>
    </table>
</div>  
