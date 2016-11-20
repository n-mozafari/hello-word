<? 

$jdf = new jdf();
$khrrtb = new businessKharid_request_requesttype();
$khrtb = new businessKharid_request_type();?>
<?php
//$wb = new businessWiner();
$tb = new businessTrade();
$fhb = new businessFlow_history();
$fiab = new businessFlowitem_acceptor();    
$tRow = $tb->getRow($param['trade']['generalInfo']['data']['id']); 
$ub = new businessUser();
$db = new businessDocuments();
$tf = new facadeFrm_tables();
$user_postArr = array(); 
mysql_select_db('core');
$query = "select user_system.idOnSystem, organization_posts.title from user_organization_posts, organization_posts, user, user_system where user_organization_posts.organization_postsId = organization_posts.id and user_organization_posts.userId = user.id and user.id = user_system.userId and user_system.systemId = 10";
$result = mysql_query($query);
mysql_select_db('trs');
while($row = mysql_fetch_object($result))
{
    $user_postArr[$row->idOnSystem] = $row->title;
}

$param['trade']['kharid_request_emza']['data'] = array();

if($tRow->sourceTableName == 'kharid_request')
{  
    $khrrtb = new businessKharid_request_requesttype();

    $khrrtResult = $khrrtb->select("kharid_requestId = $tRow->sourceTableId");
    $khrrtArr = array();
    $needLast_emza = false;
    $sarfaslCheck = true;

    while($khrrtRow = mysql_fetch_object($khrrtResult))
    {   
        $khrt_p1Row = $khrtb->getRow($khrrtRow->kharid_requesttypeId);
        $khrt_p2Row = $khrtb->getRow($khrt_p1Row->parentId);
        // var_dump($khrt_p1Row);
        //var_dump($khrt_p2Row);
        if($khrt_p2Row->id == 11 && $sarfaslCheck)
        {
            $sarfaslCheck = false;
            $needLast_emza = true;
            //var_dump("111 = ".$needLast_emza);
        }

        $khrrtArr[] = $khrrtRow->kharid_requesttypeId;
    }
    //die();
    //die(var_dump($needLast_emza));
    $fiaResult = $fiab->select("tableName = 'kharid_request' and tableId = $tRow->sourceTableId and user.id = flowitem_acceptor.userId", '', '', 'user.*', 'user, flowitem_acceptor');
    $flag = false;
    $acceptorCount = mysql_num_rows($fiaResult); 
    while($row = mysql_fetch_assoc($fiaResult))
    {

        $row['fileEmza'] = !empty( $row['fileEmza']) ?  $row['fileEmza'] : 0;

        $dynamicFieldsArr = $tf->getDynamicFieldsForObject('user', $row['id']);
        $row = array_merge($row, $dynamicFieldsArr);

        $dResult = $db->getRow("'$row[fileEmza]'");

        $dRow = new documents();
        if($dResult)
        {
            $dRow = $dResult;
        }
        $row['signDoc'] = $dRow->address;
        $row['post'] = !$flag ? 'درخواست کننده' : $user_postArr[$row['id']];
        $row['label'] = $row['fname'] . ' ' . $row['lname'] .' - '.$row['post'];
        $flag = true;
        $param['trade']['kharid_request_emza']['data'][] = $row;
    }

    $fhResult = $fhb->select("tableName = 'kharid_request' and tableId = $tRow->sourceTableId and user.id = flow_history.userId", '', '', 'flow_history.*', 'flow_history, user');  //تایید شده ها

    $fhArr = array();
    while($row = mysql_fetch_object($fhResult))
    { 
        $fhArr[$row->flowItemId] = $row;
    }

    $array_keys = array_keys($fhArr);
    if($acceptorCount > 0)
    {
        unset($fhArr[$array_keys[0]]);
    } 
    //die(var_dump($fhArr)); 
    foreach($fhArr as $value)
    {  
        $uResult = $ub->select("id = ".$value->userId);
        $row = mysql_fetch_assoc($uResult);  
        $row['fileEmza'] = !empty( $row['fileEmza']) ?  $row['fileEmza'] : 0;

        $dResult = $db->getRow("'$row[fileEmza]'");
        $dRow = new documents();
        if($dResult)
        {
            $dRow = $dResult;
        }

        $row['signDoc'] = $dRow->address;   
        $row['post'] = $user_postArr[$row['id']];
        $row['label'] = $row['fname'] . ' ' . $row['lname'] .' - '.$row['post'];
        $param['trade']['kharid_request_emza']['data'][] = $row;
    }

    if($tRow->regionId == 3)
    {
        //امضای آقای امینی و کاربر بعدی
        if($tRow->tradeTypeId)
        {
            $idArr = selectUsersByRole(3, 2, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  

            $userId = isset($idArr[1]) ? $idArr[1] : 1;
            $uResult = $ub->select("id = $userId");
            $row = mysql_fetch_assoc($uResult);  
            $row['fileEmza'] = !empty( $row['fileEmza']) ?  $row['fileEmza'] : 0;

            $dResult = $db->getRow("'$row[fileEmza]'");
            $dRow = new documents();
            if($dResult)
            {
                $dRow = $dResult;
            }

            $row['signDoc'] = $dRow->address; 
            $row['post'] = $user_postArr[$userId];
            $row['label'] = $row['fname'] . ' ' . $row['lname'] .' - '.$row['post'];
            $param['trade']['kharid_request_emza']['data'][] = $row;


            if($tRow->tradeTypeId == 1 || $tRow->tradeTypeId == 2) $roleId = 7;
            else $roleId = 3; 

            $idArr = selectUsersByRole(3, $roleId, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  

            $userId = isset($idArr[1]) ? $idArr[1] : 1;

            $uResult = $ub->select("id = $userId");
            $row = mysql_fetch_assoc($uResult);  
            $row['fileEmza'] = !empty( $row['fileEmza']) ?  $row['fileEmza'] : 0;

            $dResult = $db->getRow("'$row[fileEmza]'");
            $dRow = new documents();
            if($dResult)
            {
                $dRow = $dResult;
            }

            $row['signDoc'] = $dRow->address;
            $row['post'] = $user_postArr[$userId];
            $uRow = $ub->getRow($tRow->userId);
            $row['label'] = 'آقا/خانم '.$uRow->fname .' '.$uRow->lname .' اقدام فرمایید.';
            $param['trade']['kharid_request_emza']['data'][] = $row;
        }
    }
    else
    {
        $idArr = selectUsersByRole(3, 14, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  

        $userId = isset($idArr[1]) ? $idArr[1] : 1;
        $uResult = $ub->select("id = $userId");
        $row = mysql_fetch_assoc($uResult);  
        $row['fileEmza'] = !empty( $row['fileEmza']) ?  $row['fileEmza'] : 0;

        $dResult = $db->getRow("'$row[fileEmza]'");
        $dRow = new documents();
        if($dResult)
        {
            $dRow = $dResult;
        }
        $row['signDoc'] = $dRow->address;
        $row['post'] = $user_postArr[$userId];
        //$row['label'] = $row['fname'] . ' ' . $row['lname'] .' - '.$row['post'];
        //$param['trade']['kharid_request_emza']['data'][] = $row;

        $uRow = $ub->getRow($tRow->userId);
        $row['label'] = 'آقا/خانم '.$uRow->fname .' '.$uRow->lname .' اقدام فرمایید.';
        $param['trade']['kharid_request_emza']['data'][] = $row;
    }
} 
$param['trade']['winner']['type'] = $returnType;

if($needLast_emza)
{
    $idArr = selectUsersByRole(10, 2, 3, '0');
    if(count($idArr) > 1)
    {
        $uId = $idArr[1];

        $uRes = $ub->select("id = $uId");
        $row = mysql_fetch_assoc($uRes);
        $row['fileEmza'] = !empty( $row['fileEmza']) ?  $row['fileEmza'] : 0;

        $dynamicFieldsArr = $tf->getDynamicFieldsForObject('user', $row['id']);
        $row = array_merge($row, $dynamicFieldsArr);

        $dResult = $db->getRow("'$row[fileEmza]'");

        $dRow = new documents();
        if($dResult)
        {
            $dRow = $dResult;
        }
        $row['signDoc'] = $dRow->address;
        $row['post'] = 'معاون مالی و پشتیبانی';
        $row['label'] = $row['fname'] . ' ' . $row['lname'] .' - '.$row['post'];
        $row['varchar_1'] = 'خرید از محل اعتبارات ماده 13 (لوازم و تجهیزات اداری) بلامانع است.';

        $param['trade']['kharid_request_emza']['data'][] = $row;
    }

}

if($param['output_type'] == 2)
{
    $other['type'] = 'clientSide';
}

$logo_src = "../../core/images/logo/document_logo.png";
if($param['output_type'] == 2)
{
    $logo_src = $_SESSION['uri'].$_SERVER["HTTP_HOST"]."/core/images/logo/document_logo.png";
}


?>
<br/>
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto;">
    <table width="100%" dir="rtl">
        <tr>
            <td rowspan="3" width="40%"><img src="<?=$logo_src?>" width="100px" alt="<?=$_SESSION['companyTitle']?>"></td>
            <td width="30%"><?=$_SESSION['companyTitle']?></td>
            <td width="33%"></td>
        </tr>
        <tr>
            <td><input type="checkbox">ستاد شرکت</td>
            <td></td>
        </tr>
        <tr>
            <td><input type="checkbox">برق ناحیه &nbsp;&nbsp;&nbsp;</td>
            <td></td>
        </tr>
    </table> 
    <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:15px;"><strong>برگ درخواست خرید کالا / خدمات</strong></div>
    <div style="clear: both; text-align: center; margin:20px auto 20px auto; font-size:18px;"><strong><?=$param['trade']['kharid_request']['data']['kharidType']?>
            <?if($param['trade']['kharid_request']['data']['kharidTypeId'] == 8)
            {
                echo " - ".$param['trade']['kharid_request']['data']['activityType'];
            }?>
        </strong></div>
    <div style="clear: both; text-align: center; margin:10px auto 10px auto; font-size:15px;"><strong><?=$param['trade']['kharid_request']['data']['title']?></strong></div>
    <div align = "center" style = "min-width:95%; width:95%; margin: auto; ">                 
        <table width="100%" >
            <tr>
                <td style="border:solid 1px; text-align: center;" width="33%">
                    شماره : <?=convertEnNum2FaNum($param['trade']['kharid_request']['data']['requestNumber'])?>
                    <br>
                    تاریخ درخواست : <?=convertEnNum2FaNum(str_replace('-', '/', $jdf->g2j($param['trade']['generalInfo']['data']['requestUnitDate'])))?>
                </td>
                <td style="border:solid 1px; text-align: center;" width="33%">واحد درخواست کننده : <?=$param['trade']['kharid_request']['data']['regionTitle']?></td>
                <td style="border:solid 1px; text-align: center;" rowspan="2" width="33%">مبلغ : <?=convertEnNum2FaNum(number_format($param['trade']['kharid_request']['data']['totalCost']))?>ریال از محل کد <?=convertEnNum2FaNum($param['trade']['kharid_request']['data']['varchar_1'])?></td>
            </tr>
            <tr>
                <td style="border:solid 1px; text-align: center;">تاریخ مورد نیاز : </td>
                <td style="border:solid 1px; text-align: center;">توضیحات : <?=strip_tags($param['trade']['kharid_request']['data']['description'])?></td>
            </tr>
            <tr>
                <td colspan="3">
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tr>
                            <td style="border:solid 1px; text-align: center;">ردیف</td>
                            <td style="border:solid 1px; text-align: center;">کد کالا</td>
                            <td style="border:solid 1px; text-align: center;">شرح و مشخصات کالا/خدمات</td>
                            <td style="border:solid 1px; text-align: center;">تعداد/مقدار</td>
                            <td style="border:solid 1px; text-align: center;">واحد</td>
                            <td style="border:solid 1px; text-align: center;">قیمت واحد مواد</td>
                            <td style="border:solid 1px; text-align: center;">قیمت واحد دستمزد</td>
                            <td style="border:solid 1px; text-align: center;">مبلغ</td>
                        </tr>
                        <?
                        $tfiArr = $param['trade']['kharid_request_item']['data']; 
                        if(count($tfiArr)>0)
                        { 
                            $counter = 0;
                            foreach($tfiArr as $value)
                            {
                                $counter++;
                                ?>
                                <tr>
                                    <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($counter)?></td>
                                    <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['code'])?></td>
                                    <td style="border:solid 1px; text-align: center;"><?=$value['title']?></td>
                                    <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['quantity'])?></td>
                                    <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['vahed'])?></td>
                                    <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(costFormat($value['basePrice']))?></td>
                                    <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(costFormat($value['var1']))?></td>
                                    <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(costFormat($value['totalCost']))?></td>
                                </tr>
                                <?
                            }
                            ?>
                            <tr>
                                <td colspan="7" style="border:solid 1px; text-align: center;">جمع کل : <?=numToString($param['trade']['kharid_request']['data']['totalCost'])?> ریال</td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(costFormat($param['trade']['kharid_request']['data']['totalCost']))?></td>
                            </tr>
                            <?
                        }
                        else
                            echo '<tr><td colspan=7 style="border:solid 1px;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
                        ?>

                    </table>
                </td>
            </tr>
        </table>

    </div>

    <?
    $emzaArr = $param['trade']['kharid_request_emza']['data'];
    $emza = array_chunk($emzaArr, 2);
    ?>
    <div align = "center" style = "min-width:90%; width:90%; margin: auto; ">
        <table width="100%">
            <?

            foreach($emza as $subArr)
            {?>
                <tr>
                    <?if(isset($subArr[0]))
                    {   
                        $row = $subArr[0];
                        ?>
                        <td width="50%">
                            <?=$row['varchar_1']?>
                            <BR>
                            <?=$row['label']?>
                            <BR>
                            <img src="<?='../upload_files/'.$row['signDoc']?>" width="100">
                        </td>
                        <?
                    }?>
                    <?if(isset($subArr[1]))
                    {
                        $row = $subArr[1];
                        ?>
                        <td width="50%">
                            <?=$row['varchar_1']?>
                            <BR>
                            <?=$row['label']?>
                            <BR>
                            <img src="<?='../upload_files/'.$row['signDoc']?>" width="100">
                        </td>
                        <?
                    }?>    
                </tr>
                <?}?>
        </table>
        <?
        //126, 152, 179
        $arr = array(126, 152, 179);
        //die(var_dump($khrrtArr));
        $intersect = array_intersect($arr, $khrrtArr);  
        $user = '';
        $dRow = null;
        if(count($intersect))
        {   //die(var_dump($param['trade']['kharid_request']['data']));
            $userId = $param['trade']['kharid_request']['data']['userId']; 
            $uResult = $ub->select("id = $userId");
            $row = mysql_fetch_assoc($uResult);  
            $row['fileEmza'] = !empty( $row['fileEmza']) ?  $row['fileEmza'] : 0;
            $user = $row['fname'] . ' ' . $row['lname'];
            $dResult = $db->getRow("'$row[fileEmza]'");
            $dRow = new documents();
            if($dResult)
            {
                $dRow = $dResult;
            }
        }
        ?>
        <div style="margin-top: 100px; margin-bottom: 100px; text-align: right;">
            <p style="margin-bottom: 50px;">اقلام فوق تحویل گرفته شد. <?=$user?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;امضا: <?if($dRow->address){?><img src="<?='../upload_files/'.$dRow->address?>" alt=""><?}?></p>
            <p>توضیحات:</p>
        </div>
    </div>

</div> 