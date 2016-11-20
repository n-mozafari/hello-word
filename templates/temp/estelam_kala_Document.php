<?$jdf = new jdf()?>
<?
$ub = new businessUser();
//$uResult = $ub->select("user.id = 36 and user.fileEmza = documents.id", "", "" , "documents.address", "user, documents");
//$uRow = mysql_fetch_object($uResult);
$rb = new businessRegion();  
$rRow = $rb->getRow($param['trade']['generalInfo']['data']['regionId']);
$options['orientation']='P';
$param['address'] = $rRow->address. ' کدپستی '.$rRow->postalCode; 

$receiver = $param['estelam_girande']['generalInfo']['data'];?>
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto; font-size: 11px;">
    <table width="100%">
        <tr>
            <td align="center" width="33%"><img src="../../core/images/logo/document_logo.png" width="100px" alt="<?=$_SESSION['companyTitle']?>"></td>
            <td align="center" width="33%"><?=$_SESSION['companyTitle']?></td>
            <td align="center" width="33%">شماره :
                <br>
                تاریخ:
            </td>
        </tr>
    </table>
    <div style="clear: both; text-align: center; margin:15px auto 20px auto; font-size:13px;"><strong>شرایط استعلام بها شماره <?=$param['trade']['generalInfo']['data']['code']?></strong></div>
    <div style="clear: both; text-align: center; margin:15px auto 0px auto; font-size:15px;"><strong><?=$param['trade']['generalInfo']['data']['title']?></strong></div>
    <p><strong>شرکت محترم <?=$receiver['title']?></strong></p>
    <p>باسلام : شرکت توزيع نيروی برق آذربايجانغربی  درنظر دارد اقلام مصرفي مربوط به <?=$param['trade']['generalInfo']['data']['title']?> وبشرح ذيل با شرايط ومشخصات ذيل به فروشندگان واجدشرايط  <?=$param['trade']['specInfo']['data']['peymankar_condition']?> واگذار نمايد ،لذا خواهشمنداست قيمت پيشنهادي خودرا برابرفرم پيوستي ( برگ پيشنهاد قيمت) درپاكت سربسته تا روز 
        <?=$param['trade']['specInfo']['data']['tahvilPakatDay'];?> مورخ 
        <?=isset($param['trade']['specInfo']['data']['tahvilPakatDate']) && !empty($param['trade']['specInfo']['data']['tahvilPakatDate']) ? str_replace('-', '/',$jdf->g2j($param['trade']['specInfo']['data']['tahvilPakatDate'])) : ''?> به
        <?=$param['trade']['specInfo']['data']['tahvilPakatPlace']?> تحويل فرمائيد.
    </p>
    <p style="font-weight:bold;">شرايط ومشخصات استعلام بها:</p>
    <ol>
        <li>
            <span style="font-weight:bold">موضوع استعلام بها :</span>
            <br>
            عبارتست از <?=$param['trade']['generalInfo']['data']['title']?> بشرح ذيل مطابق فهرست پيوستي 
        </li>
        <li>
            <span style="font-weight:bold">مدت تحويل كالا  : </span>
            <br>
            مدت تحويل كالاي موضوع استعلام <?=$param['trade']['specInfo']['data']['tahvilKalaModat']?>  خواهد بود .
        </li>
        <li>
            <span style="font-weight:bold">شرايط اختصاصي :</span>
            <br>  
            <?=nl2br($param['trade']['kharid_request']['data']['text_1'])?>
        </li>
        <li>
            <span style="font-weight:bold">نحوه ارائه قيمت : </span>
            <br>  
            قيمت پيشنهادی درفرم  منضم به شرایط استعلام بها  بايستی به عدد وبه حروف  نوشته شود . وضمنا فروشنده نبايستي براي اجناس موضوع استعلام پيشنهاد نقدي ارائه نمايد چون وجه اجناس پس ازتحويل وارسال صورتحساب وتنظيم سند مالي پرداخت خواهد شد.وبه پيشنهاداتي كه غير ازپاكت سربسته ( بطريق فاكس ) ارسال شود ترتيب اثر داده نخواهد شد.
        </li>
        <li>
            <span style="font-weight:bold">تغيير مقادير کالا  : </span>
            <br>
            خریدار ميتواند مقدار احجام کالای موضوع استعلام را درطول مدت قرارداد  تا<?=$param['trade']['specInfo']['data']['changeAmount']?> كاهش يا افزايش دهد بدون اينكه دربهاي واحد وشرايط قرارداد تغييري حاصل شود و فروشنده ملزم به قبول آن ميباشد.
        </li>
        <li>
            <span style="font-weight:bold">تعهدات طرفين : </span>
            <br>
            <?=nl2br($param['trade']['kharid_request']['data']['text_2'])?>    
        </li>
        <li>
            كارفرما در رد يا قبول يك يا كليه پيشنهادات مختار است.     
        </li>
    </ol>
    <table width="90%">
        <tr>
            <?if( $param['trade']['generalInfo']['data']['regionId'] == 3)
            {
                $idArr = selectUsersByRole(3, 2, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
                $userId = isset($idArr[1]) ? $idArr[1] : 1;

                $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
                $uRow = mysql_fetch_object($uResult);
            }
            else
            {

                $idArr = selectUsersByRole(3, 14, $param['trade']['generalInfo']['data']['regionId'], $isDelete = '0');  
                $userId = isset($idArr[1]) ? $idArr[1] : 1;
                $uResult = $ub->select("user.id = $userId");
                $uRow = mysql_fetch_object($uResult);
                $row['fileEmza'] = !empty( $row['fileEmza']) ?  $row['fileEmza'] : 0;
                $db = new businessDocuments();

                $dResult = $db->getRow("'$row[fileEmza]'");
                $dRow = new documents();
                if($dResult)
                {
                    $dRow = $dResult;
                }
            }

            if($param['trade']['generalInfo']['data']['regionId'] == 3)
            {?>
                <td align="center">شركت توزيع نيروي بر ق آذربايجانغربي
                    <br>
                    <?=$uRow->lname?><br>
                    مدير امورتداركات
                    <br>
                    <?if($param['trade']['generalInfo']['data']['accept'] > 82)
                    {
                        if(file_exists('../upload_files/'.$uRow->address))
                        {
                            ?>
                            <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                            <?
                        }
                    }?>
                </td>
                <?}
            else
            {
                ?>
                <td align="center">شركت توزيع نيروي بر ق آذربايجانغربي
                    <br>
                    <?=$uRow->lname?>
                    مدیر توزیع برق
                    <br>
                    <?
                    if($param['trade']['generalInfo']['data']['accept'] > 137)
                    {
                        /*if(file_exists('../upload_files/'.$dRow->address))
                        {   
                        ?>
                        <img src="<?='../upload_files/'.$dRow->address?>" width="100">
                        <?
                        }*/
                    }?>
                </td>
                <?
            }?>
            <td align="center"> 
                نام ومشخصات پيشنهاد دهنده :
                <br>
                مهر وامضا پيشنهاد دهنده :
                <br>
                تاريخ :
                <br>
                سمت امضا كنندگان :
            </td>
        </tr>
    </table>
    <p style="page-break-after: always;"></p>
    <div style="font-weight:bold; text-align: center; margin:20px auto 30px auto; font-size:14px;">برگ پيشنهاد قيمت استعلام بها شماره<?=$param['trade']['generalInfo']['data']['code']?></div>
    <p>شركت <?=$receiver['title']?> امضا كننده زير پس از مطالعه وبررسي كامل اسناد ومدارك شرايط  استعلام  مربوط به <?=$param['trade']['generalInfo']['data']['title']?>كه تمامي آن را امضا ومهر نموده وبادرنظر گرفتن كليه عوامل موجود ومؤثر دراين استعلام ، قيمت خود را بشرح ذيل  پيشنهاد مي نمايم. </p>
    <?
    $frm_cf = new facadeFrm_catalog();
    $aghlamShowInSooratjalase = $frm_cf->getField_dbValueForObject('trade', $param['trade']['generalInfo']['data']['id'], 'aghlamShowInSooratjalase');
    $tsArr = $param['trade']['trade_subject']['data'];  
    $tsfArr = $param['trade']['trade_subject_fehrestbaha']['data'];  
    if($aghlamShowInSooratjalase == 2)
    {
        foreach($tsArr as $tsIs=>$tsRow)
        {

            ?>
            <table cellspacing="0" cellpadding="2" width="100%">
                <tr>
                    <td style="text-align: center; border:1px solid #000;" colspan="6">موضوع <?=$tsRow['title']?></td>

                </tr>
                <tr>
                    <td style="text-align: center; border:1px solid #000;">ردیف</td>
                    <td style="text-align: center; border:1px solid #000;">شرح کالا</td>
                    <td style="text-align: center; border:1px solid #000;">تعداد</td>
                    <td style="text-align: center; border:1px solid #000;">واحد</td>
                    <td style="text-align: center; border:1px solid #000;">بهای واحد</td>
                    <td style="text-align: center; border:1px solid #000;">بهای کل</td>
                </tr>
                <?
                $tfiArr = $tsfArr[$tsIs];  
                if(count($tfiArr)>0)
                { 
                    $counter = 0;
                    foreach($tfiArr as $value)
                    { 
                        $counter++;
                        ?>
                        <tr>

                            <td style="text-align: center; border:1px solid #000;"><?=convertEnNum2FaNum($counter)?></td>
                            <td style="text-align: center; border:1px solid #000;"><?=$value['title']?></td>
                            <td style="text-align: center; border:1px solid #000;"><?=convertEnNum2FaNum($value['quantity'])?></td>
                            <td style="text-align: center; border:1px solid #000;"><?=convertEnNum2FaNum($value['vahed'])?></td>
                            <td style="text-align: center; border:1px solid #000;"></td>
                            <td style="text-align: center; border:1px solid #000;"></td>
                        </tr>
                        <?
                    }
                    ?>
                    <tr>
                        <td colspan="4" style="text-align: right; border:1px solid #000;">جمع کل</td>
                        <td colspan="2" style="text-align: right; border:1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right; border:1px solid #000;">جمع کل با حروف</td>
                        <td colspan="2" style="text-align: right; border:1px solid #000;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right; border:1px solid #000;">جمع كل بااعمال <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?> درصد عوارض وماليات برارزش افزوده</td>
                        <td colspan="2" style="text-align: right; border:1px solid #000;"></td>
                    </tr>
                    <?
                }
                else
                    echo '<tr><td colspan=6 "><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
                ?>

            </table>
            <br>
            <?
        }
    }
    else
    {
        ?>
        <table cellspacing="0" cellpadding="2" width="100%">
            <tr>
                <td style="text-align: center; border:1px solid #000;">ردیف</td>
                <td style="text-align: center; border:1px solid #000;" width="50%">شرح</td>
                <td style="text-align: center; border:1px solid #000;" width="15%">جمع کل مبلغ پیشنهادی</td>
                <td style="text-align: center; border:1px solid #000;" width="15%">جمع با حروف</td>
                <td style="text-align: center; border:1px solid #000;" width="15%">جمع كل بااعمال <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?> درصد عوارض وماليات برارزش افزوده</td>
            </tr>
            <?
            $counter = 0;
            foreach($tsArr as $tsIs=>$tsRow)
            {    
                $counter++;  
                ?>
                <tr>
                    <td style="text-align: center; border:1px solid #000;"><?=$counter?></td>
                    <td style="text-align: center; border:1px solid #000;"><?=$tsRow['title']?></td>
                    <td style="text-align: center; border:1px solid #000;"></td>
                    <td style="text-align: center; border:1px solid #000;"></td>
                    <td style="text-align: center; border:1px solid #000;"></td>
                </tr>
                <?
            }
            ?>
        </table>
        <?
    }?>
    <div>چنانچه اين پيشنهاد قيمت موردقبول قرارگيرد وبعنوان برنده انتخاب شوم تعهد مي نمايم كه : 
        <ul>
            <li>الف ) ظرف مدت مقرر در شرايط استعلام کلیه کالاهای موضوع معامله را تحویل دهم.</li>
            <li>ب ) تأييد مي نمايم كه كليه ضمائم اسناد ومدارك واگذاري جزو لاينفك اين پيشنهاد محسوب ميشود.</li>
            <li>ج ) اطلاع كامل دارم كه شركت توزيع نيروي برق آذربايجانغربي الزامي براي واگذاري كاربه هريك از پيشنهادات را ندارد. </li>
        </ul>
    </div>

    <table width="90%">
        <tr align="center">
            <td>نشاني محل پيشنهاد دهنده : 
                <br>
                تلفن وفاكس پيشنهاددهنده : </td>
            <td>
                نام ونام خانوادگي دارندگان امضاي مجاز:
                <br>سمت امضا كنندگان:
                <br>امضا و مهر دارندگان امضای مجاز / تاريخ: 
            </td>
        </tr>
    </table>
</div>