<?$jdf = new jdf()?>
<br/>
<div style = "min-width:90%; width:90%; min-height:870px; direction: rtl; border:none; margin:20px auto 20px auto;">
    <table width="100%">
        <tr>
            <td align="center" width="33%"><img src="../../core/images/logo/document_logo.png" width="200px" alt="<?=$_SESSION['companyTitle']?>"></td>
            <td align="center" width="33%"><?=$_SESSION['companyTitle']?></td>
            <td align="center" width="33%">شماره : <?=$param['formValue']['number']?>
                <br>
                تاریخ: <?=str_replace('-','/',$param['formValue']['date'])?>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td align="center">فراخوان</td>
        </tr>
        <tr>
            <td align="center">مناقصه <?=$param['trade']['specInfo']['data']['bargozaryType']?> <?=$param['trade']['generalInfo']['data']['code']?></td>
        </tr>
        <tr><td>موضوع مناقصه <?=$param['trade']['specInfo']['data']['bargozaryType']?> : عبارتست از <?=$param['trade']['generalInfo']['data']['title']?></td></tr>
        <tr>
            <td>شرايط ومحل دريافت اسناد مناقصه : داوطلبان شرکت در مناقصه كه داراي <?=$param['trade']['specInfo']['data']['peymankar_condition']?> هستند، می توانند در قبال ارائه اعلاميه واريز مبلغ <?=number_format($param['trade']['specInfo']['data']['asnadCost'])?> ريال به حساب سيبا بشماره   0105592677009   نزد بانک ملی شعبه برق اروميه ( کد 5133 ) به آدرس اروميه ـ خيابان سربازان گمنام ( برق سابق ) ـ نرسيده به ميدان مخابرات ـ  شرکت توزيع نيروی برق آذربايجانغربی  ويا به دفتر نمايندگی اين شرکت واقع در تهران ـ ميدان ونک ـ خيابان برزيل ـ ساختمان شهيد عباسپور ( توانير ) ـ بلوک 2 ـ نيم طبقه دوم ـ دفتر برق آذربايجان تلفن  88887086  مراجعه واسناد مناقصه رادريافت نمايند . ضمنا" اسناد مناقصه در سايت اطلاع رسانی معاملات صنعت برق ( شرکت توانير ) وسايت شرکت توزيع نيروی برق آذربايجانغربی وپايگاه ملی اطلاع رسانی مناقصات  به ترتيب به آدرس :</td>
        </tr>
        <tr>
            <td>WWW.Waepd.ir ,WWW.tavanir.org.ir و iets.mporg.ir قابل مشاهده است .</td>
        </tr>
        <tr>
            <td>مبلغ سپرده شرکت در مناقصه : مبلغ کل سپرده شرکت در مناقصه <?=$param['trade']['specInfo']['data']['']?> ريال (<?=numToString(number_format($param['trade']['specInfo']['data']['']))?> )  می باشد .</td>
        </tr>
        <tr>
            <td>مهلت فروش اسناد  : از تاريخ درج نوبت اول فراخوان در روزنامه تا پايان وقت اداری روز <?=$param['trade']['specInfo']['data']['foroshMohlatDay']?> مورخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['foroshMohlat']))?></td>
        </tr>
        <tr>
            <td>مهلت ومحل تحويل پيشنهادات : حداکثر تا ساعت <?=$param['trade']['specInfo']['data']['tahvilPakatHour']?> روز <?=$param['trade']['specInfo']['data']['tahvilPakatDay']?> مورخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['tahvilPakatDate']))?> به   دبيرخانه شرکت توزيع برق آذربايجانغربی</td>
        </tr>
        <?
        $pakat_str = 'الف وب وج ';
        if($param['trade']['specInfo']['data']['monagheseType'] == '2') $pakat_str = 'الف وب';
        
        ?>
        <tr>
            <td>زمان ومحل برگزاری مناقصه : زمان بازگشائی پاکت های <?=$pakat_str?> راس ساعت <?=$param['trade']['specInfo']['data']['monagheseJalase_hour']?> (<?=numToString($param['trade']['specInfo']['data']['monagheseJalase_hour'])?>) <?=$param['trade']['specInfo']['data']['monagheseJalaseDay']?> مورخ <?=str_replace('-','/',$jdf->g2j($param['trade']['specInfo']['data']['monagheseJalase_date']))?> در محل شرکت توزيع نيروی برق آذربايجانغربی .</td>
        </tr>
        <tr>
            <td dir="ltr">شرکت توزيع نيروی برق آذربايجانغربی</td>
        </tr>
    </table>
</div>  