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
                تاریخ: <?=str_replace('-','/',$param['formValue']['date'])?>
                <br>
                شماره:<?=$param['formValue']['number']?>
                <br>
                پیوست:<?=$param['formValue']['attachment']?>
            </div> 
        </div>  
        <div style="clear: both; text-align: center; margin:20px auto 30px auto; font-size:15px;"><strong>سال دولت و ملت، همدلی و همزبانی</strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><strong>شركت محترم <?=$param['formValue']['sherkatName']?></strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><p>باسلام ، احتراما پيرو مذاكره تلفني وعطف به سفارش خريد قطعي <?=$param['trade']['aghlam']['data']['quantity'].' '.$param['trade']['aghlam']['data']['vahed'].' '.$param['trade']['generalInfo']['data']['title']?> از طريق 
        <?=$param['formValue']['kargozariName']?> در بورس كالاي ايران    ، خواهشمند است دستور فرمائيد اجناس مذكور را به آدرس هاي مشروحه ذيل ارسال نمايند. ضمنا شماره تماس <?=$param['formValue']['shomareAfradeTahvilGirande']?> جهت هماهنگيهاي لازم اعلام ميگردد
        </p>
          <ol>
            <?
                $tfiArr = $param['trade']['aghlam']['data'];
                if(count($tfiArr)>0)
                { 
                    $counter = 0;
                    foreach($tfiArr as $value)
                    {
                        ?>
                        <li><?=$value['title']?></li>
                        <? 
                    }
                } ?>
          </ol>
         </div>

    
        </br>                                   
        </br>
        <div style="font-weight: bold; text-align: left; margin-left: 150px;">
            <div><?=$param['role']['generalInfo']['data'][2]['lname']?></div>
            <div>مدیر امور تدارکات</div>
        </div>
        <div style="text-align: right;"> 
            <p>رونوشت به: شركت محترم <?=$param['formValue']['kargozariName']?> پيرو نامه شماره 
            <?=$param['formValue']['shomareNamehKargozari']?> مورخ <?=str_replace('-','/',$param['formValue']['namehKargozariDate'])?> جهت استحضار</p> 
            <p>رونوشت به : معاونت محترم مالي وپشتيباني جهت استحضار وصدور دستورات لازم</p> 
            <p>رونوشت به : معاونت محترم برنامه ريزي ومهندسي جهت استحضار</p> 
            <p>رونوشت به: <?=$param['formValue']['rooneveshte4']?></p> 
            <p>اداره محترم انبارها جهت اطلاع وهماهنگيهاي لازم</p> 
            <p>رونوشت به: <?=$param['formValue']['roonevesht6']?></p>
        </div>  
    </div>
</div>  
