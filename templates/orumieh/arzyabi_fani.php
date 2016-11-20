
<div style = "min-width:90%; width:90%; min-height:870px; direction: rtl; border:none; margin:20px auto 20px auto;">
    <table width="100%">
        <tr>
            <?$src = $type != 'word' ? "../../core/images/logo/document_logo.png" : 'http://192.168.10.111/core/images/logo/document_logo.png'?>
            <td align="center" width="33%"><img src="<?=$src?>" width="200px" alt="<?=$_SESSION['companyTitle']?>"></td>
            <td align="center" width="33%"><?=$_SESSION['companyTitle']?></td>
            <td></td>
        </tr>
    </table>
    <table>
        <tr>
            <td>ریاست محترم کمیسیون مناقصه</td>
        </tr>
        <tr>
            <td>با سلام</td>
        </tr>
        <tr><td>بدینوسیله نتیجه ارزیابی فنی شرکت کنندگان مناقصه <?=$param['monaghese']['generalInfo']['data']['number']?> موضوع <?=$param['monaghese']['generalInfo']['data']['title']?> به شرح ذیل جهت استحضار اعلام می گردد.</td></tr>

        <?
        $msArr = $param['monaghese']['subject']['data'];
        $mpcArr = $param['monaghese']['monaghese_peymankar_cost']['data'];
        $peymankar_jalase2 = $param['monaghese']['peymankar_jalase2']['data'];
        ?>
        <tr>
            <td>
                <table>
                    <tr>
                        <td></td>
                        <td>نام شرکت</td>
                        <td>نمره اخذ شده</td>
                        <td>قبول یا رد</td>
                    </tr>
                    <?
                    foreach($msArr as $msId=>$msValue)
                    {
                        ?>
                        <tr>
                            <td><?=$msValue['title']?></td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
            </td>

        </tr>
    </table>
</div>  
