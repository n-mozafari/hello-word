<br/>           

<? echo "<pre style=\"direction: ltr; text-align: left;\">"; print_r($param); echo "</pre> "; ?>
<style type="text/css">
    .color-red {
        color:red;
    }
    ol   { 
        font-size: 20px;
        padding: 5px 15px;
    }
    ul {
        list-style-type: none;
        font-size: 20px;
        padding: 5px 15px;
    }
</style> 
<div style = "min-width:90%; width:90%; min-height:870px; direction: rtl; margin:20px auto 20px auto;">
    <div style="width: 100%; margin: 10px auto;">
        <div style="float: right; width: 40%; height: 290px;"><img src="../images/tips/text_az.png" style="width: 60%; margin: 5px 20%; " /></div>
        <div style="float: right; width: 20%; height: 290px;"><img src="../images/tips/image006.gif" style="width: 60%; margin: 5px 20%; "/></div>
        <div style="float: right; width: 40%; height: 290px;">
            <p style="margin: 100px 0px;">
                <h2 style="text-indent: 35%;">شماره : 12222</h2>
                <h2 style="text-indent: 35%;">تاریخ : 1393/02/24</h2>
            </p>
        </div>
    </div>
    <div syle="width: 100%; margin: 10px auto;">
        <h1 style="text-align: center;">شرایط استعلام بها شماره  <span class="color-red">69-99</span></h1>
        <h1 style="text-align: center;"><?= $param['trade']['generalInfo']['data']['title'] ?></h1>
        <div>
            <h2>شركت محترم <?= $param['trade']['girandegan']['data']['0']['title'] ?></h2>
            <p style="text-indent: 25px; font-size: 20px;"> 
                باسلام : شرکت توزيع نيروی برق آذربايجانغربی  درنظر دارد اقلام مصرفي مربوط به
                <?= $param['trade']['generalInfo']['data']['title'] ?>
                وبشرح ذيل با شرايط ومشخصات ذيل به فروشندگان واجدشرايط كه داراي
                <?= $param['trade']['generalInfo']['data']['title'] ?>
                واگذار نمايد ،لذا خواهشمنداست قيمت پيشنهادي خودرا برابرفرم پيوستي ( برگ پيشنهاد قيمت) درپاكت سربسته تا روز
                <?= $jdf->g2j($param['trade']['specInfo']['data']['pakatOpenDate']) ?>
                به امور تداركات اين شركت واقع در
                <?= $param['trade']['specInfo']['data']['pakatTahvilPlace'] ?>
                تحويل فرمائيد.
            </p>
            <h2 style="text-decoration: underline;">شرايط ومشخصات استعلام بهاء :</h2>
            <div style="width: 98%; margin: 0 auto;">
                <ol>
                    <li>موضوع استعلام بهاء :
                        <p>
                            <span>عبارتست از 
                            <?= $param['trade']['generalInfo']['data']['title'] ?>
                            بشرح ذيل مطابق فهرست پيوستي : </span>
                            <ol>
                                <?
                                foreach($param['trade']['estelam_item']['data'] as $estelam_item) {
                                    echo "<li>خریده ".$estelam_item['title']." به مقدار ".$estelam_item['number']." ".$estelam_item['vahed']."</li>";
                                }
                                ?>
                            </ol>
                        </p>
                    </li>
                    <li>
                        مدت تحويل كالاي موضوع استعلام  ازتاريخ  ابلاغ 
                        <?= $param['trade']['specInfo']['data']['tahvilForsat']*30 ?>
                        روز كاري  خواهد بود .
                    </li>
                    <li> شرايط اختصاصي :</li>
                    <ul>
                        <li>الف : ميلگرد هاي خريداري شده بايستي بصورت بسته بندي شده وقابل حمل باشد</li>
                        <li>ب : ميلگرد ها بايستي بطول 12 متري از نوع 111A  وداراي پلاك كارختنه وتوليد داخلي باشد</li>
                        <li>ج : محل تحويل اجناس در اروميه – بزرگراه خاتم النبياء – خيابان شهيد لطفي – جنب پارك موتوري شهرداري – كارگاه تيربتوني اروميه ميباشد.</li>
                    </ul>
                    <li>نحوه ارائه قيمت :
                        <p>
                            قيمت پيشنهادی درفرم  منضم به شرایط استعلام بها  بايستی به عدد وبه حروف  نوشته شود . وضمنا فروشنده نبايستي براي اجناس موضوع استعلام پيشنهاد نقدي ارائه نمايد چون وجه اجناس پس ازتحويل وارسال صورتحساب وتنظيم سند مالي پرداخت خواهد شد.وبه پيشنهاداتي كه غير ازپاكت سربسته ( بطريق فاكس ) ارسال شود ترتيب اثر داده نخواهد شد.
                        </p>
                    </li>
                    <li> تغيير مقادير كار  :
                        <p>
                            كارفرما ميتواند مقدار احجام كارموضوع واگذاري رادرطول مدت قرارداد  تا 25 درصد مبلغ كل قرارداد كاهش يا افزايش دهد بدون اينكه دربهاي واحد وشرايط قرارداد تغييري حاصل شود وپيمانكار ملزم به قبول آن ميباشد.
                        </p>
                    </li>
                    <li>تعهدات طرفين : 
                        <ol>
                            <li>هزينه حمل بعهده فروشنده ميباشد</li>    
                            <li>كسورقانوني ناشي ازمعامله بعهده فروشنده ميباشد</li>    
                            <li>9 درصد عوارض وماليات برارزش افزوده درصورت ارائه گواهي ماليات برارزش افزوده دروجه فروشنده قابل پرداخت ميباشد</li>    
                            <li>تخليه بار درمحل تحويل بعهده خريدار ميباشد.</li>    
                        </ol>
                    </li>
                    <li>كارفرما در رد يا قبول يك يا كليه پيشنهادات مختار است.</li>
                </ol>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <div style="width: 100%; margin: 10px auto; font-size: 25px;">
        <div style="width: 50%; float: right; text-align: center;">
            شركت توزيع نيروي برق آذربايجانغربي
            <br/>
            اميني
            <br/>
            مدير امورتداركات
        </div>
        <div style="width: 50%; float: right; text-align: center;">
            نام ومشخصات پيشنهاد دهنده :
            <br/>
            مهر وامضاء پيشنهاد دهنده :
            <br/>
            تاريخ :
            <br/>
            سمت امضا كنندگان :   
        </div>
    </div>
</div>