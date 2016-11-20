<br/>
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto;">
    <table width="100%">
        <tr><td rowspan="3" width="33%">
                <img src="../../core/images/logo/document_logo.png" width="100px" alt="<?=$_SESSION['companyTitle']?>">
            </td></tr>
        <tr>
            <td>سیستم مدیریت یکپارچه</td>
        </tr>
        <tr>
            <td>فرم خرید داخلی انبار </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>شماره : </td>
        </tr><tr>
            <td></td>
            <td></td>
            <td>تاریخ : </td>
        </tr><tr>
            <td></td>
            <td></td>
            <td>کد:</td>
        </tr>
    </table>
    <table cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td style="border:solid 1px; text-align: center;">
               </br>
            </br>
            </br>
                <table cellspacing="0" cellpadding="0" width="100%">

                <tr>
                    <td style="border:solid 1px; text-align: center;" rowspan="2">ردیف</td>
                    <td style="border:solid 1px; text-align: center;"  rowspan="2">کد کالا</td>

                    <td style="border:solid 1px; text-align: center;">مشخصات کالا</td>
                    <td style="border:solid 1px; text-align: center;" rowspan="2">مقدار/تعداد</td>
                    <td style="border:solid 1px; text-align: center;" rowspan="2">توضیحات</td>
                </tr>
                <tr>

                    <td style="border:solid 1px; text-align: center;">عنوان کالا</td>
                </tr>
                <?
                $tfiArr = $param['kharid_request']['item']['data']; 
                if(count($tfiArr)>0)
                { 
                    $counter = 0;
                    foreach($tfiArr as $value)
                    {
                        $counter++;
                        ?>
                        <tr>
                            <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($counter)?></td>
                            <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['code'])?></td>
                            <td style="border:solid 1px; text-align: center;"><?=$value['title']?></td>
                            <td style="border:solid 1px; text-align: center;"><?=$value['quantity']?></td>
                            <td style="border:solid 1px; text-align: center;"></td>
                        </tr>
                    </td>
                </tr>
                <?
            }
        }
        else
            echo '<tr><td colspan=7 style="border:solid 1px;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
        ?>
        <tr>
            <td style="border:solid 1px; text-align: right;">
               فروشنده/درخواست کننده:
            </td>
        </tr>
        <tr>
            <td style="border:solid 1px; text-align: center;" rowspan="2">
               تایید درخواست کننده:
                </br>
                </br>
                </br>
                امضاء:
                </br>
                </br>
                </br>
                <hr>
                  کنترل کیفیت:
                </br>
                
                </br>
                </br>
                امضاء:
                </br>
                </br>
                </br>
            </td>
           
            <td style="border:solid 1px; text-align: center;" >
             خریدار
                </br>
                  <hr>
                </br>
                </br>
             
                امضاء:
                </br>
                </br>
                </br>
            </td>
            <td style="border:solid 1px; text-align: center;" >
                مسئول انبار:
                </br>
                 <hr>
                </br>
                </br>
                
                امضاء:
                </br>
                </br>
                </br>
            </td><td style="border:solid 1px; text-align: center;"  >
                مدیر امور انبارها:
                </br>
                  <hr>
                </br>
                </br>
                امضاء:
                </br>
                </br>
                </br>
            </td><td style="border:solid 1px; text-align: center;"   >
                حسابداری انبارها :
                </br>
                  <hr>
                </br>
                </br>
                مهر و امضاء:
                </br>
                </br>
                </br>
            </td>

        </tr>
      
    </table>


    <table width="100%">
        <tr>
            <td>نحوه پرداخت:</td>
            <td>تنخواه گردان:</td>
            <td>پرداخت مستقیم:</td>
            <td>برگشت از پیش پرداخت:</td>
        </tr>
    </table>
</div> 