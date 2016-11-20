<?$jdf = new jdf()?>
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto;">
    <div style="margin-top: 50px; width: 100%;">
        <div style="margin-top:10px; font-size:14px; text-align: center; float: right; width:33%; text-align: center;">
            <img src="../../core/images/logo/document_logo.png" width="100px" alt="<?=$_SESSION['companyTitle']?>">
        </div>   
        <div style="float: right; margin-top:10px; margin-right:40px; font-size:14px; width:30%; text-align: center;">
            <div><?=$_SESSION['companyTitle']?></div> 
        </div>
        <div style="float: right; margin-top:10px; margin-right:40px; font-size:14px; width:30%; text-align: center;">
            <div>شماره : <?=$param['formValue']['number']?></div>
            <div>تاریخ: <?=str_replace('-','/',$param['formValue']['date'])?></div>    
        </div>
        </div>
        <div style="text-align: center; clear: both;">دورنویس</div>
        <div>شرکت محترم <?=$param['trade']['winner']['data']['title']?>
        <br>موضوع : <?=$param['trade']['generalInfo']['data']['title']?>
        </div>
        <div>باسلام : در اجرای  مناقصه <?=$param['trade']['specInfo']['data']['monagheseType'].' '.$param['trade']['specInfo']['data']['bargozaryType']?> شماره <?=$param['trade']['generalInfo']['data']['code']?> مورخ <?=str_replace('-','/',$jdf->g2j())?> ( موضوع <?=$param['trade']['generalInfo']['data']['title']?>) ، نظربه اينکه آنشرکت با پيشنهاد مبلغ کل <?=number_format($param['trade']['winner']['data']['money'])?> (<?=numToString($param['trade']['winner']['data']['money'])?>) ریال به صورت ضمانتنامه بانکی يا واريز وجه نقد به حساب  0105592677009  سيبا شرکت نزد بانک ملی شعبه برق اروميه ( کد 5133 ) جهت عقد قرارداد به امور تداركات  اين شرکت مراجعه فرمايند .
        <br>
        <table cellpadding="5px" cellspacing="0" border="1">
            <tr>
                <td width="30px">ردیف</td>
                <td>شرح کالا</td>
                <td>تعداد (دستگاه)</td>
                <td>قيمت واحد ( بريال )</td>
                <td>قيمت كل (بريال )</td>
                <td><?=$param['trade']['generalInfo']['data']['avarez_arzeshAfzoode']*100?> درصد عوارض وماليات بر ارزش افزوده (بريال )</td>
                <td>قيمت کل با احتساب <?=$param['trade']['generalInfo']['data']['avarez_arzeshAfzoode']*100?> درصد عوارض وماليات بر ارزش افزوده (بريال )</td>
            </tr>
            <?
                $counter = 0;
                 foreach($param['trade']['aghlam']['data'] as $value)
                 {
                     ?>
                     <tr>
                        <td><?=++$counter?></td>
                        <td><?=nl2br(str_replace('"','',str_replace('ء','',str_replace('_','-',str_replace('–','-',$value['title'])))))?></td>
                        <td><?=$value['quantity']?></td>
                        <td><?=number_format($value['basePrice'])?></td>
                        <td><?=number_format($value['totalCost'])?></td>
                        <td><?=number_format($value['totalCost']*$param['trade']['generalInfo']['data']['avarez_arzeshAfzoode'])?></td>
                        <td><?=number_format($value['totalCost']+($value['totalCost']*$param['trade']['generalInfo']['data']['avarez_arzeshAfzoode']))?></td>
                     </tr>
                     <?
                 }
             ?>
        </table>
        </div>
        <div style="float: left; clear: both;"><?=$param['role']['generalInfo']['data'][9]['lname']?><br>معاون مالی وپشتيبانی
        </div>
    </div>