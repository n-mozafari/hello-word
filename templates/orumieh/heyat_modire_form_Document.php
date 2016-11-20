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
        <table style="clear: both; text-align: right; border: solid 2px; margin:20px auto 30px auto; font-size:15px; width: 100%;">
            <tr>
                <td><strong>عنوان : صورت جلسه هیئت مدیره</strong></td>
                <td><strong>شماره جلسه : <?=$param['formValue']['number']?></strong></td>
                <td><strong>تاریخ : <?=str_replace('-','/',$param['formValue']['date'])?></strong></td>
                <td><strong>ساعت : <?=$param['formValue']['jalaseHour']?></strong></td>
            </tr>
            <tr>
                <td colspan="2"><strong>مکان جلسه : </strong>دفتر مدير عامل</td>
            </tr>
        </table>
          
        <table cellspacing="0" cellpadding="10" style="clear: both; text-align: right; border: solid 1px; margin:20px auto 30px auto; font-size:15px; width: 100%;">
            <tr>
                <td style="width: 25%; border-bottom: solid 1px; border-left: solid 1px;">اعضای هيات مديره حاضر در جلسه </td>
                <td style="border-bottom: solid 1px;"></td>
            </tr>
            <tr>
                <td style="width: 25%; border-bottom: solid 1px; border-left: solid 1px;">غائبين -</td>
                <td style="border-bottom: solid 1px;"></td>
            </tr>
            <tr>
                <td style="width: 25%; border-left: solid 1px;">مدعوين -</td>
                <td></td>
            </tr>
        </table>
        
        <strong>دستور جلسه : </strong>
        <table cellspacing="0" cellpadding="10" style="clear: both; text-align: center; border: solid 1px; margin:20px auto 30px auto; font-size:15px; width: 100%;">
            <tr>
                <td style="width: 10%; border: solid 1px;">ردیف</td>
                <td style="width: 20%; border: solid 1px;">پیشنهاد دهنده</td>
                <td style="width: 20%; border: solid 1px;">شماره و تاریخ درخواست</td>
                <td style="width: 50%; border: solid 1px;">موضوع درخواست</td>
            </tr>
            <tr style="height: 100px;">
                <td style="width: 10%; border: solid 1px;"></td>
                <td style="width: 20%; border: solid 1px;"></td>
                <td style="width: 20%; border: solid 1px;"></td>
                <td style="width: 50%; border: solid 1px;"></td>
            </tr>
        </table>
        
        <strong>تصمیمات متخذه به ترتیب دستور جلسه : </strong>
        <table cellspacing="0" cellpadding="10" style="clear: both; text-align: center; border: solid 1px; margin:20px auto 30px auto; font-size:15px; width: 100%;">
            <tr>
                <td style="width: 10%; border: solid 1px;">ردیف</td>
                <td style="width: 45%; border: solid 1px;">تصميمات اتخاذ شده</td>
                <td style="width: 15%; border: solid 1px;">استناد قانونی تصميمات</td>
                <td style="width: 15%; border: solid 1px;">مسئول اجرا</td>
                <td style="width: 15%; border: solid 1px;">آراء موافق و مخالف</td>
            </tr>
            <tr style="height: 200px;">
                <td style="width: 10%; border: solid 1px;"></td>
                <td style="width: 45%; border: solid 1px;"></td>
                <td style="width: 15%; border: solid 1px;"></td>
                <td style="width: 15%; border: solid 1px;"></td>
                <td style="width: 15%; border: solid 1px;"></td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: right;"><strong>٭ چنانچه بعضی از اعضا با تمام يا بخشی از مصوبات مطروحه مخالف  می باشد مشروحا" قيد گردد . </strong></td>
            </tr>
            <tr>
                <td colspan="5"><table cellspacing="0" cellpadding="10" style="clear: both; text-align: center; border: solid 1px; font-size:15px; width: 100%;">
                
            <tr>
                <td style="width: 25%; border: solid 1px;">سمت</td>
                <td style="width: 25%; border: solid 1px;">رئيس هيات  مديره و مدير عامل</td>
                <td style="width: 25%; border: solid 1px;">عضو اصلی و نائب رئيس هيات مديره</td>
                <td style="width: 25%; border: solid 1px;">عضو اصلی هيات مديره</td>
            </tr>
            <tr>
                <td style="width: 25%; border: solid 1px;">نام و نام خانوادگی</td>
                <td style="width: 25%; border: solid 1px;">حميد كاظمي كيا</td>
                <td style="width: 25%; border: solid 1px;">عباس پيري</td>
                <td style="width: 25%; border: solid 1px;">سعيد عظيمي</td>
            </tr>
            <tr>
                <td style="width: 25%; border: solid 1px;">امضاء</td>
                <td style="width: 25%; border: solid 1px;"></td>
                <td style="width: 25%; border: solid 1px;"></td>
                <td style="width: 25%; border: solid 1px;"></td>
            </tr>
                </table></td>
            </tr>
        </table>
  
    </div>
</div>  
