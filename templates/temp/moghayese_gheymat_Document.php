<div style="width: 100%; margin-left: auto; margin-right: auto; text-align: center;">
<table align="center" cellspacing="0" style="border: solid 1px;">
    <tr>
        <td class="list_row_title" colspan="20">جدول مقایسه قیمت استعلامبهاء<?=$param['trade']['generalInfo']['data']['code']." ".$param['trade']['generalInfo']['data']['title']?></td>
    </tr>
    <tr style="border: solid 1px;">
        <td rowspan="2" style="border: solid 1px;">ردیف</td>
        <td rowspan="2" style="border: solid 1px;">شرح لوازم</td>
        <td rowspan="2" style="border: solid 1px;">تعداد (اصله)</td>
        <?
            foreach($param['trade']['girandegan_pishnahadat']['data'] as $key)
            {
        ?>
        <td colspan="2" style="border: solid 1px;"><?=$key['title']?></td>
        <?
            }
        ?>
    </tr>
    <tr>
        <?
            foreach($param['trade']['girandegan_pishnahadat']['data'] as $key)
            {
        ?>
        <td style="border: solid 1px;">بهای واحد</td>
        <td style="border: solid 1px;">بهای کل</td>
        <?
            }
        ?>
    </tr>
    <?
        $i = 1;
        foreach($param['trade']['aghlam']['data'] as $key)
        {
            $class = ($i%2) == 0 ? 'list_row_even' : 'list_row_odd';
    ?>
    <tr class="<?=$class?>">
        <td style="border: solid 1px;"><?=$i?></td>
        <td style="border: solid 1px;"><?=$key['title']?></td>
        <td style="border: solid 1px;"><?=$key['quantity']?></td>
        <?
            foreach($param['trade']['girandegan_pishnahadat']['data'] as $key_p)
            {
                /*var_dump($param['trade']['fehrestbaha_pishnahadat']['data']);
                var_dump($key);
                var_dump($key_p);
                die(); */
                $pishnahadArr = $param['trade']['fehrestbaha_pishnahadat']['data'][$key_p['id']][$key['id']];
        ?>
        <td style="border: solid 1px;"><?=$pishnahadArr['mavad_basePrice']?></td>
        <td style="border: solid 1px;"><?=$pishnahadArr['totalCost']?></td>
        <?
            }
        ?>
    </tr>
    <?
        $i++;
        }
    ?>
    <tr>
        <td colspan="2" style="border: solid 1px;">جمع کل</td>
        <td style="border: solid 1px;"></td>
        <?
            foreach($param['trade']['girandegan_pishnahadat']['data'] as $key)
            {
                $pishnahadArr = $param['trade']['fehrestbaha_pishnahadat']['data'][$key['id']];
        ?>
        <td style="border: solid 1px;"></td>
        <td style="border: solid 1px;"><?=$pishnahadArr['sum_totalCost']?></td>
        <?
            }
        ?>
    </tr>
</table>
<table align="center" width="100%">
    <tr>
        <td colspan="6" height="50px">رحمت یوسفی  ( مامور خرید )</td>
        <td colspan="6">قاسم طاهری ( سرپرست اداره خریدهای داخلی )</td>
        <td colspan="6">بهيار ابراهيمي ( مدير امورتداركات )</td>
    </tr>
    <tr>
        <td colspan="9" height="50px">علی رحمانی  ( معاون مالی و پشتیبانی  )</td>
        <td colspan="9"> مهدی متقی مجد ( معاون برنامه ريزي و مهندسي )</td>
    </tr>
    <tr>
        <td colspan="18" height="50px">قاسم شهابی ( رئیس هیئت مدیره و  مدیر عامل )</td>
    </tr>
</table>
</div>