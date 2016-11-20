<?$jdf = new jdf()?>
<?
$ub = new businessUser();
$uResult = $ub->select("user.id = 36 and user.fileEmza = documents.id", "", "" , "documents.address", "user, documents");
$uRow = mysql_fetch_object($uResult);

$receiver = $param['estelam_girande']['generalInfo']['data'];?>
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto; font-size: 12px;">
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
    <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:15px;"><strong>شرایط استعلام بها شماره <?=$param['trade']['generalInfo']['data']['code']?></strong></div>
    <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:18px;"><strong><?=$param['trade']['generalInfo']['data']['title']?></strong></div>
    <div style="clear: both; text-align: right; margin:20px auto 30px auto; font-size:15px; font-weight: bold;">شرکت محترم <?=$receiver['title']?></div>
    <div>
        <p>باسلام : شرکت توزيع نيروی برق آذربايجانغربی  درنظر دارد انجام عمليات مربوط به <?=$param['trade']['generalInfo']['data']['title']?> رابه صورت <?=$param['trade']['kharid_request']['data']['contract_typeTitle']?>
            شرايط ومشخصات ذيل به پيمانكاران واجدشرايط كه داراي <?=$param['trade']['specInfo']['data']['peymankar_condition']?> واگذار نمايد ،لذا خواهشمنداست قيمت پيشنهادي خودرا برابرفرم پيوستي ( برگ پيشنهاد قيمت) درپاكت سربسته تا روز <?=$param['trade']['specInfo']['data']['tahvilPakatDay']?> مورخ
            <?=isset($param['trade']['specInfo']['data']['tahvilPakatDate']) && !empty($param['trade']['specInfo']['data']['tahvilPakatDate']) ? str_replace('-', '/',$jdf->g2j($param['trade']['specInfo']['data']['tahvilPakatDate'])) : ''?> به امور تداركات اين شركت واقع در <?=$param['trade']['specInfo']['data']['tahvilPakatPlace']?> تحويل فرمائيد.
        </p>
        <p style="font-weight:bold; ">شرايط ومشخصات استعلام بها :</p>
        <p style="font-weight:bold">1. موضوع استعلام بها :</p>
        <p> عبارتست از <?=$param['trade']['generalInfo']['data']['title']?> بشرح ذيل مطابق فهرست پيوستي : 
        <br>
        <?
            $trade_fehrestbaha_item = $param['trade']['aghlam']['data'];
            $counter = 0;
            foreach($trade_fehrestbaha_item as $value)
            {
                $counter++;
                echo $counter.' - '.$value['title'].'<BR>';
            }?>
        </p>
        <p><?=nl2br($param['trade']['specInfo']['data']['title_description'])?></p>
        <span style="font-weight:bold">2. مدت اجراي كار  :</span>
        <p> مدت اجراي عمليات موضوع استعلام <?=$param['trade']['generalInfo']['data']['tahvilKhadamatModat']?>  خواهد بود .</p>
        <span style="font-weight:bold">3. شرح ريز كارها  : 
        <br>
        <?
            $trade_fehrestbaha_item = $param['trade']['aghlam']['data'];
            $counter = 0;
            foreach($trade_fehrestbaha_item as $value)
            {
                $counter++;
                echo $counter.' - '.$value['title']. '<BR>';
            }?>
        </span>
         
        <span style="font-weight:bold">4. نحوه ارائه قيمت :</span>  
        <p>   
            <?=nl2br($param['trade']['specInfo']['data']['nahveEraeyeGheymat'])?>
        </p>
        <span style="font-weight:bold">5.موارد خارج ازقرارداد: </span>
        <p>   
            <?=nl2br($param['trade']['specInfo']['data']['kharejAzGharardad'])?>
        </p>
        <span style="font-weight:bold">6. نحوه ارائه تضمين وسپرده حسن انجام تعهدات :</span>
        <p>
            1. برنده استعلام موظف است ظرف مدت حداكثر <?=$param['trade']['specInfo']['data']['hosnAnjamTaahodatMohlat']?> ازتاريخ ابلاغ نتيجه نسبت به ارائه تضمين حسن انجام تعهدات به ميزان ده درصد مبلغ كل قرارداد ( بصورت واريز وجه نقد به حساب جاري كارفرما ويا ضمانتنامه بانكي به نفع كارفرما) وامضاي قرارداد اقدام نمايد تضمين مذكور به موقع اتمام مدت قرارداد( تحويل موقت پروژه) بادرخواست پيمانكار وبا تأييد دستگاه نظارت كارفرما آزاد و به پيمانكار مسترد خواهدشد.
        </p>
        <p>2. <?=$param['trade']['specInfo']['data']['hosneAnjamKarAmount']?> پيمانكار بعنوان سپرده حسن انجام كاركسر ميگردد كه  نصف  اين سپرده بعداز اتمام كارهاي موضوع قرارداد( تحويل موقت پروژه) ومابقي پس از اتمام دوره تضمين وبادرخواست پيمانكار وبا تأييد دستگاه نظارت وبا ارائه مفاصا حساب از سازمانهاي تأمين اجتماعي ودارائي آزاد وبه پيمانكار مسترد خواهدشد.</p>
        <span style="font-weight:bold">7. کسورات</span>
        <p>
            <?=nl2br($param['trade']['specInfo']['data']['kosoorat'])?>
        </p>
        <span style="font-weight:bold">8. تعديل : </span>
        <p><?=nl2br($param['trade']['specInfo']['data']['tadil'])?></p>
        <span style="font-weight:bold">9. تضمین تحویل اجناس : </span>
        <p><?=nl2br($param['trade']['specInfo']['data']['tahvil_tazmin'])?></p>
        <span style="font-weight:bold">10. درصد بیمه : </span>
        <p><?=nl2br($param['trade']['specInfo']['data']['otherCondition_tazmin'])?></p>
        <span style="font-weight:bold">11. شرايط پـــرداخت :  </span>
        <p>1. <?=nl2br($param['trade']['specInfo']['data']['pardakhtCondition'])?></p>
        <p>2. درصورتيكه پروژه موضوع واگذاري درطول مدت اجراي قرارداد با موانع حقوقي وقانوني روبروشود وموضوع مورد تأييددستگاه نظارت مقيم وعاليه قرارگيرد، پنجاه درصد مبلغ پيشرفت فيزيکی  صورت وضعيت مربوطه به پيمانكار پرداخت خواهدشد وچنانچه كارفرما ظرف مدت حداكثر يك ماه نتواند نسبت به رفع موانع موجود اقدام نمايد پيمانكار می تواند  نسبت به ارائه صورت وضعيت قطعي اقدام وكارفرما پس از كسر كسورات قانوني وپيمانكاري نسبت به پرداخت وتسويه حساب اقدام خواهند نمود.</p>
        <p>3. <?=nl2br($param['trade']['specInfo']['data']['pishpardakht'])?></p>
        <p>4. درصورت ارائه نرم افزار تهيه صورت وضعيت توسط کارفرما ، پيمانکار مکلف به ارائه صورت وضعيت با نرم افزار فوق خواهد بود.</p>
        <p>5. در صورت ارائه گواهي نامه ثبت نام موديان مالياتي <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?> در صد عوارض و ماليات بر ارزش افزوده به پيمانكار پرداخت خواهد شد.</p>
        <span style="font-weight:bold">12. دستگاه نظارت :  </span>    
        <p><?=nl2br($param['trade']['specInfo']['data']['nezarat'])?></p>
        <span style="font-weight:bold">13. جريمه تأخير وخسارت  :  </span>
        <p><?=nl2br($param['trade']['specInfo']['data']['jarimeKhesarat'])?></p>
        <span style="font-weight:bold">14. تغيير مقادير كار  :</span>
        <p>   كارفرما ميتواند مقدار احجام كارموضوع واگذاري رادرطول مدت قرارداد  تا <?=$param['trade']['specInfo']['data']['changeAmount']?> درصد مبلغ كل قرارداد كاهش يا افزايش دهد بدون اينكه دربهاي واحد وشرايط قرارداد تغييري حاصل شود وپيمانكار ملزم به قبول آن ميباشد.</p>

        <span style="font-weight:bold">15. شرايط تحويل كار  :</span>
        <p>پس از اتمام عمليات هر قسمت از اجراي پروژه وعودت اقلام مانده پايكاربه انبار شركت توزيع ( كارفرما)  ، بادرخواست پيمانكار كارهاي انجام شده تحويل دستگاه نظارت  كارفرما خواهدشد. كارهاي انجام شده توسط دستگاه نظارت كارفرما مورد بازديد قرارگرفته ودرصورت عدم مشاهده معايب يا نقائص فني با تنظيم صورتجلسه تحويل ( تحويل موقت ) انجام ميگيرد ودرصورت مشاهده نقائص ، مراتب توسط دستگاه نظارت كارفرما كتبا به پيمانكار ابلاغ ميشود وپيمانكار موظف است ظرف مدتي كه توسط دستگاه نظارت تعيين ميشود نسبت به رفع معايب ونقائص اقدام نمايد. هرگاه پيمانكار درانجام اين تعهد خود قصور ورزد يا مسامحه كند كارفرما حق دارد آن معايب يا نقائص را رأسا ويا به هر ترتيب كه مقتضي بداند رفع كند وهزينه آن را با اضافه 15%  بدون انجام تشريفات قضائي و اداري ازمحل تضمين حسن انجام تعهدات پيمانكار وساير مطالبات وي برداشت نمايد وپيمانكار حق هيچگونه اعتراضي نسبت به ميزان هزينه هاي به عمل آمده را نخواهدداشت. درصورتيكه مبلغ تضمين حسن انجام تعهدات ومطالبات پيمانكار تكافوي جبران  هزينه هاي فوق را ننمايد پيمانكار مكلف به پرداخت آن ميباشد.</p>
        <p>1. درصورت نياز کارفرما می تواند با توجه به شرايط کار نسبت به افزايش يا کاهش 25% مبلغ ريالی قرارداد اقدام نمايد .</p>
        <span style="font-weight:bold">15.  شرایط اختصاصی : </span>
        <p><?=nl2br($param['trade']['kharid_request']['data']['text_1'])?></p>
        <span style="font-weight:bold">16.  تعهدات طرفين : </span>
        <p><?=nl2br($param['trade']['kharid_request']['data']['text_2'])?></p>
        <p>17. كارفرما در رد يا قبول يك يا كليه پيشنهادات مختار است.</p>
    </div>
    <table width="90%">
        <tr>
            <td align="center">شركت توزيع نيروي بر ق آذربايجانغربي
                <br>
                اميني
                مدير امورتداركات
                <br>
                <?if($param['trade']['generalInfo']['data']['accept'] > 82)
                {
                    ?>
                    <img src="<?='../upload_files/'.$uRow->address?>" width="100">
                    <?
                }?>
            </td>
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
    <div  style="text-align: center; margin:20px auto 30px auto; font-size:15px;">برگ پيشنهاد قيمت استعلام بها شماره<?=$param['trade']['generalInfo']['data']['code']?></div>
    <p>شركت <?=$receiver['title']?>امضا كننده زير پس از مطالعه وبررسي كامل اسناد ومدارك شرايط  استعلام  مربوط به<?=''?> را  طبق شرايط وريز اقلام وقيمتهاي پايه(يك برگ فهرست بها پيوستي ) كه تمامي آن را امضا و مهر نموده وبادرنظر گرفتن كليه عوامل موجود ومؤثر دراين واگذاري ، اجراي دستمزدي  عمليات موضوع استعلام بها را بشرح ذيل  پيشنهاد مي نمايم. </p>
    <table cellspacing="0" cellpadding="2" width="100%">
        <tr>
            <td style="border:solid 1px #000; text-align: center;">ردیف</td>
            <td style="border:solid 1px #000; text-align: center;">شرح پروژه</td>
            <td style="border:solid 1px #000; text-align: center;">مقدار/ تعداد</td>
            <td style="border:solid 1px #000; text-align: center;">  قيمت كل دستمزد  برآوردي ( به ريال)</td>
            <td style="border:solid 1px #000; text-align: center;">درصدپلوس/ مينوس</td>
            <td style="border:solid 1px #000; text-align: center;">مبلغ كل پيشنهادي (به ریال)</td>
            <td style="border:solid 1px #000; text-align: center;"><?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?>درصد عوارض وماليات بر ارزش افزوده ( به ريال)</td>
            <td style="border:solid 1px #000; text-align: center;">جمع کل مبلغ پيشنهادي با اعمال <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?> درصد عوارض وماليات ارزش افزوده ( به ريال) به عدد وبه حروف </td>
        </tr>
        <?
        $tfiArr = $param['trade']['aghlam']['data']; 
        if(count($tfiArr)>0)
        { 
            $rowSpan = count($tfiArr);
            $counter = 0;
            $value = $tfiArr[0];
            ?>
            <tr>
                <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum($counter)?></td>
                <td style="border:solid 1px #000; text-align: center;"><?=$value['title']?></td>
                <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum($value['quantity']).' '.convertEnNum2FaNum($value['vahed'])?></td>
                <td style="border:solid 1px #000; text-align: center;" rowspan="<?=$rowSpan?>"><?=convertEnNum2FaNum(costFormat($param['trade']['aghlam']['sumCost']))?></td>
                <td style="border:solid 1px #000; text-align: center;" rowspan="<?=$rowSpan?>"></td>
                <td style="border:solid 1px #000; text-align: center;" rowspan="<?=$rowSpan?>"></td>
                <td style="border:solid 1px #000 ; text-align: center;" rowspan="<?=$rowSpan?>"></td>
                <td style="border:solid 1px #000; text-align: center;" rowspan="<?=$rowSpan?>"></td>
            </tr>
            <?
            for($i = 1; $i < $rowSpan; $i++)
            {
                $value = $tfiArr[$i];
                $counter++;
                ?>
                <tr>
                    <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum($counter)?></td>
                    <td style="border:solid 1px #000; text-align: center;"><?=$value['title']?></td>
                    <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum($value['quantity']).' '.convertEnNum2FaNum($value['vahed'])?></td>
                </tr>
                <?
            }
        }
        else
            echo '<tr><td colspan=9 style="border:solid 1px #000;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
        ?>

    </table>
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