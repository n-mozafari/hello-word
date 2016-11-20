<br/>

<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto;">
    <table width="100%">
        <tr><td rowspan="3" width="33%">
                <img src="../../core/images/logo/document_logo.png" width="100px" alt="<?=$_SESSION['companyTitle']?>">
            </td></tr>
        <tr>
            <td style="padding-right:5cm; font-size: large;">سیستم مدیریت یکپارچه</td>
        </tr>
        <tr>
            <td  style="padding-right:5cm; font-size: large;">درخواست خرید کالا</td>

            <td>شماره : </td>
        </tr><tr>
            <td></td>
            <td></td>
            <td>تاریخ : </td>
        </tr><tr>
            <td></td>
            <td></td>
            <td>کد : ف/10/01/00</td>
        </tr>
    </table>

    <table cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td style="border:solid 1px; text-align: center;">
                <table style="width: 30cm;">
                    <tr>
                        <td  align="right">شماره درخواست انبار:.............
                        </td>

                        <td  align="left">درخواست کننده:.............</td>
                    </tr> 

                    <tr>
                        <td  align="right">تاریخ درخواست انبار:.............
                        </td>

                        <td  align="left">مورد مصرف:.............</td>
                    </tr>
                </table>
                <table style="margin-right: 28cm;">
                    <tr>
                        <td>
                            شناسه تامین اعتبار:.......</td>
                    </tr>
                    <tr>
                        <td>
                            تاریخ تامین اعتبار:.......</td>
                    </tr>
                </table>
                <table cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td style="border:solid 1px; text-align: center;">ردیف</td>
                        <td style="border:solid 1px; text-align: center;">کد کالا</td>
                        <td style="border:solid 1px; text-align: center;">شرح کالا</td>
                        <td style="border:solid 1px; text-align: center;">مقدار</td>
                        <td style="border:solid 1px; text-align: center;">واحد)</td>
                        <td style="border:solid 1px; text-align: center;"> قیمت واحد(ریال)</td>
                        <td style="border:solid 1px; text-align: center;">برآورد قیمت کل(ریال)</td>
                        <td style="border:solid 1px; text-align: center;">کد تامین اعتبار</td>

                    </tr>

                    <?
                    $tfiArr = $param['kharid_sefaresh']['item']['data']; 
                    if(count($tfiArr)>0)
                    { 
                      $total=0;
                        $counter = 0;
                        $price=0;
                        foreach($tfiArr as $value)
                        {
                              $price=$value['quantity']*$value['basePrice'];
                            $total+=$price;
                            $counter++;
                            ?>
                            <tr>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($counter)?></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['code'])?></td>
                                <td style="border:solid 1px; text-align: center;"><?=$value['title']?></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(number_format($value['quantity']))?></td>
                                   <td style="border:solid 1px; text-align: center;"></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(number_format($value['basePrice']))?></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(number_format($price))?></td>
                                <td style="border:solid 1px; text-align: center;"></td>
                            </tr>

                            <?
                        }
                    }  else
                        echo '<tr><td colspan=7 style="border:solid 1px;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
                    ?>
                    <tr>
                        <td style="border:solid 1px; text-align: center;" colspan="7">جمع(حروف)</td>
                        <td style="border:solid 1px; text-align: center;"><?=numToString($total);?></td>

                    </tr>

                </table>

                <?
                $emzaArr = $param['kharid_request']['accept']['data']['allAccept'];

                $db = new businessDocuments();
                $ub = new businessUser();
                $rb = new businessRole();

                $rResult = $rb->select("systemKey='kharid'");
                $rArr = array();
                while($rRow = mysql_fetch_object($rResult))
                {
                    $rArr[$rRow->id] = $rRow->title;
                }
                ?>
                <div align = "center" style = "min-width:90%; width:90%; margin: auto; ">


                    <table width="100%">
                        <tr>
                            <td style="border:solid 1px; text-align: center;">متصدی کارکرد انبار
                                <br>
                                <br>
                                امضاء
                            </td>
                            <td style="border:solid 1px; text-align: center;">مدیر امور انبارها
                                <br>
                                <br>
                                امضاء
                            </td>
                            <td style="border:solid 1px; text-align: center;" colspan="2">آقا/خانم&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; لطفا برآورد مبلغ گردد و سپس نسبت به خرید کالا طبق آیین نامه معاملات و رعایت صرفه و صلاح شرکت اقدام نمایید
                                <br>
                                <br>
                                امور بازرگانی و قراردادها</td>
                        </tr>
                        <tr><td style="border:solid 1px; text-align: center;">مدیر واحد درخواست کننده
                                <br>
                                <br>
                                امضاء</td>
                            <td style="border:solid 1px; text-align: center;">با خرید کالاهای فوق موافقت میشود
                                <br>
                                <br>
                                معاونت ذیربط</td> 
                            <td style="border:solid 1px; text-align: center;"  rowspan="2">به مبلغ  <?=convertEnNum2FaNum(number_format($total));?> (حروف) <?=numToString($total);?> ریال تامین اعتبار شد/نشد.

                                <br>
                             
                                نوع اعتبار:
                                 <br><input type="checkbox" id="keyCheckbox">عمرانی
                                <br><input type="checkbox" id="keyCheckbox">جاری
                                <br>
                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;واحد اعتبارات :مهر و امضاء
                            </td> 
                            <td style="border:solid 1px; text-align: center;" rowspan="2">با خرید کالا های فوق موافقت میشود.
                                <br>
                                نوع مناقصه:
                                <br><input type="checkbox" id="keyCheckbox">عمومی&nbsp;&nbsp;&nbsp;<input type="checkbox" id="keyCheckbox">محدود 
                                <br><input type="checkbox" id="keyCheckbox">یک مرحله ای
                                <br><input type="checkbox" id="keyCheckbox">دو مرحله ای
                            </td></tr>
                        <tr>
                            <td style="border:solid 1px; text-align: center;">مدت تحویل:
                            </td> 
                            <td style="border:solid 1px; text-align: center;">سطح بازرسی:
                            </td>
                        </tr>
                    </table>
                </div>
            
            </td>
        </tr>
    </table>
</div> 