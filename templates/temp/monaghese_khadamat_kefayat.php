<?$jdf = new jdf()?>
<?
$tb = new businessTrade();
$ttb = new businessTrade_team();
$tableId = $param['trade']['generalInfo']['data']['id'];
$tRow = $tb->getRow("'$tableId'");
$ttResult = $ttb->select("trade_team.tradeId = '$tableId' and trade_team.userId = user.id", "", "", "trade_team.*, user.fname, user.lname, username", 'trade_team, user');
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
$mainMembers = $ttArr[10]; 
$otherMembers = $ttArr[11]; 
$madovMembers = $ttArr[12]; 
$dabirMembers = $ttArr[13]; 
$nazerMembers = $ttArr[14]; 
?>
<br/>
<table cellspacing="0" style="font-size: 11px;">
    <tr>
        <td>
            <table width="100%" cellspacing="0" cellpadding="5px">
                <tr>
                    <td style="border: 1px solid #000;">تاريخ: <?=str_replace('-','/',$param['formValue']['jalaseDate'])?></td>
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
             <table width="100%" style="border:1px solid #000;" cellpadding="5px" cellspacing="0">
                <tr>
                    <td>اعضاي اصلي  كميسيون:
                        <?//$comission = $param['trade']['team']['data']['comission'];
                        $cArr = array();
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
                        <table cellpadding="5px" cellspacing="0">
                            <tr>
                                <td>جلسه كميسيون مناقصه به منظور بررسي وتاييد كفايت اسناد مناقصه عمومي يك مرحله اي جهت <?=$param['trade']['generalInfo']['data']['title']?> تشكيل واسنادومشخصات فني مناقصه مذكور بشرح ذيل  مورد تائيد قرارگرفت :</td>
                            </tr>
                            <tr>
                                <td><span>الف )موضوع مناقصه </span><span>عبارتست از <?=$param['trade']['generalInfo']['data']['title']?> بشرح احجام كار وريز كارهاي اجرائي</span></td>
                            </tr>
                            <tr>
                                <td><span>ب ) برآورد ريالي وحجمي  معامله  :</span><br><span>1- انجام كارهاي موضوع مناقصه بشرح ذيل مطابق باجداول پيوستي جهت انجام كارهاي موضوع مناقصه تعيين گرديده  ميباشد .</span><br>نحوه ارائه قیمت در برگ پیشنهاد قیمت <?=$param['trade']['specInfo']['data']['cost_pishnahadType']?> می باشد.</td>
                            </tr>
                            <tr>
                                <td><?=$param['trade']['specInfo']['data']['fehrestbaha']?><br>
                                    <table border="1" cellpadding="5px" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center" width="30px">رديف</td>
                                            <td align="center">شرح کار</td>
                                            <td align="center">حجم</td>
                                            <td align="center">واحد</td>
                                            <td align="center" width="auto">مبلغ برآوردی به ریال</td>
                                        </tr>
                                        <?
                                        $fehrestbaha_itemArr = $param['trade']['aghlam']['data'];
                                        $counter = 0;
                                        foreach($fehrestbaha_itemArr as $item)
                                        {    
                                            $counter++;
                                            ?>
                                            <tr>
                                                <td align="center"><?=$counter?></td>
                                                <td align="center"><?=str_replace('ء','',str_replace('_','-',str_replace('–','-',$item['title'])))?></td>
                                                <td align="center"><?=number_format($item['quantity'])?></td>
                                                <td align="center"><?=$item['vahed']?></td>
                                                <td align="center"><?=number_format($item['totalCost'])?></td>
                                            </tr>
                                            <?
                                        }?>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>2- افزایش سالیانه: <br> <?=$param['trade']['specInfo']['data']['salary_increase']?></td>
                            </tr>
                            <tr>
                                <td><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['tamin'])))))?></td>
                            </tr>
                            <tr>
                                <td>ج ) شرايط اختصاصي مناقصه<br>1- مناقصه بصورت <?=$param['trade']['specInfo']['data']['monagheseType']?> و <?=$param['trade']['specInfo']['data']['bargozaryType']?> و در بين تمامي  شركتهاي داراي <?=$param['trade']['specInfo']['data']['peymankar_condition']?> برگزار خواهد شد و وپيشنهاد قيمت بصورت ارائه قيمت <?=$param['trade']['specInfo']['data']['cost_pishnahadType']?> ازطرف پيشنهاددهندگان  خواهد بود.</td>
                            </tr>
                            <tr>
                                <td>2- منابع مالي جهت انجام كارهاي موضوع مناقصه ازبودجه <?=$param['trade']['generalInfo']['data']['credit']?> شركت بوده ومبلغ برآوردي <?=number_format($param['trade']['generalInfo']['data']['baravard'])?> ریال مي باشد.</td>
                            </tr>
                            <tr>
                                <td>3- مدت و شرایط تمدید: <?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['tahvilKhadamatModat'])))))?></td>
                            </tr>
                            <tr>
                                <td>4- قرارداد تيپ مختص مناقصه تهيه وتنظيم وضميمه اسناد مناقصه خواهد شد </td>
                            </tr>
                            <tr>
                                <td>5- <?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['bime'])))))?></td>
                            </tr>
                            <tr>
                                <td>6- مبلغ سپرده شرکت در مناقصه بصورت <?=$param['trade']['specInfo']['data']['cost_sepordeType']?> محاسبه وبرنده مناقصه نيز <?=$param['trade']['specInfo']['data']['winner_selectionType']?> تعيين خواهدشد.</td>
                            </tr>
                            <tr>
                                <td>7- برنده مناقصه ازتاريخ افتتاح  پاكات (الف وب وج) مناقصه ظرف مدت حداكثرسه ماه تعيين واعلام خواهد شد</td>
                            </tr>
                            <tr>
                                <td>8- پيشنهاد قيمت مناقصه گران از زمان افتتاح پاکات( الف وب وج) مناقصه حداقل 3 ماه دارای اعتبار خواهد بود .</td>
                            </tr>
                            <tr>
                                <td>توضيح: چنانچه مناقصه به علت اتمام مدت اعتبار پيشنهاد قيمت پيشنهاد دهندگان تجديد شود كارمزد اعلامي از طرف بانك صادر كننده ضمانتنامه  بررسي ودر وجه پيشنهاد دهنده پرداخت خواهد شد.</td>
                            </tr>
                            <tr>
                                <td>9- سپرده نفريانفرات دوم مناقصه پس ازاخذتضمين حسن انجام تعهدات وعقدقراردادبابرنده مناقصه آزادخواهدشد. </td>
                            </tr>
                            <tr>
                                <td>10- ضمنا در شرايط مساوي، تعيين برنده با قرعه كشي خواهد بود </td>
                            </tr>
                            <tr>
                                <td>11- درشرايط مناقصه صراحتاقيدشودكه پاكت لفافه وهريك ازپاکتهای (الف وب وج) که لاک ومهرنداشته و هريک از مدارک مربوطه را در برنداشته باشندکامل نبوده ومردود می باشندو بدين ترتيب پاكتهاي مفتوح نشده عودت داده خواهد شد .</td>
                            </tr>
                            <tr>
                                <td>12- پيشنهاددهندگان مكلفندقيمت  پيشنهادي برای هريک ازرديفهاي موضوع مناقصه را  به عدد و به حروف در برگ پيشنهاد قيمت درج نمايد پيشنهادهای مناقصه  بايد از هر حيث کامل وبدون قيد وشرط بوده ودارای  امضاهای مجاز پیشنهاد دهنده باشند وهيچ نوع ابهام ، خدشه عيب ونقص وقلم خوردگی  نداشته باشد وبه پيشنهادهايی که ناقص ، مشروط ، مبهم و خدشه دار وفاقد امضاهای مجاز پیشنهاد دهنده  بوده و داراي عيب ونقص وقلم خوردگی باشند در مناقصه ترتيب اثر داده نخواهد شد وپیشنهاد ابطال و مردود اعلام وکنار گذاشته خواهد شد .بديهی است درصورت برنده شدن هر گونه افزايش بعدی تحت هر عنوانی در صورتحسابهای ارسالی پذيرفته نخواهد بود .</td>
                            </tr>
                            <tr>
                                <td>13- فرم پیشنهاد قیمت که حاوی قیمت کل پیشنهادی مناقصه گر به عدد وحروف می باشد در زمره اسناد ومدارک مهم مناقصه محسوب می شود که اوراق وجداول مربوط به تجزيه بهای قیمت نیز در مواردی که لزوم به ارائه آن باشد مکمل فرم مذکور خواهد بود. درصورت تناقص بین حاصل ضرب مقدار وواحد بهای هر قلم با قیمت آن قلم ، قیمت کل آن قلم مبنا خواهد بود همچنین درصورت تناقص بین حاصل جمع قیمتهای کل اقلام با مبلغ 
                                    پیشنهادی ، مبلغ پیشنهادی مبنا خواهد بود ودرصورت تناقص بین قیمت پیشنهادی به عدد وبه حروف ، پیشنهاد قیمت به حروف مبنا خواهد بود.
                                </td>
                            </tr>
                            <tr>
                                <td>14- حداقل پیشنهادات واصله برای مناقصه مذکور ( برای بار اول ) نبايستی کمتر از <?=$param['trade']['specInfo']['data']['min_pishnahad']?> پيشنهادبراي مناقصه باشد در غير اينصورت مناقصه مذکور تجديد خواهد شد ضمنا پس از تعيين نفرات اول و دوم مناقصه ، تضمين شرکت در مناقصه نفرات بعدی مسترد خواهد شد </td>
                            </tr>
                            <tr>
                                <td>15- شركت درمناقصه وتسليم پيشنهادات به منزله قبول آندسته ازآئين نامه هاومقررات دستگاه مناقصه گذاركه مربوط به موضوع مناقصه است، خواهد بود .</td>
                            </tr>
                            <tr>
                                <td>16- پرداخت هرگونه كسور قانوني وعوارضي كه دراجراي قرارداد ناشي ازاين مناقصه به قرارداد تعلق گيرد به عهده پيمانكار مي باشد . </td>
                            </tr>
                            <tr>
                                <td>17- درصورت ارائه گواهينامه ثبت نام موديان مالياتي <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?> (<?=numToString($param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100)?>) درصد عوارض وماليات برارزش افزوده به پيمانكار پرداخت خواهد شد . </td>
                            </tr>
                            <tr>
                                <td>18- مبناي ارائه قيمت برای پروژه هاي موضوع  مناقصه برابر <?=$param['trade']['specInfo']['data']['paperCount']?> (<?=numToString($param['trade']['specInfo']['data']['paperCount'])?>)  برگ فهرست ريز اقلام پيوستی خواهد بود وپيشنهاد دهنده  ميبايست نسبت به ارائه قیمت در برگ پيشنهاد اقدام نمايد .</td>
                            </tr>
                            <tr>
                                <td>19- پيشنهاددهندگان مكلفندقيمت  پيشنهادي برای هريک ازرديفهاي موضوع مناقصه را  به عدد و به حروف در برگ پيشنهاد قيمت درج نموده و درپاكت مربوطه قراردهند پيشنهادهای مناقصه  بايد از هر حيث کامل وبدون قيد وشرط بوده ودارای  امضاهای مجاز پيشنهاد دهنده باشند وهيچ نوع ابهام ، خدشه عيب ونقص وقلم خوردگی  نداشته باشد وبه پيشنهادهايی که ناقص ، مشروط ، مبهم و خدشه دار وفاقد امضاهای مجاز پيشنهاد دهنده  بوده و داراي عيب ونقص وقلم خوردگی باشند در مناقصه ترتيب اثر داده نخواهد شد وپيشنهاد ابطال و مردود اعلام وکنار گذاشته خواهد شد . پيشنهاددهنده مکلف خواهد بود برابر برگ پيشنهاد قيمت پيوستی عوارض وماليات بر ارزش افزوده را در قيمت پيشنهادی خود لحاظ نمايد . بديهی است درصورت برنده شدن هر گونه افزايش بعدی تحت هر عنوانی در صورتحسابهای ارسالی پذيرفته نخواهد بود . وبرنده مناقصه ميتواند صورتحسابهای مربوطه را با تفکيک مبلغ ودرصدهای عوارض وماليات ارائه نمايد ولی در نهايت بهای واحددرصورتحسابها بايستی همان مبلغ اعلام شده در برگ پيشنهاد قيمت باشد</td>
                            </tr>
                            <tr>
                                <td>20- به تشخيص كمسيون مناقصه به پيشنهادهاي غيرمنطقي ترتيب اثرداده نخواهد شد وازمناقصه كنارگذاشته خواهد شد . <?=$param['trade']['specInfo']['data']['winner_selection_melak']?> براي هريك ازرديف هاي موضوع مناقصه ميباشد . </td>
                            </tr>
                            <tr>
                                <td>21- <?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['winner_selection_description'])))))?></td>
                            </tr>
                            <tr>
                                <td>22- دستگاه مناقصه گزار ميتواند حجم کارهاي  موضوع مناقصه را در طول مدت قرارداد تا <?=$param['trade']['specInfo']['data']['changeAmount']?> درصد مبلغ کل قرارداد کاهش يا افزايش دهد بدون اينکه دربهای واحد وشرايط انجام كار تغييری حاصل شود وپيمانکار ملزم به قبول آن ميباشد .</td>
                            </tr>
                            <tr>
                                <td>23- به منظور تضمين حسن انجام تعهدات پيمانكار مكلف است همزمان با امضاي قرارداد ضمانتنامه بانكي  ويا واريز وجه نقد معادل <?=$param['trade']['specInfo']['data']['hosnAnjamTaahodatAmount']?> درصد مبلغ كل قرارداد به كارفرما تسليم نمايد .تضمين مذكور به موقع اتمام عمليات موضوع قرارداد (تحويل موقت كليه  پروژه )  بادرخواست پيمانكار وتائيد دستگاه نظارت كارفرماو ارائه مفاصاحساب ازسازمانهاي تامين اجتماعي ودارائي  آزاد خواهد شد.</td>
                            </tr>
                            <tr>
                                <td>24- میزان سپرده حسن انجام کار <?=$param['trade']['specInfo']['data']['hosn_seporde']?> درصد از مبلغ هرصورت وضعيت پيمانكار بعنوان سپرده حسن انجام كار كسر ونزد كارفرما نگهداري خواهد شد. نصف سپرده مذكور به موقع اتمام كارهاي موضوع قرارداد (تحويل موقت  پروژه  )ومابقي سپرده پس از انقضا دوره تضمين که مدت آن <?=$param['trade']['specInfo']['data']['guaranteeDuration']?> می باشد با درخواست پيمانكار وپس از تائيد دستگاه نظارت وارائه مفاصاحساب از سازمانهاي تامين اجتماعي ودارايي آزادودروجه پيمانكار پرداخت خواهد شد.</td>
                            </tr>
                            <tr>
                                <td>25- اجرای عمليات موضوع قرارداد  هيچ نوع حق يا رابطه استخدامی برای پيمانکار و کارگران او در شرکت توزيع نيروی برق آذربايجانغربی ايجاد نمی نمايد و صرفا برای انجام کارهای موضوع قرارداد  مطابق با شرايط تصريح شده ميباشد.</td>
                            </tr>
                            <tr>
                                <td>26- تعديل: <?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['tadil'])))))?></td>
                            </tr>
                            <tr>
                                <td>27- محل اجراي عمليات موضوع مناقصه : <?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['tahvilKhadamatPlace'])))))?></td>
                            </tr>
                            <tr>
                                <td>28- دستگاه نظارت : <?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['nezarat'])))))?></td>
                            </tr>
                            <tr>
                                <td>29- اقلام خارج ازقرارداد : <?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['kharejAzGharardad'])))))?></td>
                            </tr>
                            <tr>
                                <td>30- شرايط پرداخت : </td>
                            </tr>
                            <tr>
                                <td>الف) بعدازمبادله قراردادوبادرخواست پيمانكار وارائه ضمانتنامه بانكي تا10درصدمبلغ كل قراردادپيش پرداخت به پيمانكار پرداخت خواهدشدومبلغ پيش پرداخت متناسباازصورت وضعيتهاي هاي پيمانكار كسروضمانتنامه مربوطه بعدازاتمام قرارداد (تحويل موقت پروژه) آزادوبه پيمانكارمستردميگرددودرصورت درخواست  نسبت به تقليل ارزش ضمانتنامه متناسب باتحويل جنس اقدام خواهدشد.</td>
                            </tr>
                            <tr>
                                <td>ب) کليه پرداختها به پيمانکاركه در ارتباط با عمليات موضوع قرارداد می باشد برابر صورت وضعيت های  تنظيمی باتوجه به درصدپيشرفت فيزيكي که به تائيد  دستگاه نظارت  رسيده باشد ، انجام خواهد گرفت .</td>
                            </tr>
                            <tr><td>ج) <?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['otherCondition_pardakht'])))))?></td></tr>
                            <tr>
                                <td>تبصره :در صورت ارائه نرم افزار تهيه صورت وضعيت توسط كارفرما ،پيمانكار مكلف به اجراي نرم افزار مذكور خواهد بود.</td>
                            </tr>
                            <tr>
                                <td>31- پيمانكار متعهد است به هنگام اتمام قرارداد مفاصاحساب مربوط به كسور قانوني قرارداد راازسازمانهاي تامين اجتماعي واداره كل امورمالياتي اخذ وبه كارفرما ارائه نمايد . </td>
                            </tr>
                            <tr>
                                <td>32- خسارت وجريمه تاخير در اجراي كار</td>
                            </tr>
                            <tr>
                                <td><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['jarimeKhesarat'])))))?></td>
                            </tr>
                            <tr>
                                <td>د) شرايط اختصاصي :</td>
                            </tr>
                            <tr>
                                <td><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['kharid_request']['data']['text_1'])))))?></td>
                            </tr>
                            <tr>
                                <td>ه) تعهدات طرفين : </td>
                            </tr>
                            <tr>
                                <td><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['kharid_request']['data']['text_2'])))))?></td>
                            </tr>
                            <tr>
                                <td>و) كارفرمادرردياقبول يك ياكليه پيشنهادات مختاراست.</td>
                            </tr>
                            <tr>
                                <td>اعضاي اصلي كميسيون مناقصه :آقايان وخانمها</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%">
                                        <?
                                        $i = 0;
                                        $tradeRow = $param['trade']['generalInfo']['data'];
                                        foreach($mainMembers as $member)
                                        {
                                            if($i%4==0)
                                            {
                                                ?>
                                                <tr>
                                                    <?
                                                }
                                                ?>
                                                <td height="50px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                <?if($tradeRow['varchar1_1'] == 1)
                                                {?>
                                                <br><?=$db->getImageTag($member['fileEmza'], '', 100);
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
                            <tr>
                                <td>ساير اعضا :آقايان وخانمها</td>
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
                                                <td height="50px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                <?if($tradeRow['varchar1_1'] == 1)
                                                {?>
                                                <br><?=$db->getImageTag($member['fileEmza'], '', 100);
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
                            <tr>
                                <td>مدعوین :آقايان وخانمها</td>
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
                                                <td height="50px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                <?if($tradeRow['varchar1_1'] == 1)
                                                {?>
                                                <br><?=$db->getImageTag($member['fileEmza'], '', 100);
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
                                                <td height="50px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                <?if($tradeRow['varchar1_1'] == 1)
                                                {?>
                                                <br><?=$db->getImageTag($member['fileEmza'], '', 100);
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
                                                <td height="50px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                <?if($tradeRow['varchar1_1'] == 1)
                                                {?>
                                                <br><?=$db->getImageTag($member['fileEmza'], '', 100);
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