<?$jdf = new jdf()?>
<br/>  
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto; font-size: 12px;">
    <table width="100%">
        <tr>
            <td align="center" width="33%"><img src="../../core/images/logo/document_logo.png" width="100px" alt="<?=$_SESSION['companyTitle']?>"></td>
            <td align="center" width="33%"><?=$_SESSION['companyTitle']?></td>
            <td align="center" width="33%">
            </td>
        </tr>
    </table>
    <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:15px;"><strong>صورت جلسه برنده استعلام</strong></div>
    <div style="clear: both; text-align: right; margin:20px auto 10px auto; font-size:14px;">در مورخه <?=''?> با حضور امضا کنندگان ذیل <?=count($param['trade']['girandegan_accept_pishnahadat']['data'])?> فقره پاکت سربسته مربوط به استعلام بهای شماره<?=$param['trade']['generalInfo']['data']['code']?> <?=$param['trade']['generalInfo']['data']['title']?> که توسط آقای / خانم <?=$param['trade']['generalInfo']['data']['userFullname']?> انجام گرفته گشوده و قرائت گردید.</div>
    <div>
        <?
        $frm_cf = new facadeFrm_catalog();
        $aghlamShowInSooratjalase = $frm_cf->getField_dbValueForObject('trade', $param['trade']['generalInfo']['data']['id'], 'aghlamShowInSooratjalase');
        $tsArr = $param['trade']['trade_subject']['data'];  
        $tsfArr = $param['trade']['trade_subject_fehrestbaha']['data'];
        $winnerArr = $param['trade']['winner']['data'];
      
        if($aghlamShowInSooratjalase == 2)
        {
            foreach($tsArr as $tsIs=>$tsRow)
            {
                $winner = $winnerArr[$tsIs];
                ?>
                <table cellspacing="0" cellpadding="2" width="90%" align="center">
                    <tr>
                        <td style="text-align: center; border:1px solid #000;" colspan="7">موضوع: <?=$tsRow['title']?></td>
                    </tr>
                    <tr>
                        <td style="text-align: center; border:1px solid #000;" colspan="7">نام برنده: شرکت <?=$winner['title']?> با حداقل قیمت پیشنهادی به مبلغ <?=$winner['money']?></td>
                    </tr>
                    <tr>
                        <td style="border:solid 1px; text-align: center;">ردیف</td>
                        <td style="border:solid 1px; text-align: center;">شرح کالا</td>
                        <td style="border:solid 1px; text-align: center;">واحد</td>
                        <td style="border:solid 1px; text-align: center;">تعداد</td>
                        <td style="border:solid 1px; text-align: center;">بهای واحد</td>
                        <td style="border:solid 1px; text-align: center;">بهای دستمزد</td>
                        <td style="border:solid 1px; text-align: center;">جمع کل</td>
                    </tr>
                    <?
                    $tfiArr = $param['trade']['winner_pishnahadat']['data'][$tsIs]; 
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
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['vahed'])?></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['quantity'])?></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(number_format($value['mavad_basePrice']))?></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(number_format($value['dastmozd_basePrice']))?></td>
                                <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(number_format($value['totalCost']))?></td>
                            </tr>
                            <?
                        }
                    }
                    else
                        echo '<tr><td colspan=7 style="border:solid 1px;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
                    ?>
                    <tr>
                        <td style="border:solid 1px; text-align: center; text-align: right;">جمع کل</td>
                        <td colspan="6" style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum(number_format($param['trade']['winner']['data']['money']))?> <span> ریال</span></td>
                    </tr>
                </table>
                <br>
                <?}
        }
        else
        {
            ?>
            <table cellspacing="0" cellpadding="2" width="100%">
                <tr>
                    <td style="text-align: center; border:1px solid #000;">ردیف</td>
                    <td style="text-align: center; border:1px solid #000;" width="30%">شرح</td>
                    <td style="text-align: center; border:1px solid #000;" width="20%">نام برنده</td>
                    <td style="text-align: center; border:1px solid #000;" width="20%">جمع کل</td>
                    <td style="text-align: center; border:1px solid #000;" width="20%">جمع کل با حروف</td>
                </tr>
                <?
                $counter = 0;
                foreach($tsArr as $tsIs=>$tsRow)
                {    
                    $winner = $winnerArr[$tsIs];
                    $counter++;  
                    ?>
                    <tr>
                        <td style="text-align: center; border:1px solid #000;"><?=$counter?></td>
                        <td style="text-align: center; border:1px solid #000;"><?=$tsRow['title']?></td>
                        <td style="text-align: center; border:1px solid #000;"><?=$winner['title']?></td>
                        <td style="text-align: center; border:1px solid #000;"><?=$winner['money']?> ریال</td>
                        <td style="text-align: center; border:1px solid #000;"><?=numToString($winner['money'])?> ریال</td>
                    </tr>
                    <?
                }
                ?>
            </table>
            <?
        }?>
    </div> 
    <table width="95%">
        <tr>
            <?

            $trade_team = $param['trade']['team']['data']['1'];  
            foreach($param['trade']['team']['data'] as $val)
            {

                ?>
                <td>
                    <?=$val['sematTitle'].'<BR>'.$val['fname'].' '.$val['lname'].'<BR>'?>
                    <?if($param['trade']['generalInfo']['data']['varchar1_1'] == 1)
                    {?>
                        <?if(!empty($val['signDoc']))
                        {
                            ?>
                            <img src="<?='../upload_files/'.$val['signDoc']?>" width="100">
                            <?
                        }
                    }?>

                </td>
                <?}?>
        </tr>
    </table>
</div>