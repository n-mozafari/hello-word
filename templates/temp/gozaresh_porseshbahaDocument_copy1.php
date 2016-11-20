<?
$receivers = $param['trade']['girandegan_pishnahadat']['data'];

$userArr[0]['name'] = $param['trade']['generalInfo']['data']['userFullname'];
$userArr[0]['semat'] = 'کارپرداز';
$userArr[0]['id'] = $param['trade']['generalInfo']['data']['userId'];
$userArr[0]['width'] = 15;

$userArr[1]['name'] = 'جعفر الماسی';
$userArr[1]['semat'] = 'رئیس کارپردازی';
$userArr[1]['id'] = 20;
$userArr[1]['width'] = 23;

$userArr[2]['name'] = 'عزیز امینی';
$userArr[2]['semat'] = 'مدیر امور تدارکات';
$userArr[2]['id'] = 36;
$userArr[2]['width'] = 23;

$userArr[3]['name'] = 'سعید عظیمی';
$userArr[3]['semat'] = 'معاون مالی و پشتیبانی';
$userArr[3]['id'] = 4;
$userArr[3]['width'] = 24;

$userArr[4]['name'] = 'حمید کاظمی کیا';
$userArr[4]['semat'] = 'مدیر عامل';
$userArr[4]['id'] = 25;
$userArr[4]['width'] = 15;

$options['orientation']='L';
?>
<div style="min-width:100%; width:100%; min-height:700px; direction: rtl; font-size: 12px;">
    <table width="100%">
        <tr>
            <td width="33%" align="center"><img src="../../core/images/logo/document_logo.png" width="100px" alt="<?=$_SESSION['companyTitle']?>"></td>
            <td width="33%" align="center"><?=$_SESSION['companyTitle']?></td>
            <td width="33%" align="center">نام واحد : کارپردازی
                <br>
                تاریخ تنظیم:
            </td>
        </tr>
    </table>
    <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:15px; font-weight: bold;">فرم گزارش پرسش بهاو اعلام نتیجه مقایسه قیمت ها</div>
    <div style="margin-bottom: 10px;">اینجانب <?=$param['trade']['generalInfo']['data']['userFullname']?> در مورد درخواست شماره <?=$param['trade']['generalInfo']['data']['code']?> با موضوع <?=$param['trade']['generalInfo']['data']['title']?> در تاریخ <?=''?> به <?=count($param['trade']['girandegan']['data'])?> نفر از فروشندگان طبق برگ پرسش بها مراجعه و نتیجه به شرح جدول زیر است.</div>
    <table cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td></td>
            <?
            foreach($receivers as $receiver)
            {?>
                <td style="text-align: center; border:1px solid #000;" colspan="3"><?=$receiver['title']?></td>
                <?}?>
        </tr>
        <tr>
            <td style="border:1px solid #000; text-align: right;">شرح کالا/خدمات</td>
            <?foreach($receivers as $receiver)
            {?>
                <td style="text-align: center; border:1px solid #000;">قیمت مواد</td>
                <td style="text-align: center; border:1px solid #000;">قیمت دستمزد</td>
                <td style="text-align: center; border:1px solid #000;">قیمت کل</td>
                <?}?>
        </tr>
        <?
        $tfpArr = $param['trade']['fehrestbaha_pishnahadat']['data'];   
        $tfiArr = $param['trade']['aghlam']['data'];                    
        if(count($tfiArr)>0)
        { 
            $counter = 0;
            foreach($tfiArr as $value)
            {
                $counter++;
                ?>
                <tr>
                    <td style="text-align: right; border:1px solid #000;"><?=$value['title'] . ' ' . $value['code']?></td>

                    <?foreach($receivers as $receiver)
                    {
                        $esId = $receiver['id'];
                        $tfiId = $value['id'];
                        ?>
                        <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId][$tfiId]['mavad_basePrice']) : ''?></td>
                        <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId][$tfiId]['dastmozd_basePrice']) : ''?></td>
                        <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId][$tfiId]['totalCost']) : ''?></td>
                        <?}?>
                </tr>
                <?
            }
        }?>
        <tr>
        <td style="text-align: right; border:1px solid #000;">جمع</td>
        <?foreach($receivers as $receiver)
            {   $esId = $receiver['id'];
                ?>
                <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId]['sum_mavad_basePrice']) : ''?></td>
                <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId]['sum_dastmozd_basePrice']) : ''?></td>
                <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId]['sum_totalCost']) : ''?></td>
                <?}?>
        </tr>
        <tr>
        <td style="text-align: right; border:1px solid #000;">جمع کل</td>
        <?foreach($receivers as $receiver)
            {   $esId = $receiver['id'];
                ?>
                <td style="text-align: center; border:1px solid #000;" colspan="3"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId]['sum_totalCost']) : ''?></td>
                <?}?>
        </tr>
    </table>

    <div style="margin-top: 10px;">
        توضیحات: توضیح اینکه طی استعلامی که از <?=count($param['trade']['girandegan']['data'])?> شرکت جهت <?=''?> به عمل آمد، از <?=count($param['trade']['girandegan_enseraf']['data']) + count($param['trade']['girandegan_accept_pishnahadat']['data']) + count($param['trade']['girandegan_reject']['data'])?> جواب ارسالی شرکت <?=$param['trade']['winner']['data']['title']?> با پیشنهاد کمترین قیمت به مبلغ <?=$param['trade']['winner']['data']['money']?> ریال برنده استعلام گردیده است. لذا خواهشمند است دستورات لازم را جهت صدور مجوز خرید صادر فرمایید. 
    </div>
    <?if(isset($param['trade']['winner']['data']['description']) && $param['trade']['winner']['data']['description'] != '')
    {?>
    <div style="margin-top: 10px;">
        گزارش توجیهی : <?=$param['trade']['winner']['data']['description']?>
    </div>
    <?}?>
    <div style="bottom: 20px;  width:95%; ">
        <table width="95%">
            <tr>
                <?  
                $ub = new businessUser();
                foreach($userArr as $key=>$user)
                {
                    $uResult = $ub->select("user.id = ".$user['id']." and user.fileEmza = documents.id", "", "" , "documents.address", "user, documents");
                    $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();
                    $width = $userArr[$key]['width'];
                    ?>
                    <td>
                        <?=$user['semat']?>
                        <br>
                        <?=$user['name']?>
                        <br>
                        <?if($param['trade']['generalInfo']['data']['varchar1_1'] == 1 && $key <= 2)
                        {?>
                            <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                            <?}
                        else if($param['trade']['generalInfo']['data']['varchar1_1'] == 1 && $key == 3 && $param['trade']['generalInfo']['data']['accept'] > 100)
                        {?>
                            <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                            <?}
                        else if($param['trade']['generalInfo']['data']['varchar1_1'] == 1 && $key > 2 && $param['trade']['generalInfo']['data']['accept'] > 101)
                        {?>
                            <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                            <?}?>
                    </td>
                    <?}?>
            </tr>
        </table>
    </div>
</div>
