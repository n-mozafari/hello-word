<?$jdf = new jdf()?>
<?
$tb = new businessTrade();
$ttb = new businessTrade_team();
$tableId = $param['trade']['generalInfo']['data']['id'];
$tRow = $tb->getRow("'$tableId'");
$ttResult = $ttb->select("trade_team.tradeId = '$tableId' and trade_team.userId = user.id", "", "", "trade_team.*, user.fname, user.lname, user.username", 'trade_team, user');
$frm_pmvb = new businessFrm_permission_module_value();
$ub = new businessUser();
$db = new businessDocuments();

$frm_pmvResult = $frm_pmvb->select("frm_permission_module.id = frm_permission_module_value.frm_permission_moduleId and frm_permission_module.systemKey = 'trade_team_sematType_$tRow->tradeTypeId'", '', '', 'frm_permission_module_value.title, frm_permission_module_value.value', 'frm_permission_module, frm_permission_module_value');
$frm_pmvArr = array();
while($frm_pmvRow = mysql_fetch_object($frm_pmvResult))
{
    $frm_pmvArr[$frm_pmvRow->value] = $frm_pmvRow->title;
}
$ttArr = array();
$username = array();
while($ttRow = mysql_fetch_assoc($ttResult))
{
    $uRow = $ub->getRow($ttRow['userId']);
    $ttRow['fileEmza'] = $uRow->fileEmza;
    $ttArr[$ttRow['sematType']][] = $ttRow;
    $username[] = $ttRow['username'];
}

mysql_select_db('core');
$postArr = array();
foreach($username as $user)
{
    $query = 'SELECT organization_posts.title FROM user,user_organization_posts, organization_posts WHERE user.id = user_organization_posts.userId and user_organization_posts.organization_postsId = organization_posts.id and user.username = '.$user;
    $result = mysql_query($query);
    $row = mysql_fetch_object($result);
    $postArr[$user] = $row->title;

}
mysql_select_db('trs');
//die(var_dump($ttArr));
$mainMembers = $ttArr[10]; 
$otherMembers = $ttArr[11]; 
$madovMembers = $ttArr[12]; 
$dabirMembers = $ttArr[13]; 
$nazerMembers = $ttArr[14]; 

$other['type']= 'clientSide';
?>
<br/>
<table cellspacing="0" cellpadding="5px" style="font-size: 11px;">
    <tr>
        <td>
            <table width="100%" cellspacing="0" cellpadding="5px">
            <?
            $jalaseDate = str_replace('-','/',$param['formValue']['jalaseDate']);
            $jalaseDate = reverseText($jalaseDate);
            ?>
                <tr>
                    <td style="border: 1px solid #000;">تاريخ: <?=$jalaseDate?></td>
                    <td align="center" style="border-top: 1px solid #000;">وزارت نيرو</td>
                    <td style="border-top: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;">شماره جلسه: <?=$param['formValue']['jalaseNumber']?></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">ساعت شروع: <?=$param['formValue']['jalaseStartHour']?></td>
                    <td align="center">شركت توزيع نيروي برق آذربايجانغربي</td>
                    <td style="border-right: 1px solid #000;border-left: 1px solid #000;">صفحه</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">ساعت ختم جلسه: <?=$param['formValue']['jalaseEndHour']?></td>
                    <td align="center">عنوان  جلسه</td>
                    <td style="border-right: 1px solid #000;border-left: 1px solid #000;">دستورات جلسه بعدي : <?=$param['formValue']['jalaseBadiDastoorat']?></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">محل جلسه: <?=$param['formValue']['jalasePlace']?></td>
                    <td align="center">كميسيون مناقصه</td>
                    <td align="center" style="border-right: 1px solid #000;border-left: 1px solid #000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">دبیرجلسه: <?=$param['formValue']['jalaseDabir']?></td>
                    <td style="border-bottom: 1px solid #000;"></td>
                    <td style="border-bottom: 1px solid #000; border-right: 1px solid #000;border-left: 1px solid #000;"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table cellpadding="5px" width="100%" style="border:1px solid #000;">
                <tr>
                    <td>اعضاي اصلي  كميسيون:
                        <?//$comission = $param['trade']['team']['data']['comission'];
                        $cArr = array();//die(var_dump($mainMembers));
                        foreach($mainMembers as $member)
                        {
                            $cArr[] = $member['fname'].' '.$member['lname'];
                        }

                        echo implode(' - ', $cArr);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>ساير اعضا ومدعوين :
                        <?
                        $cArr = array();
                        foreach($otherMembers as $member)
                        {
                            $cArr[] = $member['fname'].' '.$member['lname'];
                        }

                        foreach($madovMembers as $member)
                        {
                            $cArr[] = $member['fname'].' '.$member['lname'];
                        }

                        echo implode(' - ', $cArr);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>ناظر :   
                        <?
                        $cArr = array();
                        foreach($nazerMembers as $member)
                        {
                            $cArr[] = $member['fname'].' '.$member['lname'];
                        }

                        echo implode(' - ', $cArr);
                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table cellpadding="5px" cellspacing="0">
                <tr>
                    <td style="border:1px solid #000;" width="100%">موضوعات ونكات بحث شده درجلسه</td>
                </tr>
                <tr>
                    <td style="border:1px solid #000;">
                        <table cellpadding="5px">
                            <tr>
                                <td>كميسيون مناقصه شركت براي تائيدكفايت اسناد مناقصه <?=$param['trade']['generalInfo']['data']['title']?> تشكيل وبه شرح زيركفايت شرايط واسناد مناقصه <?=$param['trade']['specInfo']['data']['monagheseType']?> و <?=$param['trade']['specInfo']['data']['bargozaryType']?> زير مورد تاييد قرارگرفت .</td>
                            </tr>
                            <tr>
                                <td>
                                    <?
                                    $fehrestbaha_item_subjectArr = $param['trade']['aghlam']['data'];
                                    $subjectArr = $param['trade']['trade_subject']['data'];
                                    $scheduleArr = $param['trade']['schedule']['data']; 
                                    $scheduleQuantityArr = $param['trade']['schedule_quantity']['data'];  
                                    if($param['trade']['specInfo']['data']['aghlamShowInSooratjalase'] == 'ریز اقلام')
                                    {?>
                                        <table border="1" cellpadding="5px" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="center" width="30px" rowspan="2">رديف</td>
                                                <td align="center" rowspan="2">شرح کالا</td>
                                                <td align="center" rowspan="2">تعداد(دستگاه)</td>
                                                <td align="center" rowspan="2">قيمت واحد برآوردي (بريال )</td>
                                                <td align="center" rowspan="2">جمع کل</td>
                                                <td align="center" colspan="<?=count($scheduleArr)?>">جدول زمانبندی</td>
                                            </tr>
                                            <tr>
                                                <?
                                                foreach($scheduleArr as $tsId=>$tsRow)
                                                {
                                                    ?>
                                                    <td align="center"><?=$tsRow['title']?></td>
                                                    <?
                                                }?>
                                            </tr>
                                            <?
                                            $fehrestbaha_item_subjectArr = $param['trade']['aghlam']['data']; 
                                            $counter=0;
                                            foreach($fehrestbaha_item_subjectArr as $tsId=>$itemArr)
                                            {  
                                                foreach($itemArr as $item)
                                                {
                                                    //$item = $itemArr[$keys[$i]];
                                                    $counter++;
                                                    ?>
                                                    <tr>
                                                        <td align="center"><?=$counter?></td>
                                                        <td align="center"><?=str_replace('ء','',str_replace('_','-',str_replace('–','-',$item['title'])))?></td>
                                                        <td align="center"><?=number_format($item['quantity'])?></td>
                                                        <td align="center"><?=number_format($item['basePrice'])?></td>
                                                        <td align="center"><?=number_format($item['quantity'] * $item['basePrice'])?></td>
                                                        <?

                                                        foreach($scheduleArr as $id=>$tsRow)
                                                        {
                                                            ?>
                                                            <td align="center"><?=isset($scheduleQuantityArr[$item['id']][$id]['quantity']) ? number_format($scheduleQuantityArr[$item['id']][$id]['quantity']) : ''?></td>
                                                            <?
                                                        }?>
                                                    </tr>
                                                    <?
                                                }
                                            }
                                            ?>
                                        </table>
                                        <?
                                    }
                                    else
                                    {
                                        ?>
                                        <table border="1" cellpadding="5px" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="center" width="30px">رديف</td>
                                                <td align="center">شرح کالا</td>
                                                <td align="center">قيمت واحد برآوردي (بريال )</td>
                                            </tr>
                                            <?
                                            $subjectArr = $param['trade']['trade_subject']['data']; 
                                            $counter = 0;
                                            foreach($subjectArr as $subject)
                                            {  
                                                $counter++;
                                                ?>
                                                <tr>
                                                    <td align="center"><?=$counter?></td>
                                                    <td align="center"><?=str_replace('ء','',str_replace('_','-',str_replace('–','-',$subject['title'])))?></td>
                                                    <td align="center"><?=number_format($subject['baravard'])?></td>
                                                </tr>
                                                <?
                                            }
                                            ?>
                                        </table>
                                        <?
                                    }
                                    ?>

                                </td>
                            </tr>
                            <tr>
                                <td>1-مناقصه بصورت <?=$param['trade']['specInfo']['data']['monagheseType']?> و <?=$param['trade']['specInfo']['data']['bargozaryType']?> و <?=$param['trade']['specInfo']['data']['hasSampling']?> خواهد بود ودرصورت عدم ارسال نمونه يابيش ازيك نمونه براي هريك ازرديف هابه پيشنهادمربوطه ترتيب اثرداده نخواهدشد.</td>
                            </tr>
                            <tr>
                                <td>2-برآورد كل معامله <?=number_format($param['trade']['generalInfo']['data']['baravard'])?> ریال  ومنابع تامين مالي ازمحل <?=$param['trade']['kharid_request']['data']['credit']?> مي باشد.</td>
                            </tr>
                            <tr>
                                <td>3- قرارداد تيپ خريد كالا ، مختص موضوع مناقصه تهيه وتنظيم شده وضميمه اسناد مناقصه خواهد شد و <?=nl2br($param['trade']['specInfo']['data']['tadil'])?></td>
                            </tr>
                            <tr><td>4- کلیه شرکت کنندگان در مناقصه باید دارای <?=str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['peymankar_condition']))))?> باشند. <?=$param['trade']['specInfo']['data']['standardBase']?></td></tr>
                            <!--<tr>
                            <td><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['peymankar_condition'])))))?></td>
                            </tr>-->
                            <tr>
                                <td>5-تحويل در <?=$param['trade']['specInfo']['data']['tahvilKalaPlace']?> بوده وكليه كسورات قانوني وهزينه هاي حمل ونقل بعهده <?=$param['trade']['specInfo']['data']['kosoorat']?> بود وتخليه  <?=$param['trade']['specInfo']['data']['takhlie']?> خواهدبود.</td>
                            </tr>
                            <tr>
                                <td>6- مبلغ سپرده شرکت در مناقصه <?=$param['trade']['specInfo']['data']['seporde_calculation_type']?> محاسبه خواهدشدوبرنده مناقصه نيز <?=$param['trade']['specInfo']['data']['winner_selection_type']?> تعيين خواهدشد.</td>
                            </tr>
                            <tr>
                                <td>7-  برنده مناقصه از تاريخ افتتاح پاكات الف وب ( جلسه اول ) مناقصه حداكثر ظرف مدت سه ماه تعيين واعلام خواهد شد.</td>
                            </tr>
                            <tr>
                                <td>8- پيشنهاد قيمت مناقصه گران از زمان افتتاح پاکات الف وب ( جلسه اول )مناقصه حداقل 3 ماه دارای اعتبار خواهد بود .
                                    توضيح : چنانچه مناقصه به علت اتمام مدت اعتبار پيشنهاد قيمت پيشنهاددهندگان تجديدشود .کارمزد اعلامی  از طرف بانک صادر کننده ضمانتنامه  بررسی ودروجه پيشنهاددهنده پرداخت خواهد شد.
                                </td>
                            </tr>
                            <tr>
                                <td>9-سپرده نفريانفرات دوم مناقصه پس ازاخذتضمين حسن انجام تعهدات وعقدقراردادبابرنده مناقصه آزادخواهدشد.</td>
                            </tr>
                            <tr>
                                <td>10-كالاي موضوع مناقصه از تاريخ آخرين تحويل حداقل  داراي <?=$param['trade']['specInfo']['data']['guaranteeDuration']?> دوره گارانتي خواهد بود  واز بابت تضمين اجراي آن سفته بانكي معادل ده درصد مبلغ كل قرارداد  از فروشنده دريافت ونگهداري خواهد شدودرغيراينصورت تضمين حسن انجام تعهدات قراردادتاپايان دوره گارانتي نگهداري خواهدشد.</td>
                            </tr>
                            <tr>
                                <td>11- <?=$param['trade']['specInfo']['data']['peyvast']?> ضمناجهت  بررسي هاي فني وبازرگاني ارائه كاتالوگ -تايپ تست وتمامي مستندات ومدارك مربوط به الزامات و... ازطرف پيشنهاددهنده الزاميست <?=$param['trade']['specInfo']['data']['arzyabi_keifi_monagheseGaran']?>
                                    <br> <?=$param['trade']['specInfo']['data']['arzyabi_keifi_description']?>
                                </td>
                            </tr>
                            <tr>
                                <td>12- درشرايط مناقصه صراحتاقيدشودكه پاكت لفافه وهريك ازپاکتهای ( الف وب وج) که لاک ومهرنداشته و هريک از مدارک مربوطه را در برنداشته باشندکامل نبوده ومردود می باشندو پاكتهاي مفتوح نشده عودت داده خواهد شد</td>
                            </tr>
                            <tr>
                                <td>13- پيشنهاددهندگان مكلفندقيمت  پيشنهادي برای هريک ازرديفهاي موضوع مناقصه را  به عدد و به حروف در برگ پيشنهاد قيمت درج نمايد پيشنهادهای مناقصه  بايد از هر حيث کامل وبدون قيد وشرط بوده ودارای  امضاهای مجاز پیشنهاد دهنده باشند وهيچ نوع ابهام ، خدشه عيب ونقص وقلم خوردگی  نداشته باشد وبه پيشنهادهايی که ناقص ، مشروط ، مبهم و خدشه دار وفاقد امضاهای مجاز پیشنهاد دهنده  بوده و داراي عيب ونقص وقلم خوردگی باشند در مناقصه ترتيب اثر داده نخواهد شد وپیشنهاد ابطال و مردود اعلام وکنار گذاشته خواهد شد .بديهی است درصورت برنده شدن هر گونه افزايش بعدی تحت هر عنوانی در صورتحسابهای ارسالی پذيرفته نخواهد بود .</td>
                            </tr>
                            <tr>
                                <td>14- فرم پیشنهاد قیمت که حاوی قیمت کل پیشنهادی مناقصه گر به عدد وحروف می باشد در زمره اسناد ومدارک مهم مناقصه محسوب می شود که اوراق وجداول مربوط به تجزيه بهای قیمت نیز در مواردی که لزوم به ارائه آن باشد مکمل فرم مذکور خواهد بود. درصورت تناقص بین حاصل ضرب مقدار وواحد بهای هر قلم با قیمت آن قلم ، قیمت کل آن قلم مبنا خواهد بود همچنین درصورت تناقص بین حاصل جمع قیمتهای کل اقلام با مبلغ پیشنهادی ، مبلغ پیشنهادی مبنا خواهد بود ودرصورت تناقص بین قیمت پیشنهادی به عدد وبه حروف ، پیشنهاد قیمت به حروف مبنا خواهد بود.</td>
                            </tr>
                            <tr>
                                <td>15- حداقل پیشنهادات واصله برای مناقصه مذکور ( برای بار اول ) نبايستی کمتر از <?=$param['trade']['specInfo']['data']['min_pishnahadat']?> پيشنهاد باشد در غير اينصورت مناقصه مذکور تجديد خواهد شد ضمنا
                                    پس از تعيين نفرات اول و دوم مناقصه ، تضمين شرکت در مناقصه نفرات بعدی مسترد خواهد شد .
                                </td>
                            </tr>
                            <tr>
                                <td>16- شرايط پرداخت : </td>
                            </tr>
                            <tr>
                                <td>الف) بعدازمبادله قراردادوبادرخواست فروشنده وارائه ضمانتنامه بانكي تا <?=$param['trade']['specInfo']['data']['pishpardakht']?> درصدمبلغ كل قراردادپيش پرداخت به فروشنده پرداخت خواهدشدومبلغ پيش پرداخت متناسبا ازصورتحساب هاي فروشنده كسروضمانتنامه مربوطه بعدازاتمام قرارداد(تحويل كل كالاي موضوع قرارداد)آزادوبه فروشنده مستردميگرددودرصورت درخواست فروشنده نسبت به تقليل ارزش ضمانتنامه متناسب باتحويل جنس اقدام خواهدشد.</td>
                            </tr>
                            <tr>
                                <td>توضيح: درصورتي كه فروشنده تا10(ده) روزبعدازابلاغ قراردادنسبت به درخواست پيش پرداخت اقدام ننمايدتاريخ ابلاغ قراردادملاك زمانبندي تحويل اجناس ومحاسبه جرائم خواهدبود.</td>
                            </tr>
                            <tr>
                                <td><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['pardakht'])))))?></td>
                            </tr>
                            <tr>
                                <td>17-جرايم تاخير:</td>
                            </tr>
                            <tr>
                                <td><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['jarayemeTakhir'])))))?></td>
                            </tr>
                            <tr>
                                <td>18-  ملاک ارزيابی فنی برای كالاي  موضوع مناقصه  برابر <?=$param['trade']['specInfo']['data']['paperCount']?> برگ مشخصات فني  پيوستي وتايپ تستهاي كارخانه سازنده (ارائه شده از طرف پيشنهاد دهنده گان ) ونمونه هاي ارسالي مناقصه گران خواهد بود. </td>
                            </tr>
                            <tr>
                                <td>19-  کف امتیاز فنی قابل قبول <?=$param['trade']['specInfo']['data']['kafeEmtiazeFani']?> و حداکثر امتیازات <?=$param['trade']['specInfo']['data']['hadeAksarEmtiaz']?> می باشدو ضریب تاثیر پذیری فنی <?=$param['trade']['specInfo']['data']['zaribTasirPaziri']?> درصد تعریف شده است.</td>
                            </tr>
                            <tr>
                                <td>20- قیمت تراز شده برای تعیین برندگان مناقصه با فرمول زیر محاسبه خواهد شد.<br>
                                    <span dir="ltr">(100 * قیمت پیشنهادی) / ( ( T – 100 ) * I - 100 )</span>
                                </td>
                            </tr>                                                                                                                                                 
                            <tr>
                                <td>21- از بابت تضمين حسن انجام تعهدات معادل <?=$param['trade']['specInfo']['data']['hosn_anjam_taahodat']?> درصد مبلغ کل قرارداد ضمانتنامه بانکی   ويا وجه نقد(واريز به حساب خريدار) از فروشنده اخذ خواهد شد.</td>
                            </tr>
                            <tr>
                                <td>22- شرایط اختصاصی: <br><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['kharid_request']['data']['text_1'])))))?></td>
                            </tr>
                            <tr>
                                <td>23- تعهدات طرفین: <br><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['kharid_request']['data']['text_2'])))))?></td>
                            </tr>
                            <tr>
                                <td>24- كارفرما در رد يا قبول يك يا كليه پيشنهادات مختار است.</td>
                            </tr>
                            <?
                            $tradeRow = $param['trade']['generalInfo']['data'];
                            if(count($mainMembers) > 0)
                            {?>
                                <tr>
                                    <td>اعضاي اصلي كميسيون مناقصه :آقايان وخانمها</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <?
                                            $i = 0;
                                            foreach($mainMembers as $member)
                                            {
                                                if($i%4==0)
                                                {
                                                    ?>
                                                    <tr>
                                                        <?
                                                    }
                                                    ?>
                                                    <td height="40px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                        <?if($tradeRow['varchar1_1'] == 1)
                                                        {?>
                                                        
                                                            <br><?=$db->getImageTag($member['fileEmza'], '', 100, '', '', $other);
                                                        }?>
                                                    </td>
                                                    <?
                                                    if($i%4==3 || $i == (count($mainMembers)-1))
                                                    {
                                                        ?>
                                                    </tr>
                                                    <?
                                                }
                                                $i++;
                                            }?>
                                        </table>
                                    </td>
                                </tr>
                                <?
                            }
                            if(count($otherMembers) > 0)
                            {?>
                                <tr>
                                    <td>ساير اعضا  :آقايان وخانمها</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <?
                                            $i = 0;
                                            foreach($otherMembers as $member)
                                            {
                                                if($i%4==0)
                                                {
                                                    ?>
                                                    <tr>
                                                        <?
                                                    }
                                                    ?>
                                                    <td height="40px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                        <?if($tradeRow['varchar1_1'] == 1)
                                                        {?>
                                                            <br><?=$db->getImageTag($member['fileEmza'], '', 100, '', '', $other);
                                                        }?>
                                                    </td>
                                                    <?
                                                    if($i%4==3 || $i == (count($otherMembers)-1))
                                                    {
                                                        ?>
                                                    </tr>
                                                    <?
                                                }
                                                $i++;
                                            }?>
                                        </table>
                                    </td>
                                </tr>
                                <?
                            }
                            if(count($dabirMembers) > 0)
                            {?>
                                <tr>
                                    <td>دبيركميسيون : </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <?
                                            $i = 0;
                                            foreach($dabirMembers as $member)
                                            {
                                                if($i%4==0)
                                                {
                                                    ?>
                                                    <tr>
                                                        <?
                                                    }
                                                    ?>
                                                    <td height="40px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                        <?if($tradeRow['varchar1_1'] == 1)
                                                        {?>
                                                            <br><?=$db->getImageTag($member['fileEmza'], '', 100, '', '', $other);
                                                        }?>
                                                    </td>
                                                    <?
                                                    if($i%4==3 || $i == (count($dabirMembers)-1))
                                                    {
                                                        ?>
                                                    </tr>
                                                    <?
                                                }
                                                $i++;
                                            }?>
                                        </table>
                                    </td>
                                </tr>
                                <?
                            }
                            if(count($nazerMembers) > 0)
                            {?>
                                <tr>
                                    <td>ناظر :</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <?
                                            $i = 0;
                                            foreach($nazerMembers as $member)
                                            {
                                                if($i%4==0)
                                                {
                                                    ?>
                                                    <tr>
                                                        <?
                                                    }
                                                    ?>
                                                    <td height="40px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                        <?if($tradeRow['varchar1_1'] == 1)
                                                        {?>
                                                            <br><?=$db->getImageTag($member['fileEmza'], '', 100, '', '', $other);
                                                        }?>
                                                    </td>
                                                    <?
                                                    if($i%4==3 || $i == (count($nazerMembers)-1))
                                                    {
                                                        ?>
                                                    </tr>
                                                    <?
                                                }
                                                $i++;
                                            }?>
                                        </table>
                                    </td>
                                </tr>
                                <?
                            }
                            if(count($madovMembers) > 0)
                            {?>
                                <tr>
                                    <td> مدعوین :آقايان وخانمها</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%">
                                            <?
                                            $i = 0;
                                            foreach($madovMembers as $member)
                                            {
                                                if($i%4==0)
                                                {
                                                    ?>
                                                    <tr>
                                                        <?
                                                    }
                                                    ?>
                                                    <td height="40px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                        <?if($tradeRow['varchar1_1'] == 1)
                                                        {?>
                                                            <br><?=$db->getImageTag($member['fileEmza'], '', 100, '', '', $other);
                                                        }?>
                                                    </td>
                                                    <?
                                                    if($i%4==3 || $i == (count($madovMembers)-1))
                                                    {
                                                        ?>
                                                    </tr>
                                                    <?
                                                }
                                                $i++;
                                            }?>
                                        </table>
                                    </td>
                                </tr>
                                <?}?>
                            <tr>
                                <td>كدفرم : : 1121FR002</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>