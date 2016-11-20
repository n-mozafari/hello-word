<?$jdf = new jdf()?>
<br/>
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto; font-size: 11px;">
    <table width="100%">
        <tr>
            <td align="center" width="33%"><img src="<?=$_SESSION['uri'].$_SERVER["HTTP_HOST"]?>/core/images/logo/document_logo.png" width="100px" alt="<?=$_SESSION['companyTitle']?>"></td>
            <td align="center" width="33%"><?=$_SESSION['companyTitle']?></td>
            <td align="center" width="33%">شماره : <?=$param['formValue']['number']?>
                <?$date = str_replace('-','/',$param['formValue']['date']);
                //$date = reverseText($date);
                ?>
                <br>
                تاریخ: <?=$date?>
            </td>
        </tr>
    </table> 
    <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:15px;"><strong>شرايط ومشخصات مناقصه <?=$param['trade']['specInfo']['data']['monagheseType']?> <?=$param['trade']['specInfo']['data']['bargozaryType']?> شماره <?=$param['trade']['generalInfo']['data']['code']?></strong></div>
    <div>الف ) موضوع مناقصه : 
        موضوع مناقصه عبارتست از <?=$param['trade']['generalInfo']['data']['title']?> به شرح مندرج در پيوست شماره يك منضم به اسناد مناقصه و برابر <?=$param['trade']['specInfo']['data']['paperCount']?> برگ نقشه و مشخصات فني <br>مناقصه <?=$param['trade']['specInfo']['data']['hasSampling']?> وبصورت <?=$param['trade']['specInfo']['data']['bargozaryType']?> برگزار خواهد شد. <?=$param['trade']['specInfo']['data']['standardBase']?></div>
    <div>ب )  مناقصه گزار ( کارفرما ):  شرکت توزيع نيروی برق آذربايجانغربی
    </div>
    <div>ج ) شرايط عمومی مناقصه :
        <p>مناقصه بصورت <?=$param['trade']['specInfo']['data']['monagheseType'] .' '.$param['trade']['specInfo']['data']['bargozaryType']?> برگزار خواهد شد. 
            <br>
        <?=$param['trade']['specInfo']['data']['peymankar_condition']?></p>
        <p>پيشنهاد قيمت بصورت ارائه قيمت  <?=$param['trade']['specInfo']['data']['cost_pishnahad_type']?> ازطرف پيشنهاددهندگان  خواهد بود.</p>
        <p>1- سپرده شرکت در مناقصه به مبلغ كل <?=number_format($param['trade']['generalInfo']['data']['tazmin_cost'])?> ريال  بشرح جدول ذيل می باشد که بايستی به يکی از صورتهای مشروحه ذيل همراه با اسناد مناقصه درپاکت الف به دستگاه مناقصه گزار تسليم شود</p>
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
                    <td align="center" colspan="<?=count($scheduleArr)?>">زمان بندي تحويل</td>
                    <td align="center" rowspan="2">سپرده شرکت در مناقصه (ریال)</td>
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

                $counter = 0;
                foreach($fehrestbaha_item_subjectArr as $tsId=>$itemArr)
                {  
                    $counter++;
                    $keys = array_keys($itemArr);
                    $item0 = $itemArr[$keys[0]];
                    ?>
                    <tr>
                        <td align="center"><?=$counter?></td>
                        <td align="center"><?=str_replace('ء','',str_replace('_','-',str_replace('–','-',$item0['title'])))?></td>
                        <td align="center"><?=number_format($item0['quantity'])?></td>
                        <?

                        foreach($scheduleArr as $id=>$tsRow)
                        {
                            ?>
                            <td align="center"><?=isset($scheduleQuantityArr[$item0['id']][$id]['quantity']) ? number_format($scheduleQuantityArr[$item0['id']][$id]['quantity']) : ''?></td>
                            <?
                        }
                        ?>
                        <td align="center" rowspan="<?=count($itemArr)?>"><?=number_format($subjectArr[$tsId]['tazmin_cost'])?></td>
                    </tr>
                    <?
                    for($i = 1; $i < count($keys); $i++)
                    {
                        $item = $itemArr[$keys[$i]];
                        $counter++;
                        ?>
                        <tr>
                            <td align="center"><?=$counter?></td>
                            <td align="center"><?=str_replace('ء','',str_replace('_','-',str_replace('–','-',$item['title'])))?></td>
                            <td align="center"><?=number_format($item['quantity'])?></td>
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
                    <td align="center">قيمت برآوردي (ريال )</td>
                    <td align="center">سپرده شرکت در مناقصه (ریال)</td>
                </tr>
                <? 
                $counter = 0;
                foreach($subjectArr as $tsId=>$subject)
                {  
                    $counter++;
                    ?>
                    <tr>
                        <td align="center"><?=$counter?></td>
                        <td align="center"><?=str_replace('ء','',str_replace('_','-',str_replace('–','-',$subject['title'])))?></td>
                        <td align="center"><?=number_format($subject['baravard'])?></td>
                        <td align="center"><?=number_format($subject['tazmin_cost'])?></td>
                    </tr>
                    <?
                }
                ?>
            </table>
            <?
        }
        ?>
        <!--<table cellpadding="5px" cellspacing="0" width="100%">
        <tr>
        <td style="text-align: center; border:1px solid #000;">ردیف</td>
        <td style="text-align: center; border:1px solid #000;">شرح کالا</td>
        <td style="text-align: center; border:1px solid #000;">تعداد</td>
        <td style="text-align: center; border:1px solid #000;">زمانبندی تحویل کالا</td>
        <td style="text-align: center; border:1px solid #000;">مبلغ سپرده شرکت در مناقصه</td>

        </tr>
        <?
        $tfiArr = $param['trade']['aghlam']['data']; 
        if(count($tfiArr)>0)
        { 
            $counter = 0;
            $sumQuantity = 0;
            foreach($tfiArr as $value)
            {
                $sumQuantity += $value['quantity'];
                $counter++;
                ?>
                <tr>

                <td style="text-align: center; border:1px solid #000; vertical-align: middle;"><?=convertEnNum2FaNum($counter)?></td>
                <td style="text-align: center; border:1px solid #000;"><?=str_replace('ء','',str_replace('_','-',str_replace('–','-',$value['title'])))?></td>
                <td style="text-align: center; border:1px solid #000;"><?=convertEnNum2FaNum(number_format($value['quantity']))?></td>
                <td style="text-align: center; border:1px solid #000;"><?=''?></td>
                <td style="text-align: center; border:1px solid #000;"><?=''?></td>

                </tr>
                <?
            }
            ?>
            <tr>
            <td style="text-align: center; border:1px solid #000;"></td>
            <td style="text-align: center; border:1px solid #000;">جمع کل</td>
            <td style="text-align: center; border:1px solid #000;"><?=convertEnNum2FaNum(number_format($sumQuantity))?></td>
            <td style="text-align: center; border:1px solid #000;"><?=''?></td>
            <td style="text-align: center; border:1px solid #000;"><?=''?></td>
            </tr>
            <?
        }
        else
            echo '<tr><td colspan=6 "><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
        ?>

        </table>-->

        <br>توضيح  : مبلغ سپرده شرکت در مناقصه بصورت <?=$param['trade']['specInfo']['data']['seporde_calculation_type']?> محاسبه شده وبرنده مناقصه نيز <?=$param['trade']['specInfo']['data']['winner_selection_type']?> تعيين خواهدشد.
    </div>

    <div><span>الف :</span><span>  رسيد بانکي واريز وجه به حساب سيباشماره 0105592677009 نزد  بانک ملي شعبه برق اروميه ( کد 5133 ) به نشانی اروميه ـ خيابان شهيد باکری ـ ساختمان اداری مديريت برق اروميه</span><span>ب :</span><span> چک تضمين شده بانکی به نفع خريدار</span><span>در صورتيکه نفر اول مناقصه از ارائه ضمانتنامـــه حسن انجام تعهدات ( ظرف مدت ده روز از تاريخ ابلاغ نتيجه ) يا عقد قرارداد امتناع ورزد , ضمانتنامه ( سپرده ) شرکت در مناقصه ايشان به نفع خريدار ضبط و خريدار با نفر دوم وارد معامله خواهد شد و چنانچه نفر دوم با توجه به موارد يادشده بالاحاضر به انعقاد قرارداد نشود تضمين شرکت در مناقصه او هم به نفع خريدار ضبط خواهد شد.</span></div>
    <div>ـ حداکثر مدت  نگهداری سپرده نفر دوم از تاريخ افتتاح پاکات ( الف و ب  و ج ) مناقصه سه ماه می باشد.</div>
    <div><span>توضيح شماره 1:</span><span> پيشنهاددهندگانی که ضمانتنامه از موسسات اعتباری دريافت ميدارند بايستی تائيديه بانک مرکزی مبنی براينکه موسسه اعتباری صادر کننده ضمانتنامه مجوز صدور ضمانتنامه را دارد را نيز ضميمه نمايند</span><br><span>توضيح شماره 2:</span><span> چک هاي جاری و شخصي و نظاير آن به عنوان سپرده شركت در مناقصه پذيرفته نخواهد شد و همچنين پيشنهادهاي فاقد سپرده ، سپرده هاي مخدوش و سپرده هاي كمتر از ميزان مقرر قابل قبول نبوده و موجب ابطال پيشنهاد خواهد بود</span><br><span>توضيح شماره3:</span><span> پيشنهاد دهندگانی که قصد تامين سپرده شرکت در مناقصه مذکور را از محل مطالبات خود در شرکت توزيع برق آذربايجانغربي دارند . موظفند تصوير سند مالی مربوطه را به همراه ساير اسناد و مدارک مناقصه در پاکت الف قرار دهند. در غير اينصورت به درخوا ستهای کتبي که فاقد اقدام امور مالی اين شرکت باشند ترتيب اثر داده نخواهد شد</span><br><span>توضيح شماره 4 :</span><span>سپرده هايی که از محل مذکور تامين شوند و در صورتيکه شرکت کننده در مناقصه جزو نفرات اول و دوم نباشد پس از يک هفته از تاريخ برگزاری مناقصه مسترد خواهد شد</span><br><span>توضيح شماره 5 :</span><span> چنانچه مناقصه فوق الذکر به دليل پايان مدت اعتبار پيشنهادها تجديد  شود، کارمزد اعلامی از طرف بانک صادر کننده ضمانتنامه که پيشنهاددهنده از آن ضمانتنامه دريافت کرده است بررسی و به پيشنهاددهنده پرداخت خواهد شد</span></div>
    <div>2- محل ، تاريخ وطرز تسليم پيشنهادات</div>
    <div><span>داوطلب شرکت درمناقصه بايد پيشنهاد خود را</span><span> دريک پاکت لفاف سربسته لاك ومهر شده که محتوی سه( 3 ) پاکت جداگانه الف، ب وج  لاك و مهر شده می باشد وبه ترتيب بندهای بعدی تنظيم وتا ساعت <?=numToString($param['trade']['specInfo']['data']['tahvilPakatHour'])?> ( <?=$param['trade']['specInfo']['data']['tahvilPakatHour']?>) روز <?=$param['trade']['specInfo']['data']['tahvilPakatDay']?> مورخ <?=str_replace('-', '/', $jdf->g2j($param['trade']['specInfo']['data']['tahvilPakatDate']))?> به دبيرخانه   شرکت توزيع نيروی برق آذربايجانغربی واقع در اروميه خيابان سربازان گمنام ( برق سابق ) نرسيده به ميدان مخابرات تسليم ورسيد دريافت دارند.</span></div>
    <div>درروی پاکت فوق الذکر بايد موضوع مناقصه ، نام ونشانی پيشنهاد دهنده وتاريخ تسليم پيشنهادنوشته شود ودرمهلت مقرر با اخذ رسيد حاوی ساعت وتاريخ وصول به دبيرخانه ( اتاق  101  )  دستگاه مناقصه گزار تسليم گردد.</div>
    <div>منظور از پيشنهاد مناقصه ، تمام اسناد ومدارک مشروحه دربندهای 3و4 و 5ذيل است که بايد حسب مورد درداخل يکی از  سه پاکت الف ، ب و ج  قرارداده شود.</div>
    <div>توضيح : پاكت لفافه وهريك ازپاکتهای (الف وب وج) که لاک ومهرنداشته و هريک از مدارک مربوطه را در برنداشته باشندکامل نبوده ومردود می باشندو پاكتهاي مفتوح نشده عودت داده خواهد شد .</div>
    <div><span>ـ قابل توجه :</span><span>به پيشنهاداتی که بعد ازساعت مقرر به دبيرخانه دستگاه مناقصه گزار تحويل داده شود ، ترتيب اثر داده نخواهدشد .</span></div>
    <div>3- مدارک واسنادی که بايد درپاکت الف قرارداده شود عبارتنداز:<br>1-3- تضمين شرکت درمناقصه که طبق شرح مندرج دربند يک فوق تهيه گرديده ودرصورت قصد ارائه تضمين شرکت درمناقصه بصورت ضمانتنامه بانکی بايد طبق نمونه ارائه شده تهيه وتسليم گردد.</div>
    <div>4- مدارک واسنادی که بايد درپاکت ب قرارداده شود عبارتنداز:<br>1-4- برگهای مهر وامضا شده شرايط مناقصه وپيوستهای منضم به شرايط مناقصه <br>2-4- نمونه فرم مهر وامضا شده ضمانتنامه ( شرکت در مناقصه ، حسن انجام تعهدات ، واسترداد کسور وجه ضمان و پيش پرداخت)<br>3-4- برگ مهر وامضا شده تعهد نامه اجرا وپذيرش مسئوليت های ناشی از اسناد ومدارک مناقصه<br>4-4- رونوشت مصدق اساسنامه ، وروزنامه رسمی ( آگهی تاسيس وآگهی آخرين تغييرات مربوط به انتخاب مدير عامل و اعضا هيئت مديره در مورد دارندگان امضای مجاز پيشنهاد دهنده برای اسناد مالی وتعهد آور بطوريکه مدت اختيارات دارندگان امضای مجاز، مدير عامل و هيئت مديره خاتمه نيافته باشدو در صورتيكه مدت اعتبار هيئت مديره و دارندگان حق امضا خاتمه يافته باشد پاكت پيشنهادي مفتوح نخواهد شد ) به همراه گواهی امضا ثبت شده در دفاتر اسناد رسمی . کپی شناسنامه وکارت ملی اعضای هيئت مديره ومديرعامل وبازرسان شرکت ( در مورد اشخاص حقوقی وشرکتها ) ـ تصوير برگ مجوز بهره برداری کارخانه يا کارگاه ( برای موسسات ، کارگاهها وکارخانه های پيشنهاد دهنده ) ـ کپی کارت ملی وبرگ اول ( درصورت داشتن توضيحات از برگ توضيحات ) شناسنامه پيشنهاددهنده (برای افراد حقيقی)</div>
    <div>توضيح : به استناد نامه شركت توانير به شماره 28046/94 مورخه 94/7/5 اخذ گواهي امضاي ثبت شده صاحبان امضاي مجاز در دفاتر اسناد رسمي الزامي مي باشد</div>
    <div>5-4- فرم مهر وامضا شده تعهد نامه منع مداخله کارکنان دولت در معاملات دولتی <br>6-4- قرارداد تيپ انجام عمليات موضوع مناقصه <br>7-4- ارائه تصوير كارت ملي اعضاي هيات مديره ،مدير عامل ،بازرسان وصاحبان سهام الزاميست<br>8-4- ارائه تصوير كارت اقتصادي جديد الزاميست <br>9-4- به استناد بند ز اطلاعيه شماره يك وزارت امور اقتصادي و دارايي در خصوص الزام قانوني تسليم صورتهاي مالي حسابرسي شده، پيشنهاد دهندگان بايد صورتهاي مالي حسابرسي شده رابه همراه اسناد مناقصه  ارائه نمايند </div>
    <div>5- پاکت  ج  محتوی برگ پيشنهاد قيمت</div>
    <div>1-5- پيشنهاددهندگان مكلفندقيمت  پيشنهادي برای هريک ازرديفهاي موضوع مناقصه را  به عدد و به حروف در برگ پيشنهاد قيمت درج نمايد پيشنهادهای مناقصه  بايد از هر حيث کامل وبدون قيد وشرط بوده ودارای  امضاهای مجاز پیشنهاد دهنده باشند وهيچ نوع ابهام ، خدشه عيب ونقص وقلم خوردگی  نداشته باشد وبه پيشنهادهايی که ناقص ، مشروط ، مبهم و خدشه دار وفاقد امضاهای مجاز پیشنهاد دهنده  بوده و داراي عيب ونقص وقلم خوردگی باشند در مناقصه ترتيب اثر داده نخواهد شد وپیشنهاد ابطال و مردود اعلام وکنار گذاشته خواهد شد .بديهی است درصورت برنده شدن هر گونه افزايش بعدی تحت هر عنوانی در صورتحسابهای ارسالی پذيرفته نخواهد بود .</div>
    <div>2-5- فرم پیشنهاد قیمت که حاوی قیمت کل پیشنهادی مناقصه گر به عدد وحروف می باشد در زمره اسناد ومدارک مهم مناقصه محسوب می شود که اوراق وجداول مربوط به تجزيه بهای قیمت نیز در مواردی که لزوم به ارائه آن باشد مکمل فرم مذکور خواهد بود. درصورت تناقص بین حاصل ضرب مقدار وواحد بهای هر قلم با قیمت آن قلم ، قیمت کل آن قلم مبنا خواهد بود همچنین درصورت تناقص بین حاصل جمع قیمتهای کل اقلام با مبلغ پیشنهادی ، مبلغ پیشنهادی مبنا خواهد بود ودرصورت تناقص بین قیمت پیشنهادی به عدد وبه حروف ، پیشنهاد قیمت به حروف مبنا خواهد بود.</div>
    <div>3-5- درصورت ارائه گواهينامه ثبت نام موديان مالياتي <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total']*100?> (<?=numToString($param['trade']['generalInfo']['data']['arzeshAfzoode_total']*100)?>) درصد عوارض وماليات برارزش افزوده به فروشنده پرداخت خواهد شد .</div>
    <div>4-5- پيشنهادهای مناقصه  بايد از هر حيث کامل وبدون قيد وشرط بوده ودارای  امضاهای مجاز پيشنهاد دهنده باشند وهيچ نوع ابهام ، خدشه عيب ونقص وقلم خوردگی  نداشته باشد وبه پيشنهادهايی که ناقص ، مشروط ، مبهم و خدشه دار وفاقد امضاهای مجاز پيشنهاد دهنده  بوده و داراي عيب ونقص وقلم خوردگی باشند در مناقصه ترتيب اثر داده نخواهد شد وپيشنهاد ابطال و مردود اعلام وکنار گذاشته خواهد شد . پيشنهاددهنده مکلف خواهد بود برابر برگ پيشنهاد قيمت پيوستی عوارض وماليات بر ارزش افزوده را در قيمت پيشنهادی خود لحاظ نمايد . بديهی است درصورت برنده شدن هر گونه افزايش بعدی تحت هر عنوانی در صورتحسابهای ارسالی پذيرفته نخواهد بود . وبرنده مناقصه ميتواند صورتحسابهای مربوطه را با تفکيک مبلغ ودرصدهای عوارض وماليات ارائه نمايد ولی در نهايت بهای واحددرصورتحسابها بايستی همان مبلغ اعلام شده در برگ پيشنهاد قيمت باشد</div>
    <div>5-5- به تشخيص كميسيون مناقصه به پيشنهادهاي غيرمنطقي ترتيب اثرداده نخواهد شد وازمناقصه كنارگذاشته خواهد شد . ضمناً ملاك تعيين برنده جمع كل مبلغ پيشنهادي دربرگ پيشنهاد قيمت براي هريك ازرديف هاي موضوع مناقصه ميباشد .</div>
    <div>6-5- قيمت های پيشنهادی پيشنهاددهندگان از تاريخ افتتاح پاکات ( الف  وب وج )  مناقصه بايستی  حداقل  سه  ماه  دارای اعتبار باشند.</div>
    <div>7-5- در شرايط مساوي، تعيين برنده با قرعه كشي خواهد بود </div>
    <div>6- حداقل پیشنهادات واصله برای مناقصه مذکور ( برای بار اول ) نبايستی کمتر از <?=$param['trade']['specInfo']['data']['min_pishnahadat']?> پيشنهادبراي مناقصه باشد در غير اينصورت مناقصه مذکور تجديد خواهد شد ضمنا پس از تعيين نفرات اول و دوم مناقصه ، تضمين شرکت در مناقصه نفرات بعدی مسترد خواهد شد</div>
    <div>7- شركت درمناقصه وتسليم پيشنهادات به منزله قبول آندسته ازآئين نامه هاومقررات دستگاه مناقصه گذاركه مربوط به موضوع مناقصه است، خواهد بود . </div>
    <div>8- پرداخت هرگونه كسور قانوني وعوارضي كه دراجراي قرارداد ناشي ازاين مناقصه به قرارداد تعلق گيرد به عهده فروشنده مي باشد . </div>
    <div>9- دستگاه مناقصه گزار ميتواند حجم کارهاي  موضوع مناقصه را در طول مدت قرارداد تا <?=$param['trade']['specInfo']['data']['afzayesh_kaheshe_gharardad']?> درصد مبلغ کل قرارداد کاهش يا افزايش دهد بدون اينکه دربهای واحد وشرايط انجام كار تغييری حاصل شود وفروشنده  ملزم به قبول آن ميباشد .</div>
    <div>10- برنده مناقصه موظف خواهد بود به موقع عقد قرارداد ضمانتنامه بانکی حسن انجام تعهدات به ميزان <?=$param['trade']['specInfo']['data']['hosn_anjam_taahodat']?> درصد مبلغ کل قرارداد را بعنوان تضمين حسن انجام تعهدات تسليم شرکت توزيع برق آذربايجانغربی نمايد  يا معادل مبلغ مذکور را نقدا به حسابی که خريدار تعيين می نمايد واريز ورسيد آن را ارائه نمايدکه  اين ضمانتنامه ظرف مدت حداكثر يكماه بعداز تحويل کليه موضوع قرارداد با تائيد نماينده خريدار آزاد و مسترد خواهد شد .</div>
    <div>11- اجرای عمليات موضوع قرارداد  هيچ نوع حق يا رابطه استخدامی برای فروشنده و کارگران او در شرکت توزيع نيروی برق آذربايجانغربی ايجاد نمی نمايد و صرفا برای انجام کارهای موضوع قرارداد  مطابق با شرايط تصريح شده ميباشد.</div>
    <div>12- تعديل: </div>
    <div><?=nl2br(str_replace('"', '', str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['tadil']))))?></div>
    <div>13-  مدت ومحل تحويل كالا:</div>
    <div>الف) مدت تحويل : <?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['modate_tahvil_description'])))))?></div>
    <div>ب) محل تحويل كالا: محل تحويل كالاي موضوع مناقصه : <?=$param['trade']['specInfo']['data']['tahvilKalaPlace']?> می باشد . هزينه بارگيری , حمل ، بيمه کالا و ساير هزينه های احتمالی <?=$param['trade']['specInfo']['data']['kosoorat']?> و هزينه تخليه <?=$param['trade']['specInfo']['data']['takhlie']?> خواهد بود.<br><?=nl2br($param['trade']['specInfo']['data']['mahale_tahvil_description'])?></div>
    <div>14- اقلام خارج ازقرارداد :</div>
    <div><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['kharejAzGharardad'])))))?></div>
    <div>15- گشايش پيشنهادات : ( پاکات الف وب وج مناقصه گران) </div>
    <?
    $monagheseJalase_date = str_replace('-', '/', $jdf->g2j($param['trade']['specInfo']['data']['monagheseJalase_date']));
    //$monagheseJalase_date = reverseText($monagheseJalase_date);
    ?>
    <div>جلسه مناقصه درساعت <?=$param['trade']['specInfo']['data']['monagheseJalase_hour']?> (<?=numToString($param['trade']['specInfo']['data']['monagheseJalase_hour'])?>) روز  <?=$param['trade']['specInfo']['data']['monagheseJalaseDay']?> مورخه  <?=$monagheseJalase_date?> درساختمان مرکزی شرکت واقع در اروميه خيابان سربازان گمنام ( برق سابق ) نرسيده به ميدان مخابرات تشکيل خواهدشد، حضور يک نفر نماينده تام الاختيار ازطرف هريک از پيشنهاد دهندگان درجلسه مناقصه آزاد است .</div>
    <div>16-  نماينده ای که درجلسه مناقصه حضورمی يابد معرفينامه معتبر مبنی برتام الاختيار بودن ( که با امضای دارندگان امضای مجاز صادر شده است ) را بايد به همراه داشته باشد. بهمين منظور  فرم شماره الف تهيه شده ودر داخل  اسناد مناقصه گذاشته شده است .</div>
    <div>17-شرايط تحويل وپرداخت :</div>
    <div>1- بعد از مبادله قرارداد درصورت درخواست فروشنده تا <?=$param['trade']['specInfo']['data']['pishpardakht']?> درصد مبلغ کل قرارداد پيش پرداخت در قبال ارائه ضمانتنامه بانکی به فروشنده پرداخت خواهد شد ومبلغ پيش پرداخت متناسبا از صورتحسابهای فروشنده مستهلک خواهد شد . ضمانت نامه مذکور نيز بعد از تحويل کل کالای موضوع مناقصه آزاد وبه فروشنده مسترد خواهد شد . و درصورت درخواست فروشنده نسبت به تقليل ارزش ضمانتنامه متناسب با تحويل جنس اقدام خواهد شد .</div>
    <div>2- <?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['pardakht'])))))?></div>
    <div>3- كليه اجناس و تجهيزات منصوبه بايستي نوبوده ومطابق  نقشه ومشخصات فني پيوستي قراردادودبسته بندي مناسب باشد</div>
    <div>4- هزينه بيمه بين راه و حوادث احتمالي ناشي از حمل و نقل به عهده <?=$param['trade']['specInfo']['data']['hazine_haml']?> بوده و خريدار تا تخليه محموله در محل انبار خود هيچ گونه مسئوليتی نخواهد داشت .</div>
    <div>18- دستگاه نظارت (نماینده) کارفرما : </div>
    <div><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['dastgahe_nezarate_karfarma'])))))?></div>
    <div>19- جريمه تاخير در تحويل كالا و پرداخت</div>
    <div><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['jarayemeTakhir'])))))?></div>
    <div>20- دوره تضمين : </div>
    <div>کيفيت وکارآئی  كالاهاي موضوع مناقصه از تاريخ تحويل آخرين پارتی قابل تحويل به مدت <?=$param['trade']['specInfo']['data']['guaranteeDuration']?> از طرف فروشنده تضمين ميگردد که اين دوره را دوره تضمين کالا می نامند به همين منظور فروشنده  مکلف است به موقع اتمام تحويل كالاي موضوع قرارداد از بابت دوره مذکور سفته بانکی به ميزان ده درصد مبلغ کل قرارداد به خريدار تسليم نمايد در غير اينصورت تضمين حسن انجام تعهدات قرارداد تا پايان دوره تضمين نگهداری خواهد شد .</div>
    <div>21- نحوه تعيين برنده </div>
    <div><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['specInfo']['data']['winner_selection_description'])))))?></div>
    <div>22- افزاايش ساليانه<br><?=$param['trade']['specInfo']['data']['salary_increase']?></div>
    <?
    $questionDate = str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['questionDate']));
    //$questionDate = reverseText($questionDate);

    $enserafDate = str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['enserafDate']));
    //$enserafDate = reverseText($enserafDate);
    ?>
    <div>23- هريک از دريافت کنندگان اسناد و مدارک مناقصه که نسبت به مفهوم اسناد و مدارک  مناقصه ابهامی داشته باشند , حداکثر بايد تا پايان وقت اداری مورخ <?=$questionDate?>  مراتب را کتبا به امور تدارکات  دستگاه مناقصه گزار اطلاع داده و تقاضای توضيح کتبی نمايند.</div>
    <div>24- هرگونه توضيح يا تجديد نظر يا حذف و اضافه نمودن اسناد و مدارک مناقصه و نحوه تغيير و تسليم آنها کتبا از سوی دستگاه مناقصه گزار اعلام و جزو اسناد و مدارک مناقصه منظور خواهد شد.</div>
    <div>25- مناقصه گزار حق تغيير , اصلاح و يا تجديد نظر در اسناد و مشخصات مناقصه را قبل از انقضای مهلت تسليم پيشنهادها برای خود محفوظ می دارد و اگر چنين موردی پيش آيد مراتب به دريافت کنندگان اسناد مناقصه , ابلاغ می شود و در صورتی که پيشنهادی قبل از ابلاغ مراتب مزبور تسليم شده باشد پيشنهاد دهنده حق دارد تقاضای استرداد آن را بنمايد , از آنجا که ممکن است تجديد نظر يا اصلاح در اسناد و مشخصات مستلزم تغيير مقادير يا قيمتها باشد, در اين صورت دستگاه مناقصه گزار می تواند آخرين مهلت دريافت را بااعلام کتبی به پيشنهاد دهندگان به تعويق اندازد به نحوی که آنان فرصت کافی برای اصلاح و تجديد نظر در پيشنهاد خود را داشته باشند.</div>
    <div>26 نام و نام خانوادگی و سمت امضا کنندگان , ذيل تمامی برگهای شرايط مناقصه و مشخصات فنی و برگ پيشنهاد قيمت بايد افرادی باشند که در آگهی آخرين تغييرات چاپ شده پيشنهاد دهنده در روزنامه رسمی  , به عنوان دارندگان امضای مجاز می باشند.</div>
    <div>27- دريافت کنندگان برگ های شرايط مناقصه چنانچه پس از خريد اسناد مناقصه , مايل به مشارکت در مناقصه نباشد, بايستی مراتب را با ذکر علت و تا آخر وقت اداری  مورخ <?=$enserafDate?> به دستگاه مناقصه گزار اطلاع دهند.</div>
    <div>28- پيشنهاد دهنده متعهد ميگردد درصورت برنده شدن درمناقصه مذکور ظرف مدت ده روز نسبت به تسليم ضمانتنامه حسن انجام تعهدات وامضای قرارداد درمحل شرکت اقدام نمايد . درغيراينصورت وپس از انقضای مهلت برابر بند يک  شرايط مناقصه عمل خواهد شد .به همين منظور حضور دارندگان حق امضا يا نماينده تام الاختيار جهت امضای قرارداد درمحل شرکت خريدارالزاميست . </div>
    <div>29-  به پيشنهاد شرکت کنندگان در مناقصه که به كالاي وارداتی ( خارجی ) قيمت داده باشند ترتيب اثر داده نخواهد شد</div>
    <div>30-  درطول مدت اجرای قرارداد فروشنده بدون موافقت واجازه کتبی خريدار حق واگذاری يا انتقال تمام يا قسمتی از تعهدات موضوع معامله را به شخص حقيقی يا حقوقی ديگر نخواهد داشت .</div>
    <div>د)شرايط اختصاصي مناقصه :</div>
    <div><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['kharid_request']['data']['text_1'])))))?></div>
    <div>ه ) تعهدات طرفين </div>
    <div><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$param['trade']['kharid_request']['data']['text_2'])))))?></div>
    <div>و) كارفرمادرردياقبول يك ياكليه پيشنهادات مختاراست .</div>
    <div style="width: 100%;">
        <table>
            <tr>
                <td>شركت توزيع نيروي بر ق آذربايجانغربي<br><?=$param['role']['generalInfo']['data'][9]['lname']?><br>معاون مالي وپشتيباني</td>
                <td>نام ومشخصات پيشنهاد دهنده :<br>مهر وامضا پيشنهاد دهنده :<br>تاريخ :<br>سمت امضا كنندگان :</td>
            </tr>
        </table>
    </div>
    <p style="page-break-after: always;"></p>
    <div style="text-align: center; clear: both;"><strong>برگ پيشنهاد قيمت   مناقصه <?=$param['trade']['specInfo']['data']['monagheseType'].' '.$param['trade']['specInfo']['data']['bargozaryType']?></strong></div>
    <div>
        <p>شرکت / فروشنده ..................<?=''?> امضا کننده زير پس از مطالعه و بررسی کامل اسناد و مدارک مناقصه مربوط به  <?=''?> که تمامی آنرا امضا و مهر نموده وقوف کامل از نوع تعدادو مشخصات  کالای  موضوع مناقصه و شرايط و محل تحويل و با در نظر گرفتن کليه عوامل موجود و مؤثر در اين مناقصه , قيمت کالای مذکور را بشرح ذيل پيشنهاد می نمايم . </p>
    </div>
    <!--<table width="100%">
    <tr>
    <td colspan="3">
    <table cellspacing="0" cellpadding="5px" width="100%">
    <tr>
    <td style="border:solid 1px #000; text-align: center;" width="30px">ردیف</td>
    <td style="border:solid 1px #000; text-align: center;">شرح کالا</td>
    <td style="border:solid 1px #000; text-align: center;">مقدار/ تعداد</td>
    <td style="border:solid 1px #000; text-align: center;">بهای واحد به ریال (به عدد)</td>
    <td style="border:solid 1px #000; text-align: center;">بهای واحد به ریال (به حروف</td>
    <td style="border:solid 1px #000; text-align: center;">جمع کل (بريال) (به عدد)</td>
    <?
    if($param['trade']['specInfo']['data']['cost_pishnahad_type']=='موردی')
    {
        ?>
        <td style="border:solid 1px #000; text-align: center;">جمع کل (بريال) (به حروف)</td>
        <td style="border:solid 1px #000; text-align: center;">جمع کل با احتساب <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?>درصد عوارض وماليات بر ارزش افزوده ( به ريال) (به عدد)</td>
        <?
    }
    ?>
    </tr>
    <?
    $tfiArr = $param['trade']['aghlam']['data']; 
    if(count($tfiArr)>0)
    { 
        $rowSpan = 1;
        foreach($tfiArr as $value)
        {
            $counter = 0;
            //$value = $tfiArr[0];
            ?>
            <tr>
            <td style="border:solid 1px #000; text-align: center;"><?=++$counter?></td>
            <td style="border:solid 1px #000; text-align: center;"><?=str_replace('ء','',str_replace('_','-',str_replace('–','-',$value['title'])))?></td>
            <td style="border:solid 1px #000; text-align: center;"><?=convertEnNum2FaNum(number_format($value['quantity']).' '.convertEnNum2FaNum($value['vahed']))?></td>
            <td style="border:solid 1px #000; text-align: center;" rowspan="<?=$rowSpan?>"></td>
            <td style="border:solid 1px #000; text-align: center;" rowspan="<?=$rowSpan?>"></td>
            <td style="border:solid 1px #000; text-align: center;" rowspan="<?=$rowSpan?>"></td>
            <?
            if($param['trade']['specInfo']['data']['cost_pishnahad_type']=='موردی')
            {
                ?>
                <td style="border:solid 1px #000; text-align: center;" rowspan="<?=$rowSpan?>"></td>
                <td style="border:solid 1px #000; text-align: center;" rowspan="<?=$rowSpan?>"></td>
                <?
            }
            ?>
            </tr>
            <?
        }
        if($param['trade']['specInfo']['data']['cost_pishnahad_type']!='موردی')
        {
            ?>
            <tr>
            <td style="border:solid 1px #000; text-align: center;" colspan="5">جمع کل (بریال) (به عدد)</td>
            <td></td>
            </tr>
            <tr>
            <td style="border:solid 1px #000; text-align: center;" colspan="5">جمع کل (بریال) (به حروف)</td>
            <td></td>
            </tr>
            <tr>
            <td style="border:solid 1px #000; text-align: center;" colspan="5">جمع کل با احتساب <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?> درصد عوارض و مالیات بر ارزش افزوده (بریال) (به عدد)</td>
            <td></td>
            </tr>
            <?
        }
    }
    else
        echo '<tr><td colspan=7 style="border:solid 1px;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
    ?>

    </table>
    </td>
    </tr>
    </table> -->
    <?
    $tsArr = $param['trade']['trade_subject']['data'];  
    $tsfArr = $param['trade']['trade_subject_fehrestbaha']['data'];  

    if($param['trade']['specInfo']['data']['aghlamShowInSooratjalase'] == 'ریز اقلام')
    {
        foreach($tsArr as $tsIs=>$tsRow)
        {?>
            <table border="1" cellpadding="5px" cellspacing="0" width="100%">
                <tr>
                    <td style="text-align: center; border:1px solid #000;" colspan="8">موضوع <?=$tsRow['title']?></td>
                </tr>
                <tr>
                    <td align="center" width="30px">رديف</td>
                    <td align="center">شرح کالا</td>
                    <td align="center">تعداد(دستگاه)</td>
                    <td align="center">بهای واحد( بريال )(به عدد)</td>
                    <td align="center">بهای واحد( بريال )(به حروف)</td>
                    <td align="center">جمع کل( بريال)( به عدد )</td>
                    <td align="center">جمع کل( بريال)(به حروف )</td>
                    <td align="center">جمع كل بااعمال <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?>  درصد عوارض وماليات برارزش افزوده (بريال )(به عدد)</td>
                </tr>
                <?

                $counter = 0;
                $tfiArr = $tsfArr[$tsIs]; 
                foreach($tfiArr as $item)
                {  
                    $counter++;
                    ?>
                    <tr>
                        <td align="center"><?=$counter?></td>
                        <td align="center"><?=str_replace('ء','',str_replace('_','-',str_replace('–','-',$item['title'])))?></td>
                        <td align="center"><?=number_format($item['quantity'])?></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                        <td align="center"></td>
                    </tr>
                    <?
                }
                ?>

                <tr>
                    <td colspan="3" style="text-align: right; border:1px solid #000;">جمع کل</td>
                    <td colspan="5" style="text-align: right; border:1px solid #000;"></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right; border:1px solid #000;">جمع کل با حروف</td>
                    <td colspan="5" style="text-align: right; border:1px solid #000;"></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: right; border:1px solid #000;">جمع كل بااعمال <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?> درصد عوارض وماليات برارزش افزوده</td>
                    <td colspan="5" style="text-align: right; border:1px solid #000;"></td>
                </tr>
            </table>
            <?
        }
    }
    else
    {
        ?>
        <table border="1" cellpadding="5px" cellspacing="0" width="100%">
            <tr>
                <td style="text-align: center; border:1px solid #000;">ردیف</td>
                <td style="text-align: center; border:1px solid #000;" width="50%">شرح</td>
                <td style="text-align: center; border:1px solid #000;" width="15%">جمع کل مبلغ پیشنهادی</td>
                <td style="text-align: center; border:1px solid #000;" width="15%">جمع با حروف</td>
                <td style="text-align: center; border:1px solid #000;" width="15%">جمع كل بااعمال <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?>  درصد عوارض وماليات برارزش افزوده (بريال )(به عدد)</td>
            </tr>
            <? 
            $counter = 0;
            foreach($subjectArr as $tsId=>$subject)
            {  
                $counter++;
                ?>
                <tr>
                    <td align="center"><?=$counter?></td>
                    <td align="center"><?=str_replace('ء','',str_replace('_','-',str_replace('–','-',$subject['title'])))?></td>
                    <td style="text-align: center; border:1px solid #000;" width="15%">جمع کل مبلغ پیشنهادی</td>
                    <td style="text-align: center; border:1px solid #000;" width="15%">جمع با حروف</td>
                    <td style="text-align: center; border:1px solid #000;" width="15%">جمع كل بااعمال <?=$param['trade']['generalInfo']['data']['arzeshAfzoode_total'] * 100?>  درصد عوارض وماليات برارزش افزوده (بريال )(به عدد)</td>
                </tr>
                <?
            }
            ?>
        </table>
        <?
    }
    ?>

    <div>چنانچه اين پيشنهاد مورد قبول قرار گيرد تعهد می نمايم که : 
        <ul>
            <li>الف ) قرارداد مربوطه را به موقع امضا نمايم . </li>
            <li>ب ) ضمانتنامه حسن انجام تعهدات را طبق مفاد شرايط مناقصه , حداکثر ظرف مدت ده   روز از تاريخ ابلاغ نتيجه تسليم نمايم . </li>
            <li>ج  ) تا موقعی که قرارداد مربوطه تنظيم و مبادله نشده است , اين پيشنهاد و ابلاغ قابل قبول به عنوان يک تعهد لازم الاجرا برای پيشنهاد دهنده تلقی گردد .</li>
            <li>د ) اطلاع كامل دارم كه شركت توزيع نيروي برق آذربايجانغربي الزامي براي واگذاري كاربه هريك از پيشنهادات را ندارد.</li>
        </ul>
    </div>
    <div style="border:1px solid #000; padding: 5px;">د)برای ضمانتنامه شرکت در مناقصه يک برگ ضمانتنامه بانکی :           / چک تضمين شده بانکی       / رسيد بانکی        به مبلغ .........................  ............. ريال و با شماره ............................. مورخ ........................ به نفع شرکت توزيع نيروی برق آذربايجانغربی تسليم ميدارم .
    </div>
    <div>ه) پيشنهاد دهنده حساب جاری ................................ نزد بانک ....................... شعبه ....................... کد بانک .............................. بنام ...................................................... جهت استرداد تضمين شرکت در مناقصه و پرداخت مطالبات ناشی از اين مناقصه را اعلام می نمايد . </div>
    <div><span>قابل توجه  پيشنهاد دهندگان :</span><span> تکميل قسمتهای پيش بينی شده در اين برگ  الزميست </span></div>
    <div style="width: 100%;">
        <table>
            <tr>
                <td width="50%">تاريخ : <br>آدرس : <br>تلفن : 
                </td>
                <td width="50%">نام پيشنهاد دهنده : <br>مهر پيشنهاد دهنده : <br>امضا , نام و سمت امضا کنندگان امضای مجاز پيشنهاد دهنده:<br>
                </td>
            </tr>
        </table>
    </div>
</div> 