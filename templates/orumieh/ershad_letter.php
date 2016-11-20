<?$jdf = new jdf()?>
<br/>
<div style = "min-width:90%; width:90%; min-height:870px; direction: rtl; border:none; margin:20px auto 20px auto;">
    <table width="100%">
        <tr>
            <td align="center" width="33%"><img src="../../core/images/logo/document_logo.png" width="200px" alt="<?=$_SESSION['companyTitle']?>"></td>
            <td align="center" width="33%"><?=$_SESSION['companyTitle']?></td>
            <td align="center" width="33%">شماره :  <?=$param['formValue']['number']?>
                <br>
                تاریخ: <?=str_replace('-','/',$param['formValue']['date'])?>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>به: اداره كل محترم فرهنگ و ارشاد اسلامي استان آذربايجانغربي</td>
        </tr>
        <tr>
            <td>از: شركت توزيع نيروي برق آذربايجانغربي</td>
        </tr>
        <tr><td>چاپ آگهي</td></tr>

        <?
        $sliceDate = explode('-',$param['trade']['specInfo']['data']['chap_aval_date']);
        $chap_aval_day = $jdf->jdate('l',mktime(0,0,0,$sliceDate[1],$sliceDate[2],$sliceDate[0]));
        
        $sliceDate = explode('-',$param['trade']['specInfo']['data']['chap_dovom_date']);
        $chap_dovom_day = $jdf->jdate('l',mktime(0,0,0,$sliceDate[1],$sliceDate[2],$sliceDate[0]));
            
        ?>

        <tr>
            <td>باسلام: بپيوست يک برگ آگهي فراخوان مناقصه <?=$param['trade']['specInfo']['data']['bargozaryType']?> شماره <?=$param['trade']['generalInfo']['data']['code']?> موضوع <?=$param['trade']['generalInfo']['data']['title']?> ارسال ميگردد. خواهشمند است دستور فرمائيد نسبت به چاپ آگهي مذكور براي <?=$param['trade']['specInfo']['data']['tedad_nobat_chap']?> نوبت در يكي از روزنامه هاي کثيرالانتشار كشوري (با حداقل هزينه) روز <?=$chap_aval_day?> مورخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['chap_aval_date']))?><? if($param['trade']['specInfo']['data']['tedad_nobat_chap']>1) {?> و روز <?=$chap_dovom_day?> مورخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['chap_dovom_date']))?><? }?> (با آرم صنعت برق) در  يكي از صفحات داخلي نشريه هاي مربوطه اقدام نمايند.</td>
        </tr>
        <tr>
            <td>ضمنا نشريه هاي انتخاب شده جهت چاپ آگهی را طی شماره تلفن 33449002 داخلی 3343 و يا فاکس 33446155 جهت اقدامات بعدی به اين شرکت اعلام نمائيد.</td>
        </tr>
        <tr>
            <td dir="ltr" style="padding-left: 30px !important;"><?=$param['role']['generalInfo']['data'][9]['lname']?></td>
        </tr>
        <tr>
            <td dir="ltr">معاون مالی وپشتيبانی </td>
        </tr>
    </table>
</div>  