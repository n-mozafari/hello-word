<?$jdf = new jdf()?>
<br/>
<div style = "min-width:90%; width:90%; min-height:870px; direction: rtl; border:2px solid; margin:20px auto 20px auto;">
    <div style="min-height:820px; margin: 20px;">
        <div>
            <div style="margin-top:10px; font-size:14px; text-align: center;">
                بسمه تعالی
            </div>   
            <div style="float: right; margin-right:40px; margin-top:10px; font-size:14px;">
                <img src="../../core/images/logo/document_logo.png" alt="<?=$_SESSION['companyTitle']?>">
            </div>
            <div style="float:left; border:1px solid; margin-left:5px; margin-top: 5px; padding: 2px 2px 2px 50px; font-size:12px;">
                تاریخ: <?=''?>
                <br>
                شماره:<?=''?>
                <br>
                پیوست:<?=''?>
            </div> 
        </div>  
        <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:15px;"><strong>سال دولت و ملت، همدلی و همزبانی</strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><strong>شرکت <?=$param['trade']['winner']['data']['title']?></strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><p>احتراما به اطلاع می رساند پیشنهاد قیمت آن شرکت در رابطه با استعلام بهای شماره <?=$param['trade']['generalInfo']['data']['code']?> با موضوع <?=$param['trade']['generalInfo']['data']['title']?> به شرح زیر مورد موافقت قرار گرفت:</p></div>

        <div align = "center" style = "min-width:90%; width:90%; margin: auto; ">                 

            <table cellspacing="0" cellpadding="10" style = "table-layout: fixed; border:solid 1px; margin:20px; width:100%; font-size:12px;">
                <tr>
                    <td style="border:solid 1px; text-align: center;" rowspan="2">ردیف</td>
                    <td style="border:solid 1px; text-align: center;" rowspan="2">شرح کالا</td>
                    <td style="border:solid 1px; text-align: center;" rowspan="2">تعداد/مقدار</td>
                    <td style="border:solid 1px; text-align: center;" colspan="2">بها با کرایه حمل بدون احتساب ارزش افزوده</td>
                </tr>
                <tr>
                    <td style="border:solid 1px; text-align: center;">بهای واحد</td>
                    <td style="border:solid 1px; text-align: center;">بهای کل</td>
                </tr>
                <?
                $tfiArr = $param['trade']['aghlam']['data'];
                if(count($tfiArr)>0)
                { 
                    $counter = 0;
                    foreach($tfiArr as $value)
                    {
                        $counter++;
                        ?>
                        <tr>
                            <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($counter)?></td>
                            <td style="border:solid 1px; text-align: center;"><?=$value['title']?></td>
                            <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['quantity'])?></td>
                            <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(costFormat($value['basePrice']))?></td>
                            <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(costFormat($value['totalCost']))?></td>
                        </tr>
                        <?
                    }
                    ?>
                    <tr>
                        <td colspan="2" style="border:solid 1px; text-align: center;">جمع کل</td>
                        <td colspan="2" style="border:solid 1px; text-align: center;"></td>
                        <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(costFormat($param['trade']['aghlam']['sumCost']))?></td>
                    </tr>
                    <?
                }
                else
                    echo '<tr><td colspan=5 style="border:solid 1px;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
                ?>

            </table>
        </div> 
        <div>
            <p>
                خواهشمند است با توجه به شرایط استعلام بها نسبت به تحویل کالای فوق به نشانی <?=$param['trade']['specInfo']['data']['tahvilPlace']?> اقدام لازم صورت پذیرد.   
            </p>
        </div>
        </br>                                   
        </br>
        <div style="font-weight: bold; text-align: left; margin-left: 150px;">
            <div><?=$param['role']['generalInfo']['data'][2]['lname']?></div>
            <div>مدیر امور تدارکات</div>
        </div>
        <div style="text-align: right;"> 
            <p style="font-weight: bold;">رونوشت به:</p>
            <p>-معاونت محترم برنامه ریزی و مهندسی جهت استحضار</p>
            <p>-معاونت محترم مالی و پشتیانی جهت استحضار</p>
            <p>-معاونت محترم امور مالی و ذیحسابی جهت استحضار</p>
            <p>-اداره انبارها جهت اطلاع و اقدام لازم</p>
            <p>-اداره خریدهای داخلی جهت اطلاع و پیگیری لازم</p>
        </div> 
    </div>
</div>  
