<?$jdf = new jdf()?>
<?
$ub = new businessUser();
//$uResult = $ub->select("user.id = 36 and user.fileEmza = documents.id", "", "" , "documents.address", "user, documents");
//$uRow = mysql_fetch_object($uResult);

$receiver = $param['estelam_girande']['generalInfo']['data'];
$receiverType = ($receiver['type']==0)? 'شرکت ' : 'پیمانکاری ';
?>
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
    <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:14px;"><strong>شرایط استعلام بها شماره <?=$param['trade']['generalInfo']['data']['code']?></strong></div>
    <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:17px;"><strong><?=$param['trade']['generalInfo']['data']['title']?></strong></div>
    <div style="clear: both; text-align: right; margin:20px auto 30px auto; font-size:14px; font-weight: bold;"><?=$receiverType?>محترم <?=$receiver['title']?></div>
    <div>
        <p>باسلام : شرکت توزيع نيروی برق آذربايجانغربی  درنظر دارد انجام عمليات مربوط به <?=$param['trade']['generalInfo']['data']['title']?> رابا
            شرايط ومشخصات ذيل به پيمانكاران واجدشرايط كه <?=$param['trade']['specInfo']['data']['peymankar_condition']?> واگذار نمايد ،لذا خواهشمنداست قيمت پيشنهادي خودرا برابرفرم پيوستي ( برگ پيشنهاد قيمت) درپاكت سربسته تا روز <?=$param['trade']['specInfo']['data']['tahvilPakatDay']?> مورخ
            <?=isset($param['trade']['specInfo']['data']['tahvilPakatDate']) && !empty($param['trade']['specInfo']['data']['tahvilPakatDate']) ? str_replace('-', '/',$jdf->g2j($param['trade']['specInfo']['data']['tahvilPakatDate'])) : ''?> به امور تداركات اين شركت واقع در <?=$param['trade']['specInfo']['data']['tahvilPakatPlace']?> تحويل فرمائيد.
        </p>
        <p style="font-weight:bold; ">شرايط ومشخصات استعلام بها :</p>
        <p><span style="font-weight:bold">1. موضوع استعلام بها :</span>
            <br>
            عبارتست از <?=$param['trade']['generalInfo']['data']['title']?> مطابق فهرست پيوستي.
            <br>
            <?=nl2br($param['trade']['specInfo']['data']['title_description'])?>
        </p>
        <p>
            <span style="font-weight:bold">2. مدت اجراي كار  :</span><br>
            <br>
            مدت اجراي عمليات موضوع استعلام <?=$param['trade']['specInfo']['data']['tahvilKhadamatModat']?>  خواهد بود .
        </p>
        <p><span style="font-weight:bold">3. شرح ريز كارها  : </span><br>
            <br>
            <?=nl2br($param['trade']['specInfo']['data']['sharheRizKarha'])?>

        </p> 
        <p>
            <span style="font-weight:bold">4. نحوه ارائه قيمت :</span><br>    
            <?=nl2br($param['trade']['specInfo']['data']['nahveEraeyeGheymat'])?>
        </p>
        <p>
            <span style="font-weight:bold">5.موارد خارج ازقرارداد: </span><br>   
            <?=nl2br($param['trade']['specInfo']['data']['kharejAzGharardad'])?>
        </p>
        <p>
            <span style="font-weight:bold">6. نحوه ارائه تضمين وسپرده حسن انجام تعهدات :</span><br>
            1. برنده استعلام موظف است ظرف مدت حداكثر <?=$param['trade']['specInfo']['data']['hosnAnjamTaahodatMohlat']?> ازتاريخ ابلاغ نتيجه نسبت به ارائه تضمين حسن انجام تعهدات به ميزان <?=$param['trade']['specInfo']['data']['hosnAnjamTaahodatAmount']?> ( بصورت واريز وجه نقد به حساب جاري كارفرما ويا ضمانتنامه بانكي به نفع كارفرما) وامضاي قرارداد اقدام نمايد تضمين مذكور به موقع اتمام مدت قرارداد( تحويل موقت پروژه) بادرخواست پيمانكار وبا تأييد دستگاه نظارت كارفرما آزاد و به پيمانكار مسترد خواهدشد.
            <br>
            2. <?=$param['trade']['specInfo']['data']['hosneAnjamKarAmount']?> پيمانكار بعنوان سپرده حسن انجام كاركسر ميگردد كه  نصف  اين سپرده بعداز اتمام كارهاي موضوع قرارداد( تحويل موقت پروژه) ومابقي پس از اتمام دوره تضمين وبادرخواست پيمانكار وبا تأييد دستگاه نظارت وبا ارائه مفاصا حساب از سازمانهاي تأمين اجتماعي ودارائي آزاد وبه پيمانكار مسترد خواهدشد.
        </p>
        <p>
            <span style="font-weight:bold">7. کسورات</span><br>
            <?=nl2br($param['trade']['specInfo']['data']['kosoorat'])?>
        </p>
        <p>
            <span style="font-weight:bold">8. تعديل : </span><br>
        <?=nl2br($param['trade']['specInfo']['data']['tadil'])?></p>
        <p>
            <span style="font-weight:bold">9. تضمین تحویل اجناس : </span><br>
        <?=nl2br($param['trade']['specInfo']['data']['tahvil_tazmin'])?></p>
        <p>
            <span style="font-weight:bold">10. درصد بیمه : </span><br>
        <?=nl2br($param['trade']['specInfo']['data']['otherCondition_tazmin'])?></p>
        <p>
        <span style="font-weight:bold">11. شرايط پـــرداخت :  </span><br>
        1. <?=nl2br($param['trade']['specInfo']['data']['pardakht_condition'])?><br>
        2. درصورتيكه پروژه موضوع واگذاري درطول مدت اجراي قرارداد با موانع حقوقي وقانوني روبروشود وموضوع مورد تأييددستگاه نظارت مقيم وعاليه قرارگيرد، پنجاه درصد مبلغ پيشرفت فيزيکی  صورت وضعيت مربوطه به پيمانكار پرداخت خواهدشد وچنانچه كارفرما ظرف مدت حداكثر يك ماه نتواند نسبت به رفع موانع موجود اقدام نمايد پيمانكار می تواند  نسبت به ارائه صورت وضعيت قطعي اقدام وكارفرما پس از كسر كسورات قانوني وپيمانكاري نسبت به پرداخت وتسويه حساب اقدام خواهند نمود.<br>
        3. <?=nl2br($param['trade']['specInfo']['data']['pishpardakht'])?><br>
        4. درصورت ارائه نرم افزار تهيه صورت وضعيت توسط کارفرما ، پيمانکار مکلف به ارائه صورت وضعيت با نرم افزار فوق خواهد بود.<br>
        5. در صورت ارائه گواهي نامه ثبت نام موديان مالياتي <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?> در صد عوارض و ماليات بر ارزش افزوده به پيمانكار پرداخت خواهد شد.<br>
        <p>
            <span style="font-weight:bold">12. دستگاه نظارت :  </span><br>
        <?=nl2br($param['trade']['specInfo']['data']['nezarat'])?></p>
        <p>
            <span style="font-weight:bold">13. جريمه تأخير وخسارت  :  </span><br>
        <?=nl2br($param['trade']['specInfo']['data']['jarimeKhesarat'])?></p>
        <p>
            <span style="font-weight:bold">14. تغيير مقادير كار  :</span><br>
            كارفرما ميتواند مقدار احجام كارموضوع واگذاري رادرطول مدت قرارداد  تا <?=$param['trade']['specInfo']['data']['changeAmount']?> درصد مبلغ كل قرارداد كاهش يا افزايش دهد بدون اينكه دربهاي واحد وشرايط قرارداد تغييري حاصل شود وپيمانكار ملزم به قبول آن ميباشد.</p>
        <p>
            <span style="font-weight:bold">15. شرايط تحويل كار  :</span><br>
            پس از اتمام عمليات هر قسمت از اجراي پروژه وعودت اقلام مانده پايكاربه انبار شركت توزيع ( كارفرما)  ، بادرخواست پيمانكار كارهاي انجام شده تحويل دستگاه نظارت  كارفرما خواهدشد. كارهاي انجام شده توسط دستگاه نظارت كارفرما مورد بازديد قرارگرفته ودرصورت عدم مشاهده معايب يا نقائص فني با تنظيم صورتجلسه تحويل ( تحويل موقت ) انجام ميگيرد ودرصورت مشاهده نقائص ، مراتب توسط دستگاه نظارت كارفرما كتبا به پيمانكار ابلاغ ميشود وپيمانكار موظف است ظرف مدتي كه توسط دستگاه نظارت تعيين ميشود نسبت به رفع معايب ونقائص اقدام نمايد. هرگاه پيمانكار درانجام اين تعهد خود قصور ورزد يا مسامحه كند كارفرما حق دارد آن معايب يا نقائص را رأسا ويا به هر ترتيب كه مقتضي بداند رفع كند وهزينه آن را با اضافه 15%  بدون انجام تشريفات قضائي و اداري ازمحل تضمين حسن انجام تعهدات پيمانكار وساير مطالبات وي برداشت نمايد وپيمانكار حق هيچگونه اعتراضي نسبت به ميزان هزينه هاي به عمل آمده را نخواهدداشت. درصورتيكه مبلغ تضمين حسن انجام تعهدات ومطالبات پيمانكار تكافوي جبران  هزينه هاي فوق را ننمايد پيمانكار مكلف به پرداخت آن ميباشد.</p>
        <br>
        1. درصورت نياز کارفرما می تواند با توجه به شرايط کار نسبت به افزايش يا کاهش 25% مبلغ ريالی قرارداد اقدام نمايد .
        <p>
            <span style="font-weight:bold">15.  شرایط اختصاصی : </span><br>
        <?=nl2br($param['trade']['kharid_request']['data']['text_1'])?></p>
        <p>
            <span style="font-weight:bold">16.  تعهدات طرفين : </span><br>
        <?=nl2br($param['trade']['kharid_request']['data']['text_2'])?></p>
        <p>17. كارفرما در رد يا قبول يك يا كليه پيشنهادات مختار است.</p>
    </div>
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
                $uResult = $ub->select("user.id = $userId and user.fileEmza = documents.id", "", "" , "documents.address, user.fname, user.lname", "user, documents");
                $uRow = mysql_fetch_object($uResult);
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
                        ?>
                        <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                        <?
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
                    <?if($param['trade']['generalInfo']['data']['accept'] > 137)
                    {
                        ?>
                        <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                        <?
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
    <div  style="text-align: center; margin:20px auto 30px auto; font-size:14px;">برگ پيشنهاد قيمت استعلام بها شماره<?=$param['trade']['generalInfo']['data']['code']?></div>
    <p><?=$receiverType.$receiver['title']?> امضا كننده زير پس از مطالعه وبررسي كامل اسناد ومدارك شرايط  استعلام  مربوط به<?=$param['trade']['generalInfo']['data']['title']?> را  طبق شرايط وريز اقلام وقيمتهاي ذیل كه تمامي آن را امضا و مهر نموده وبادرنظر گرفتن كليه عوامل موجود ومؤثر دراين واگذاري ، اجراي  عمليات موضوع استعلام بها را بشرح ذيل  پيشنهاد مي نمايم. </p>
    <?$frm_cf = new facadeFrm_catalog();
    $aghlamShowInSooratjalase = $frm_cf->getField_dbValueForObject('trade', $param['trade']['generalInfo']['data']['id'], 'aghlamShowInSooratjalase');
    $tsArr = $param['trade']['trade_subject']['data'];  
    $tsfArr = $param['trade']['trade_subject_fehrestbaha']['data'];  
    if($aghlamShowInSooratjalase == 2)
    {
        foreach($tsArr as $tsIs=>$tsRow)
        {?>

            <table cellspacing="0" cellpadding="2" width="100%">
                <tr>
                    <td style="text-align: center; border:1px solid #000;" colspan="7">موضوع: <?=$tsRow['title']?></td>

                </tr>
                <tr>
                    <td style="border:solid 1px #000; text-align: center;">ردیف</td>
                    <td style="border:solid 1px #000; text-align: center;">شرح</td>
                    <td style="border:solid 1px #000; text-align: center;">مقدار</td>
                    <td style="border:solid 1px #000; text-align: center;">واحد</td>
                    <td style="border:solid 1px #000; text-align: center;">قیمت واحد مصالح</td>
                    <td style="border:solid 1px #000; text-align: center;">قیمت واحد دستمزد</td>
                    <td style="border:solid 1px #000; text-align: center;">جمع کل مبلغ پیشنهادی</td>
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
                            <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum($counter)?></td>
                            <td style="border:solid 1px #000; text-align: center;"><?=$value['title']?></td>
                            <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum($value['quantity'])?></td>
                            <td style="border:solid 1px #000; text-align: center;"><?=$value['vahed']?></td>
                            <td style="border:solid 1px #000; text-align: center;"></td>
                            <td style="border:solid 1px #000; text-align: center;"></td>
                            <td style="border:solid 1px #000 ; text-align: center;"></td>
                        </tr>
                        <?
                    }
                }
                else
                    echo '<tr><td colspan=9 style="border:solid 1px #000;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
                ?>
                <tr>
                    <td colspan="5" style="text-align: right; border:1px solid #000;">جمع کل</td>
                    <td colspan="2" style="text-align: right; border:1px solid #000;"></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right; border:1px solid #000;">جمع کل با حروف</td>
                    <td colspan="2" style="text-align: right; border:1px solid #000;"></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: right; border:1px solid #000;">جمع كل بااعمال <?=convertEnNum2FaNum($param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100)?> درصد عوارض وماليات برارزش افزوده</td>
                    <td colspan="2" style="text-align: right; border:1px solid #000;"></td>
                </tr>
            </table>
            <?}
    }
    else
    {
        ?>
        <table cellspacing="0" cellpadding="2" width="100%">
            <tr>
                <td style="text-align: center; border:1px solid #000;">ردیف</td>
                <td style="text-align: center; border:1px solid #000;" width="30%">شرح</td>
                <td style="text-align: center; border:1px solid #000;" width="20%">جمع کل</td>
                <td style="text-align: center; border:1px solid #000;" width="20%">جمع کل با حروف</td>
                <td style="text-align: center; border:1px solid #000;" width="20%">جمع كل بااعمال <?=convertEnNum2FaNum($param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100)?> درصد عوارض وماليات برارزش افزوده</td>
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
            <li>الف ) كليه اسناد ومدارك قرارداد را امضا نموده وتضمين حسن انجام تعهدات را ( حداكثر ظرف پنج  روز از تاريخ ابلاغ نتيجه ) تسليم ونسبت به امضاي قرارداد اقدام نمايم.</li>
            <li>ب ) ظرف مدت مقرر در شرايط شروع بكار نموده وكليه كارهاي موضوع قرارداد رابه اتمام برسانم.</li>
            <li>ج ) تأييد مي نمايم كه كليه ضمائم اسناد ومدارك واگذاري جزو لاينفك اين پيشنهاد محسوب ميشود.</li>
            <li>د ) اطلاع كامل دارم كه شركت توزيع نيروي برق آذربايجانغربي الزامي براي واگذاري كاربه هريك از پيشنهادات را ندارد.</li>
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