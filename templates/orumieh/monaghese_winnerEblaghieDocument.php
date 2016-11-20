<?$jdf = new jdf()?>
<br/>
<? 
$rb = new businessRegion();  
$rRow = $rb->getRow($param['trade']['generalInfo']['data']['regionId']);
$options['orientation']='P';
$param['address'] = $rRow->address. ' کدپستی '.$rRow->postalCode; 
$frm_cf = new facadeFrm_catalog();
$aghlamShowInSooratjalase = $frm_cf->getField_dbValueForObject('trade', $param['trade']['generalInfo']['data']['id'], 'aghlamShowInSooratjalase');

?>
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto; font-size: 12px;">
<table width="100%">
    <tr>
        <td align="center" width="33%"><img src="../../core/images/logo/document_logo.png" width="100px" alt="<?=$_SESSION['companyTitle']?>"></td>
        <td align="center" width="33%"><?=$_SESSION['companyTitle']?></td>
        <td align="center" width="33%">
            شماره :
            <br>
            تاریخ:
        </td>
    </tr>
</table>
<?$esb = new businessEstelambank();  
$esId1 = $param['trade_subject']['winner']['data']['estelambankId']; 
$esRow1 = $esb->getRow("'$esId1'"); 
$title = 'فروشنده محترم ';
if($esRow1->type == '0')
{
    $title = 'شرکت محترم ';
}

if($param['trade']['generalInfo']['data']['requestItem'] != 1 && $esRow1->type == '1')
{
    $title = 'پیمانکار محترم';
}
if($param['trade']['generalInfo']['data']['requestItem'] == 1)
{
    $tahvil = $param['trade']['specInfo']['data']['tahvilKalaModat'];
    $text = "اقلام موضوع استعلام بها را به ". $param['trade']['specInfo']['data']['tahvilKalaPlace'] ." تلفن <span dir=\"ltr\">" .$param['trade']['specInfo']['data']['tahvilKalaPlaceTel'] . "</span>".' ارسال نمایید.';

}
else
{
    $tahvil = $param['trade']['specInfo']['data']['tahvilKhadamatModat'];
    $text = "نسبت به انجام تعهدات موضوع استعلام بها اقدام نمایید.";
}
?> 
<table>
    <tr>
        <td><?=$title?> <?=$param['trade_subject']['winner']['data']['title']?></td>
    </tr>
    <tr>
        <td>ابلاغ برنده درمناقصه  <?=$param['trade']['generalInfo']['data']['title']?></td>
    </tr>
    <tr><td>باسلام: در اجرای مناقصه <?=''?> <?=''?> شماره  <?=$param['trade']['generalInfo']['data']['code']?> مورخه <?=''?> ( موضوع <?=$param['trade']['generalInfo']['data']['title']?> ) نظر به اينکه آن شرکت با پيشنهاد مبلغ كل  <?=convertEnNum2FaNum(number_format($param['trade_subject']['winner']['data']['money']))?> ( <?=numToString($param['trade_subject']['winner']['data']['money'])?>) 
        ريال بشرح مندرج در جدول ذيل بعنوان برنده مناقصه شناخته شده است، لذا خواهشمند است دستور فرمائيد ظرف مدت <?=$param['trade']['specInfo']['data']['hosnAnjamTaahodatMohlat']?> از تاريخ ابلاغ اين نامه با بهمراه داشتن تضمين حسن انجام تعهدات به ميزان <?= $param['trade']['specInfo']['data']['hosnAnjamTaahodatAmount']?> درصد مبلغ کل پيشنهادی (بصورت ضمانتنامه بانکی قابل قبول کارفرما و يا واريز وجه نقد به حساب اين شرکت) به مبلغ <?=$param['trade']['specInfo']['data']['hosnAnjamTaahodatAmount'] * $param['trade_subject']['winner']['data']['money']?> <?=numToString($param['trade']['specInfo']['data']['hosnAnjamTaahodatAmount'] * $param['trade_subject']['winner']['data']['money'])?> ريال و با هماهنگی قبلی جهت عقد قرارداد به اداره مناقصات و قراردادهاي اين شرکت مراجعه نمايند.</td></tr>
</table>
<?if($aghlamShowInSooratjalase == 2)
{?>
    <table cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td style="border:solid 1px #000; text-align: center;">ردیف</td>
            <td style="border:solid 1px #000; text-align: center;">کد کالا/خدمات</td>
            <td style="border:solid 1px #000; text-align: center;">شرح کالا/خدمات</td>
            <td style="border:solid 1px #000; text-align: center;">تعداد</td>
            <td style="border:solid 1px #000; text-align: center;">بهای واحد پیشنهادی</td>
            <td style="border:solid 1px #000; text-align: center;">هزینه نصب و دستمزد</td>
            <td style="border:solid 1px #000; text-align: center;">هزینه کل</td>
        </tr>
        <?
        $tfiArr = $param['trade_subject']['winner_pishnahadat']['data'];  
        if(count($tfiArr)>0)
        { 
            $counter = 0;
            foreach($tfiArr as $value)
            {
                $counter++;
                ?>
                <tr>
                    <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum($counter)?></td>
                    <td style="border:solid 1px #000; text-align: center;"><?=$value['code']?></td>
                    <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum($value['title'])?></td>
                    <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum($value['quantity'])?></td>
                    <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum(number_format($value['mavad_basePrice']))?></td>
                    <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum(number_format($value['dastmozd_basePrice']))?></td>
                    <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum(number_format($value['totalCost']))?></td>
                </tr>
                <?
            }
        }
        else
            echo '<tr><td colspan=7 style="border:solid 1px;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
        ?>
        <tr>
            <td colspan="7" align="right">
                جمع کل : <?=convertEnNum2FaNum(number_format($param['trade_subject']['winner']['data']['money']))?> ریال
                <br>
                <?=convertEnNum2FaNum($param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100)?> درصد عوارض و مالیات بر ارزش افزوده : <?=convertEnNum2FaNum(number_format($param['trade_subject']['winner']['data']['money'] * $param['trade']['generalInfo']['data']['arzeshAfzoode_total']))?> ریال
                <br>
                مبلغ کل با احتساب <?=convertEnNum2FaNum($param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100)?> درصد : <?=convertEnNum2FaNum(number_format(($param['trade']['generalInfo']['data']['arzeshAfzoode_total'] + 1) * $param['trade_subject']['winner']['data']['money']))?> ریال
            </td>
        </tr>
    </table>
    <?}
else
{
    ?>
    <table cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td style="border:solid 1px #000; text-align: center;">ردیف</td>
            <td style="border:solid 1px #000; text-align: center;">شرح کالا/خدمات</td>
            <td style="border:solid 1px #000; text-align: center;">بهای کل پیشنهادی</td>
        </tr>
        <tr>
            <td style="border:solid 1px #000; text-align: center;">1</td>
            <td style="border:solid 1px #000; text-align: center;"><?=$param['trade_subject']['generalInfo']['data']['title']?></td>
            <td style="border:solid 1px #000; text-align: center;"><?=number_format($param['trade_subject']['winner']['data']['money'])?></td>
        </tr>
    </table>
    <?
}?>
<table width="100%">
    <tr>
        <td width="75%"></td>
        <?
        $ub = new businessUser();

        $idArr = selectUsersByRole(3, 9, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
        $userId = isset($idArr[1]) ? $idArr[1] : 1;
        $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
        $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();


        ?>
        <td><?=$uRow->fname .' '.$uRow->lname?><br>
            <br>
            معاون مالی و پشتیبانی
            <br>
            <?if($param['trade']['generalInfo']['data']['accept'] == 105)
            {

                ?>
                <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                <?} ?>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td>رونوشت به :</td>
    </tr>
    <tr>
        <td>-    امورتدارکات جهت پیگیری </td>
    </tr>
</table>
