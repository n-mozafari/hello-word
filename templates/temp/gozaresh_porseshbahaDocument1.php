<?
$pishnahad_dahandegan = $param['trade']['girandegan_pishnahadat']['data']; 
$pishnadatArr = array_chunk($pishnahad_dahandegan, 4);   
$ub = new businessUser();
$fb = new businessFlow();
$frm_cf = new facadeFrm_catalog();

$trade_subjectArr = $param['trade']['trade_subject']['data'];
if($param['trade']['generalInfo']['data']['regionId'] == 3)
{
    $userArr[0]['name'] = $param['trade']['generalInfo']['data']['userFullname'];
    $userArr[0]['semat'] = 'کارپرداز';
    $userArr[0]['id'] = $param['trade']['generalInfo']['data']['userId'];
    $userArr[0]['width'] = 15;

    $ub = new businessUser();

    $idArr = selectUsersByRole(3, 3, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
    $userId = isset($idArr[1]) ? $idArr[1] : 1;
    $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
    $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();

    $userArr[1]['name'] = $uRow->fname ." ".$uRow->lname;
    $userArr[1]['semat'] = 'رئیس کارپردازی';
    $userArr[1]['id'] = $userId;
    $userArr[1]['width'] = 23;



    $idArr = selectUsersByRole(3, 2, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
    $userId = isset($idArr[1]) ? $idArr[1] : 1;
    $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
    $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();


    $userArr[2]['name'] = $uRow->fname ." ".$uRow->lname;
    $userArr[2]['semat'] = 'مدیر امور تدارکات';
    $userArr[2]['id'] = $userId;
    $userArr[2]['width'] = 23;

    $idArr = selectUsersByRole(3, 9, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
    $userId = isset($idArr[1]) ? $idArr[1] : 1;
    $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
    $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();

    $userArr[3]['name'] = $uRow->fname ." ".$uRow->lname;
    $userArr[3]['semat'] = 'معاون مالی و پشتیبانی';
    $userArr[3]['id'] = 4;
    $userArr[3]['width'] = 24;

    $idArr = selectUsersByRole(3, 10, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
    $userId = isset($idArr[1]) ? $idArr[1] : 1;
    $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
    $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();

    $userArr[4]['name'] = $uRow->fname ." ".$uRow->lname;
    $userArr[4]['semat'] = 'مدیر عامل';
    $userArr[4]['id'] = 25;
    $userArr[4]['width'] = 15;
}
else
{
    $userArr[0]['name'] = $param['trade']['generalInfo']['data']['userFullname'];
    $userArr[0]['semat'] = 'کارپرداز';
    $userArr[0]['id'] = $param['trade']['generalInfo']['data']['userId'];
    $userArr[0]['width'] = 15;

    $idArr = selectUsersByRole(3, 14, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
    $userId = isset($idArr[1]) ? $idArr[1] : 1;
    $uResult = $ub->select("user.id = $userId", "", "" , "user.*", "user");
    $uRow = mysql_fetch_object($uResult);

    $userArr[1]['name'] = $uRow->fname ." ".$uRow->lname;
    $userArr[1]['semat'] = 'مدیر توزیع برق';
    $userArr[1]['id'] = 20;
    $userArr[1]['width'] = 23;

    $nextNode = $fb->makeNextFlowItemCombo('trade', $param['trade']['generalInfo']['data']['id'], 13, null, $needFlowItemType='1', 139);

    if($nextNode[0]['value'] == 146)
    {
        $idArr = selectUsersByRole(3, 2, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
        $userId = isset($idArr[1]) ? $idArr[1] : 1;
        $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
        $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();

        $userArr[2]['name'] = $uRow->fname ." ".$uRow->lname;;
        $userArr[2]['semat'] = 'مدیر امور تدارکات';
        $userArr[2]['id'] = 36;
        $userArr[2]['width'] = 23;

        $idArr = selectUsersByRole(3, 9, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
        $userId = isset($idArr[1]) ? $idArr[1] : 1;
        $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
        $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();

        $userArr[3]['name'] = $uRow->fname ." ".$uRow->lname;;
        $userArr[3]['semat'] = 'معاون مالی و پشتیبانی';
        $userArr[3]['id'] = 4;
        $userArr[3]['width'] = 23;

        $idArr = selectUsersByRole(3, 10, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
        $userId = isset($idArr[1]) ? $idArr[1] : 1;
        $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
        $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();

        $userArr[4]['name'] = $uRow->fname ." ".$uRow->lname;
        $userArr[4]['semat'] = 'مدیر عامل';
        $userArr[4]['id'] = 25;
        $userArr[4]['width'] = 23;
    }
    else if($nextNode[0]['value'] == 147)
    {
        $idArr = selectUsersByRole(3, 13, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
        $userId = isset($idArr[1]) ? $idArr[1] : 1;
        $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
        $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();

        $userArr[2]['name'] = $uRow->fname ." ".$uRow->lname;
        $userArr[2]['semat'] = 'رئیس گروه برونسپاری';
        $userArr[2]['id'] = 329;
        $userArr[2]['width'] = 23;

        $idArr = selectUsersByRole(3, 9, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
        $userId = isset($idArr[1]) ? $idArr[1] : 1;
        $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
        $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();

        $userArr[3]['name'] = $uRow->fname ." ".$uRow->lname;
        $userArr[3]['semat'] = 'معاون مالی و پشتیبانی';
        $userArr[3]['id'] = 4;
        $userArr[3]['width'] = 23;

        $idArr = selectUsersByRole(3, 10, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
        $userId = isset($idArr[1]) ? $idArr[1] : 1;
        $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
        $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();


        $userArr[4]['name'] = $uRow->fname ." ".$uRow->lname;
        $userArr[4]['semat'] = 'مدیر عامل';
        $userArr[4]['id'] = 25;
        $userArr[4]['width'] = 23;
    }
}

$rb = new businessRegion();  
$rRow = $rb->getRow($param['trade']['generalInfo']['data']['regionId']);
$options['orientation']='L';
$param['address'] = $rRow->address. ' کدپستی '.$rRow->postalCode;  
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
    <?
    $count = count($pishnadatArr);   
    $page_counter = 0;
    $aghlamShowInSooratjalase = $frm_cf->getField_dbValueForObject('trade', $param['trade']['generalInfo']['data']['id'], 'aghlamShowInSooratjalase');

    if($aghlamShowInSooratjalase == 1)
    {
        foreach($pishnadatArr as $receivers)
        {   $page_counter++;
            ?>
            <div style="margin-bottom: 10px;">اینجانب <?=$param['trade']['generalInfo']['data']['userFullname']?> در مورد درخواست شماره <?=$param['trade']['generalInfo']['data']['code']?> با موضوع <?=$param['trade']['generalInfo']['data']['title']?> در تاریخ <?=str_replace("-", "/", $param['formValue']['goshayesh_date'])?> به <?=count($pishnahad_dahandegan)?> نفر از فروشندگان طبق برگ پرسش بها مراجعه و نتیجه به شرح جدول زیر است.</div>
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
                        <td style="text-align: center; border:1px solid #000;">قیمت پیشنهادی</td>
                        <?}?>
                </tr>
                
                <?foreach($trade_subjectArr as $tsId=>$trade_subject)
                {
                    
                }?>
            </table>
            <?
        }
    }
    foreach($pishnadatArr as $receivers)
    {   $page_counter++;
        ?>
        <div style="margin-bottom: 10px;">اینجانب <?=$param['trade']['generalInfo']['data']['userFullname']?> در مورد درخواست شماره <?=$param['trade']['generalInfo']['data']['code']?> با موضوع <?=$param['trade']['generalInfo']['data']['title']?> در تاریخ <?=str_replace("-", "/", $param['formValue']['goshayesh_date'])?> به <?=count($pishnahad_dahandegan)?> نفر از فروشندگان طبق برگ پرسش بها مراجعه و نتیجه به شرح جدول زیر است.</div>
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
                            $requestItem = $param['trade']['generalInfo']['data']['requestItem'];
                            $condition = ($requestItem == '2' || $requestItem == '3') && $param['trade']['specInfo']['data']['pishnahad_type'] == 2;
                            if(!$condition)
                            {
                                ?>
                                <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId][$tfiId]['mavad_basePrice']) : ''?></td>
                                <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId][$tfiId]['dastmozd_basePrice']) : ''?></td>
                                <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId][$tfiId]['totalCost']) : ''?></td>
                                <?
                            }
                            else
                            {    ?>
                                <td style="text-align: center; border:1px solid #000;"><?=number_format($tfiArr[$tfiId]['basePrice'])?></td>
                                <td style="text-align: center; border:1px solid #000;"><?=number_format($tfiArr[$tfiId]['var1'])?></td>
                                <td style="text-align: center; border:1px solid #000;"><?=number_format($tfiArr[$tfiId]['totalCost'])?></td>

                                <?}
                        }?>
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

                    $totalCost_str = '';
                    $plus_str = '';
                    if($receiver['taeidType'] == '0')
                    {
                        $totalCost_str = number_format($tfpArr[$esId]['sum_totalCost']);
                        $plus_str = $tfpArr[$esId]['sum_totalCost'] / $param['trade']['generalInfo']['data']['baravard'];
                    }
                    else if($receiver['taeidType'] == '1')
                    {
                        $totalCost_str = 'رد شده است.';
                    }
                    else if($receiver['taeidType'] == '2')
                    {
                        $totalCost_str = 'انصراف داده است.';
                    }

                    ?>
                    <td style="text-align: center; border:1px solid #000;" colspan="3"><?=isset($tfpArr[$esId]) && $tfpArr[$esId]['sum_totalCost'] ? $totalCost_str : ''?></td>
                    <?}?>
            </tr>
            <?$requestItem = $param['trade']['generalInfo']['data']['requestItem'];
            $condition = ($requestItem == '2' || $requestItem == '3') && $param['trade']['specInfo']['data']['pishnahad_type'] == 2;
            if(!$condition)
            { ?>
                <tr>
                    <td style="text-align: right; border:1px solid #000;">پلوس یا مینوس</td>
                    <?foreach($receivers as $receiver)
                    {   $esId = $receiver['id'];

                        $plus_str = '';
                        if($receiver['taeidType'] == '0')
                        {
                            $plus_str = round($tfpArr[$esId]['sum_totalCost'] / $param['trade']['generalInfo']['data']['baravard'], 2);
                        }

                        ?>
                        <td style="text-align: center; border:1px solid #000;" colspan="3"><?=$plus_str?></td>
                        <?}?>
                </tr>
                <?}?>
        </table>

        <div style="margin-top: 10px;">
            توضیحات: توضیح اینکه طی استعلامی که از <?=count($param['trade']['girandegan']['data'])?> شرکت جهت <?=$param['trade']['generalInfo']['data']['title']?> به عمل آمد، از <?=count($param['trade']['girandegan_enseraf']['data']) + count($param['trade']['girandegan_accept_pishnahadat']['data']) + count($param['trade']['girandegan_reject']['data'])?> جواب ارسالی شرکت <?=$param['trade']['winner']['data']['title']?> با پیشنهاد کمترین قیمت به مبلغ <?=number_format($param['trade']['winner']['data']['money'])?> ریال برنده استعلام گردیده است. لذا خواهشمند است دستورات لازم را جهت صدور مجوز خرید صادر فرمایید. 
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
                        <?if($param['trade']['generalInfo']['data']['regionId'] == 3)
                        {?>
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
                            <?}
                        else
                        {    ?>
                            <td>
                                <?=$user['semat']?>
                                <br>
                                <?=$user['name']?>
                                <br>
                                <?$team_confirm = $param['trade']['generalInfo']['data']['varchar1_1'];
                                $accept = $param['trade']['generalInfo']['data']['accept'];?>

                                <?if($team_confirm == 1 && $key < 2)
                                {?>
                                    <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                                    <?}
                                else if($team_confirm == 1 && $key == 2 && in_array($accept, array(146, 147, 148, 149, 140, 141, 142, 144)))
                                {?>
                                    <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                                    <?}
                                else if($team_confirm == 1 && $key == 3 && in_array($accept, array(148, 149, 140, 141, 142, 144)))
                                {?>
                                    <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                                    <?}
                                else if($team_confirm == 1 && $key == 4 && in_array($accept, array(149, 140, 141, 142, 144)))
                                {?>
                                    <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                                    <?}?>
                            </td>
                            <?  }
                    }?>
                </tr>
            </table>
        </div>
        <?
        if($page_counter < $count)
        {
            ?>
            <p style="page-break-after: always;"></p>
            <?
        }
    }
    ?>
</div>
