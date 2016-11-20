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
            <td>کد : ف/10/02/00</td>
        </tr>
    </table>

    <table cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td style="border:solid 1px; text-align: right;">
                <table style="margin-right: 2cm;">
                    <tr>
                        <td width="150" >
                            شناسه تامین اعتبار:.......
                    <br>
                        
                            تاریخ تامین اعتبار:.......</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                
                        <td >
                            مدارک پیوست برگ درخواست در خصوص خرید خدمات
                            <br>
                            1-نقشه های اجرایی
                            <br>

                            2-متره برآورد
                            <br>

                            3-مشخصات فنی
                            <br>

                            4-سایر</td>
                    </tr>

                </table>

                <table cellspacing="0" cellpadding="0" width="100%" border="1">
                    <tr>
                        <td style="border:solid 1px; text-align: center;">ردیف</td>
                        <td style="border:solid 1px; text-align: center;" >شرح خدمت</td>
                        <td style="border:solid 1px; text-align: center;">مقدار</td>
                        <td style="border:solid 1px; text-align: center;" >واحد</td>
                         <td style="border:solid 1px; text-align: center;">برآورد قیمت واحد(ریال)</td>
                         <td style="border:solid 1px; text-align: center;">برآورد قیمت کل(ریال)</td>
                         <td style="border:solid 1px; text-align: center;">شناسه</td>
                    </tr>
                   
                    <?
                    $tfiArr = $param['kharid_sefaresh']['item']['data']; 
                    if(count($tfiArr)>0)
                    { $total=0;
                        $counter = 0;
                        $price=0;
                        foreach($tfiArr as $value)
                        {   
                            $counter++;
                            $price=$value['quantity']*$value['basePrice'];
                            $total+=$price;
                            ?>
                            <tr>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($counter)?></td>
                                <td style="border:solid 1px; text-align: center;"><?=$value['title']?></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(number_format($value['quantity']))?></td>
                                <td style="border:solid 1px; text-align: center;"></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(number_format($value['basePrice']))?></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(number_format($price))?></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['code'])?></td>
                            </tr>
                            <?
                        }
                    }
                    else
                        echo '<tr><td colspan=7 style="border:solid 1px;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
                    ?>
                      <tr>
                                <td style="border:solid 1px; text-align: center;" colspan="6">جمع(حروف)</td>
                                <td style="border:solid 1px; text-align: center;"><?=numToString($total);?></td>
                            </tr>
                </table>

                <?
                $emzaArr = $param['kharid_sefaresh']['accept']['data'];

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
                           <td style="border:solid 1px; text-align: center;">امضاء واحد درخواست کننده:
                                <br>
                               ...........................
                               <br>
                              امضاء مدیر واحد درخواست کننده
                                <br>
                               ...........................
                               <br>
                                امضاء معاونت ذیربط:
                                <br>
                             
                            </td>
                             <td style="border:solid 1px; text-align: center;">با خرید کالا های فوق موافقت میشود.
                                <br>
                                نوع مناقصه:
                                <br><input type="checkbox" id="keyCheckbox">عمومی&nbsp;&nbsp;&nbsp;<input type="checkbox" id="keyCheckbox">محدود 
                                <br><input type="checkbox" id="keyCheckbox">یک مرحله ای
                                <br><input type="checkbox" id="keyCheckbox">دو مرحله ای
                            </td>
                        </tr>
                        <tr>  <td style="border:solid 1px; text-align: center;"  >آقا/خانم............. نسبت به انجام تشریفات قانونی خرید خدمات پس از تامین اعتبار اقدام لازم بعمل آید.
                          <br>
                          امور بازرگانی و قراردادها</td>
                        <td style="border:solid 1px; text-align: center;"  >از محل کد بودجه<?=convertEnNum2FaNum(number_format($value['code']))?> به  مبلغ <?=convertEnNum2FaNum(number_format($total));?> (حروف) <?=numToString($total);?> ریال تامین اعتبار شد.

                                <br>
                                <br>
                                نوع اعتبار:
                                 <br><input type="checkbox" id="keyCheckbox">عمرانی
                                <br><input type="checkbox" id="keyCheckbox">جاری
                                <br>
                                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;واحد اعتبارات :مهر و امضاء
                            </td> </tr>
                    </table>
                </div>
            
            </td>
        </tr>
    </table>
</div> 