<br/>
<div style = "min-width:100%; width:100%; min-height:500px; direction: rtl; margin:20px auto 20px auto;">
    <table width="100%">
        <tr><td rowspan="3" width="33%">
                <img src="../../core/images/logo/document_logo.png" width="100px" alt="<?=$_SESSION['companyTitle']?>">
            </td></tr>
        <tr>
            <td>سیستم مدیریت یکپارچه</td>
            <td>فرم درخواست کالا از انبار</td>
            <td>طرح های عمرانی</td>
        </tr>
        <tr>
            <td>شماره : </td>
            <td>تاریخ : </td>
            <td>کد : ف/11/02/00</td>
        </tr>
    </table>
    <table cellspacing="0" cellpadding="0" width="100%" border="1">
        <tr>
            <td style="border:solid 1px; text-align: center;" rowspan="2">ردیف</td>
            <td style="border:solid 1px; text-align: center;" rowspan="2">کد کالا</td>
            <td style="border:solid 1px; text-align: center;" rowspan="2">شرح و مشخصات کالا</td>
            <td style="border:solid 1px; text-align: center;" colspan="2">اقلام درخواستی</td>
            <td style="border:solid 1px; text-align: center;" rowspan="2">واحد</td>
        </tr>
        <tr><td>به عدد</td>
        <td>به حروف</td></tr>
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
                    <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['quantity'])?></td>
                    <td style="border:solid 1px; text-align: center;"><?=numToString($value['quantity'])?></td>
                    <td style="border:solid 1px; text-align: center;"><?=convertEnNum2FaNum($value['vahed'])?></td>
                </tr>
                <?
                }
            }
            else
                echo '<tr><td colspan=7 style="border:solid 1px;"><center><span class="list_has_no_row">ركوردي يافت نشد!!!</span></center></td></tr>';
        ?>

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
                <?

                    foreach($emzaArr as $flowitemId=>$subArr)
                    {
                        foreach($subArr as $row)
                        {
                            $uRow = $ub->getRow($row->userId);
                            if($uRow->fileEmza)
                            {
                                $dRow = $db->getRow("$uRow->fileEmza");

                                $image = $dRow ? "<img src=\"../upload_files/$dRow->address\" width=\"100\">" : '';
                            }
                        ?>
                        <td>
                            <?=$rArr[$row->roleId]?>
                            <BR>
                            <?=$row->userFullname?>
                            <BR>
                            <?=$image?> 
                           
                        </td>
                        <?
                        }
                }?>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td width="40%">تعداد .......... قلم از کالای فوق تحویل گردید.
                    <br>
                    مسئول انبار
                </td>
                <td>مدیر انبار</td>
                <td>انتظامات</td>
            </tr>
            <tr><td colspan="3">موضوع مصرف : </td></tr>
            <tr><td colspan="3">محل مصرف : </td></tr>
        </table>
    </div>
      <table width="100%">
        <tr>
            <td>نسخه سفید : امور مالی</td>
            <td>سبز : انبار</td>
            <td>آبی : درخواست کننده</td>
            <td>قرمز : انتظامات</td>
        </tr>
    </table>
</div> 