<?$jdf = new jdf();
$db = new businessDocuments();?>
<?

if($param['output_type'] == 2)
{
    //$jalaseDate = reverseText($jalaseDate);
    $other['type'] = 'clientSide';
}

$pishnahad_dahandegan = $param['trade']['girandegan_pishnahadat']['data'];
$pishnadatArr = array_chunk($pishnahad_dahandegan, 4);
$subject_girandegan_pishnahadatArr = $param['trade']['subject_girandegan_pishnahadat']['data'];

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
    $userArr[3]['id'] = $userId;
    $userArr[3]['width'] = 24;

    $idArr = selectUsersByRole(3, 10, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
    $userId = isset($idArr[1]) ? $idArr[1] : 1;
    $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
    $uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();

    $userArr[4]['name'] = $uRow->fname ." ".$uRow->lname;
    $userArr[4]['semat'] = 'مدیر عامل';
    $userArr[4]['id'] = $userId;
    $userArr[4]['width'] = 15;
}
/*else
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
$userArr[1]['id'] = $userId;
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
$userArr[3]['id'] = $userId;
$userArr[3]['width'] = 23;

$idArr = selectUsersByRole(3, 10, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
$userId = isset($idArr[1]) ? $idArr[1] : 1;
$uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
$uRow = mysql_num_rows($uResult) > 0 ? mysql_fetch_object($uResult) : new documents();

$userArr[4]['name'] = $uRow->fname ." ".$uRow->lname;
$userArr[4]['semat'] = 'مدیر عامل';
$userArr[4]['id'] = $userId;
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
}  */

$rob = new businessRole();
$roResult = $rob->select("systemKey='trs'");
$roleArr = array();
while($roRow = mysql_fetch_object($roResult))
{
    $roleArr[$roRow->id] = $roRow->title;
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

    $frm_cf = new facadeFrm_catalog();
    $aghlamShowInSooratjalase = $frm_cf->getField_dbValueForObject('trade', $param['trade']['generalInfo']['data']['id'], 'aghlamShowInSooratjalase');
    $tsArr = $param['trade']['trade_subject']['data'];  
    $tsfArr = $param['trade']['trade_subject_fehrestbaha']['data'];

    if($aghlamShowInSooratjalase == 2)
    { 
        foreach($tsArr as $tsId=>$tsRow)
        {

            $tfpArr = isset($param['trade']['fehrestbaha_pishnahadat']['data'][$tsId]) ? $param['trade']['fehrestbaha_pishnahadat']['data'][$tsId] : array();   
            $tfiArr = $param['trade']['aghlam']['data'][$tsId]; 
            $spgArr = $subject_girandegan_pishnahadatArr[$tsId];  
            $count = count($pishnadatArr);   
            $page_counter = 0;

            foreach($pishnadatArr as $receivers)
            {   $page_counter++;
                ?>
                <div style="margin-bottom: 10px;">اینجانب <?=$param['trade']['generalInfo']['data']['userFullname']?> در مورد درخواست شماره <?=$param['trade']['generalInfo']['data']['code']?> با موضوع <?=$param['trade']['generalInfo']['data']['title']?> در تاریخ <?=$jdf->jdate('Y-m-d')?> به <?=count($pishnahad_dahandegan)?> نفر از فروشندگان طبق برگ پرسش بها مراجعه و نتیجه به شرح جدول زیر است.</div>

                <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td></td>
                        <td></td>
                        <?
                        foreach($receivers as $receiver)
                        {?>
                            <td style="text-align: center; border:1px solid #000;" colspan="3"><?=$receiver['title']?></td>
                            <?}?>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #000; text-align: right;">شرح کالا/خدمات</td>
                        <td style="border:1px solid #000; text-align: right;">تعداد</td>
                        <?foreach($receivers as $receiver)
                        {?>
                            <td style="text-align: center; border:1px solid #000;">قیمت مواد</td>
                            <td style="text-align: center; border:1px solid #000;">قیمت دستمزد</td>
                            <td style="text-align: center; border:1px solid #000;">قیمت کل</td>

                            <?}?>

                    </tr>
                    <?

                    if(count($tfiArr)>0)
                    { 
                        $counter = 0;
                        foreach($tfiArr as $value)
                        {
                            $counter++;
                            ?>
                            <tr>
                                <td style="text-align: right; border:1px solid #000;"><?=$value['title'] . ' ' . $value['code']?></td>
                                <td style="text-align: right; border:1px solid #000;"><?=$value['quantity']?></td>

                                <?foreach($receivers as $receiver)
                                {
                                    $esId = $receiver['id'];
                                    $tfiId = $value['tsfId'];

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
                        <td style="text-align: right; border:1px solid #000;" colspan="2">جمع</td>
                        <?foreach($receivers as $receiver)
                        {   $esId = $receiver['id'];
                            ?>
                            <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId]['sum_mavad_basePrice']) : ''?></td>
                            <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId]['sum_dastmozd_basePrice']) : ''?></td>
                            <td style="text-align: center; border:1px solid #000;"><?=isset($tfpArr[$esId]) ? number_format($tfpArr[$esId]['sum_totalCost']) : ''?></td>
                            <?}?>
                    </tr>
                    <tr>
                        <td style="text-align: right; border:1px solid #000;" colspan="2">جمع کل</td>
                        <?

                        foreach($receivers as $receiver)
                        {   
                            $esId = $receiver['id'];
                            $sgpRow = $spgArr[$esId]; 
                            $totalCost_str = '';
                            if($sgpRow['taeidType'] == '0')
                            {
                                $totalCost_str = number_format($sgpRow['cost']);
                            }
                            else if($sgpRow['taeidType'] == '1')
                            {
                                $totalCost_str = 'رد شده است.';
                            }
                            else if($sgpRow['taeidType'] == '2')
                            {
                                $totalCost_str = 'انصراف داده است.';
                            }

                            ?>
                            <td style="text-align: center; border:1px solid #000;" colspan="3"><?=$totalCost_str?></td>
                            <?}?>
                    </tr>
                </table>
                <div style="margin-top: 10px;">
                    توضیحات: توضیح اینکه طی استعلامی که از <?=count($param['trade']['girandegan']['data'])?> شرکت جهت <?=''?> به عمل آمد، از <?=count($param['trade']['girandegan_enseraf']['data']) + count($param['trade']['girandegan_accept_pishnahadat']['data']) + count($param['trade']['girandegan_reject']['data'])?> جواب ارسالی شرکت <?=$param['trade']['winner']['data'][$tsId]['title']?> با پیشنهاد کمترین قیمت به مبلغ <?=$param['trade']['winner']['data'][$tsId]['money']?> ریال برنده استعلام گردیده است. لذا خواهشمند است دستورات لازم را جهت صدور مجوز خرید صادر فرمایید. 
                </div>

                <?if(isset($param['trade']['winner']['data'][$tsId]['description']) && $param['trade']['winner']['data'][$tsId]['description'] != '')
                {?>
                    <div style="margin-top: 10px;">
                        گزارش توجیهی : <?=$param['trade']['winner']['data'][$tsId]['description']?>
                    </div>
                    <?}?>
                 <div style="bottom: 20px;  width:95%; ">
                <table width="95%">
                    <tr>
                        <?
                        if($param['trade']['generalInfo']['data']['regionId'] == 3)
                        {  
                            $ub = new businessUser();
                            foreach($userArr as $key=>$user)
                            {
                                $uResult = $ub->select("user.id = ".$user['id']);
                                $uRow = mysql_fetch_object($uResult);
                                //$width = $userArr[$key]['width'];
                                ?>
                                <td>
                                    <?=$user['semat']?>
                                    <br>
                                    <?=$user['name']?>
                                    <br>
                                    <?if($param['trade']['generalInfo']['data']['varchar1_1'] == 1 && $key <= 2)
                                    {
                                        echo $db->getImageTag($uRow->fileEmza, '', 100, 0, 0, $other);
                                    }
                                    else if($param['trade']['generalInfo']['data']['varchar1_1'] == 1 && $key == 3 && $param['trade']['generalInfo']['data']['accept'] > 100)
                                    {
                                        echo$db->getImageTag($uRow->fileEmza, '', 100, 0, 0, $other);
                                    }
                                    else if($param['trade']['generalInfo']['data']['varchar1_1'] == 1 && $key > 2 && $param['trade']['generalInfo']['data']['accept'] > 101)
                                    {
                                        echo$db->getImageTag($uRow->fileEmza, '', 100, 0, 0, $other);
                                    }?>
                                </td>
                                <?}
                        }
                        else
                        {
                            $trade_accept = $param['trade']['accept']['data']['allAccept'];
                            //var_dump($trade_accept);
                            unset($trade_accept[134]);
                            unset($trade_accept[137]);
                            //var_dump($trade_accept);
                            foreach($trade_accept as $fiId=>$subArr)
                            {
                                foreach($subArr as $value)
                                {

                                    $uResult = $ub->select("user.id = ".$value->userId);
                                    $uRow = mysql_fetch_object($uResult);
                                    ?>
                                    <td>
                                        <?=$roleArr[$value->roleId]?>
                                        <br>
                                        <?=$value->userFullname?>
                                        <br>
                                        <?=$db->getImageTag($uRow->fileEmza, '', 100, 0, 0, $other)?>
                                    </td>
                                    <?
                                }
                            }

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
        }
    }
    else
    {


        $count = count($pishnadatArr);   
        $page_counter = 0;

        foreach($pishnadatArr as $receivers)
        {   $page_counter++;
            ?>
            <div style="margin-bottom: 10px;">اینجانب <?=$param['trade']['generalInfo']['data']['userFullname']?> در مورد درخواست شماره <?=$param['trade']['generalInfo']['data']['code']?> با موضوع <?=$param['trade']['generalInfo']['data']['title']?> در تاریخ <?=$jdf->jdate('Y-m-d')?> به <?=count($pishnahad_dahandegan)?> نفر از فروشندگان طبق برگ پرسش بها مراجعه و نتیجه به شرح جدول زیر است.</div>

            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td></td>
                    <?
                    foreach($receivers as $receiver)
                    {?>
                        <td style="text-align: center; border:1px solid #000;"><?=$receiver['title']?></td>
                        <?}?>
                </tr>
                <tr>
                    <td style="border:1px solid #000; text-align: right;" width="40%">شرح کالا/خدمات</td>
                    <?foreach($receivers as $receiver)
                    {?>
                        <td style="text-align: center; border:1px solid #000;">قیمت کل</td>
                        <?}?>
                </tr>
                <?
                //$tfpArr = $param['trade']['fehrestbaha_pishnahadat']['data'][$tsId];   
                //$tfiArr = $param['trade']['aghlam']['data'][$tsId]; 

                if(count($tsArr)>0)
                { 
                    $counter = 0;
                    foreach($tsArr as $tsId=>$value)
                    {
                        $spgArr = $subject_girandegan_pishnahadatArr[$tsId];
                        $winner = $param['trade']['winner']['data'][$tsId];
                        $counter++;
                        ?>
                        <tr>
                            <td style="text-align: right; border:1px solid #000;"><?=$value['title']?></td>

                            <?foreach($receivers as $receiver)
                            {
                                $esId = $receiver['id'];
                                $sgpRow = $spgArr[$esId];

                                if($sgpRow['taeidType'] == '0')
                                {
                                    $totalCost_str = number_format($sgpRow['cost']);
                                }
                                else if($sgpRow['taeidType'] == '1')
                                {
                                    $totalCost_str = 'رد شده است.';
                                }
                                else if($sgpRow['taeidType'] == '2')
                                {
                                    $totalCost_str = 'انصراف داده است.';
                                }
                                //$tfiId = $value['id'];
                                ?>
                                <td style="text-align: center; border:1px solid #000;"><?=$totalCost_str?></td>
                                <?}?>
                        </tr>
                        <tr>
                            <td style="text-align: right; border:1px solid #000;">نتیجه نهایی</td>
                            <?foreach($receivers as $receiver)
                            {  
                                $esId = $receiver['id'];
                                $sgpRow = $spgArr[$esId]; 
                                $totalCost_str = '';
                                if($sgpRow['taeidType'] == '0')
                                {
                                    $totalCost_str = number_format($sgpRow['cost']);
                                }
                                else if($sgpRow['taeidType'] == '1')
                                {
                                    $totalCost_str = 'رد شده است.';
                                }
                                else if($sgpRow['taeidType'] == '2')
                                {
                                    $totalCost_str = 'انصراف داده است.';
                                }

                                ?>
                                <td style="text-align: center; border:1px solid #000;"><?=$totalCost_str?></td>
                                <?}
                            ?>
                        </tr>
                        <tr>
                            <td style="text-align: right; border:1px solid #000;" colspan="<?=(count($receivers) + 1)?>">شرکت <?=$winner['title']?> با مبلغ پیشنهادی <?=number_format($winner['money'])?> ریال  به عنوان برنده موضوع شناخته شده است.</td>
                        </tr>
                        <?if(isset($param['trade']['winner']['data'][$tsId]['description']) && $param['trade']['winner']['data'][$tsId]['description'] != '')
                        {?>
                            <tr>
                                <td>
                                    گزارش توجیهی : <?=$param['trade']['winner']['data'][$tsId]['description']?>
                                </td>
                            </tr>
                            <?}?>
                        <?
                    }
                }?>


            </table>


            <div style="bottom: 20px;  width:95%; ">
                <table width="95%">
                    <tr>
                        <?
                        if($param['trade']['generalInfo']['data']['regionId'] == 3)
                        {  
                            $ub = new businessUser();
                            foreach($userArr as $key=>$user)
                            {
                                $uResult = $ub->select("user.id = ".$user['id']);
                                $uRow = mysql_fetch_object($uResult);
                                //$width = $userArr[$key]['width'];
                                ?>
                                <td>
                                    <?=$user['semat']?>
                                    <br>
                                    <?=$user['name']?>
                                    <br>
                                    <?if($param['trade']['generalInfo']['data']['varchar1_1'] == 1 && $key <= 2)
                                    {
                                        $db->getImageTag($uRow->fileEmza, '', 100, 0, 0, $other);
                                    }
                                    else if($param['trade']['generalInfo']['data']['varchar1_1'] == 1 && $key == 3 && $param['trade']['generalInfo']['data']['accept'] > 100)
                                    {
                                        $db->getImageTag($uRow->fileEmza, '', 100, 0, 0, $other);
                                    }
                                    else if($param['trade']['generalInfo']['data']['varchar1_1'] == 1 && $key > 2 && $param['trade']['generalInfo']['data']['accept'] > 101)
                                    {
                                        $db->getImageTag($uRow->fileEmza, '', 100, 0, 0, $other);
                                    }?>
                                </td>
                                <?}
                        }
                        else
                        {
                            $trade_accept = $param['trade']['accept']['data']['allAccept'];

                            unset($trade_accept[134]);
                            unset($trade_accept[137]);

                            foreach($trade_accept as $fiId=>$subArr)
                            {
                                foreach($subArr as $value)
                                {

                                    $uResult = $ub->select("user.id = ".$value->userId);
                                    $uRow = mysql_fetch_object($uResult);
                                    ?>
                                    <td>
                                        <?=$roleArr[$value->roleId]?>
                                        <br>
                                        <?=$value->userFullname?>
                                        <br>
                                        <?=$db->getImageTag($uRow->fileEmza, '', 100, 0, 0, $other)?>
                                    </td>
                                    <?
                                }
                            }

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

    } 
    ?>
</div>
