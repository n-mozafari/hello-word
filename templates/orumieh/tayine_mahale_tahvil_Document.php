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
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><strong>معاونت محترم برنامه ريزي ومهندسي</strong></div>
        <div style="text-align: right; margin:20px auto 30px auto; font-size:12px;"><p>باسلام ، احتراما باستحضار ميرساند خريد <?=$param['trade']['aghlam']['data']['quantity'].' '.$param['trade']['aghlam']['data']['vahed'].' '.$param['trade']['generalInfo']['data']['title']?> ( <?
                $tfiArr = $param['trade']['aghlam']['data'];
                if(count($tfiArr)>0)
                { 
                    $counter = 0;
                    foreach($tfiArr as $value)
                    {
                        
                        echo " ".$value['title']." ";
                    }
                } ?> )
          قطعي شده و مقرر گرديد حداكثر ظرف مدت <?=$param['formValue']['modatZamaneTahvil']?> تحويل <?=$param['formValue']['mahaleTahvil']?> اين شركت شود خواهشمند است دستور فرمائيد محل هاي تحويل را به تفكيك مقدار مورد نياز جهت اعلام به <?=$param['formValue']['karkhane']?> 
          به اين واحد اعلام نمايند .تسريع در ارسال پاسخ موجب امتنان خواهد بود </p>
         </div>

    
        </br>                                   
        </br>
        <div style="font-weight: bold; text-align: left; margin-left: 150px;">
            <div><?=$param['role']['generalInfo']['data'][2]['lname']?></div>
            <div>مدیر امور تدارکات</div>
        </div>
        <div style="text-align: right;"> 
            <p>رونوشت به: <?=$param['formValue']['roonevesht1']?></p> 
            <p>رونوشت به: <?=$param['formValue']['roonevesht2']?> جهت اطلاع و آمادگي لازم .</p>
        </div>  
    </div>
</div>