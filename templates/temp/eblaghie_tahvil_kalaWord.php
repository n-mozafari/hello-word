<?$jdf = new jdf()?>
<?
$contentArr[0]['content'] = "شرکت ".$param['trade']['winner']['data']['title'];
$contentArr[0]['type'] = 'paragraph';
$contentArr[1]['content'] = "احتراما به اطلاع می رساند پیشنهاد قیمت آن شرکت در رابطه با استعلام بهای شمار ه".$param['trade']['generalInfo']['data']['code']." با موضوع ".$param['trade']['generalInfo']['data']['title']." به شرح زیر مورد موافقت قرار گرفت:";
$contentArr[1]['type'] = 'paragraph';
$contentArr[2]['content'] = array();
$contentArr[2]['type'] = 'table';
$contentArr[2]['content'] = array();
$contentArr[2]['content'][0][0] = 'ردیف';
$contentArr[2]['content'][0][1] = 'شرح کالا';
$contentArr[2]['content'][0][2] = 'تعداد/مقدار';
$contentArr[2]['content'][0][3] = 'بهای واحد';
$contentArr[2]['content'][0][4] = 'بهای کل';

$tfiArr = $param['trade']['aghlam']['data'];
if(count($tfiArr)>0)
{ 
    $counter = 0;
    foreach($tfiArr as $value)
    {
        $counter++;
        $contentArr[2]['content'][$counter][0] = $counter;
        $contentArr[2]['content'][$counter][1] = $value['title'];
        $contentArr[2]['content'][$counter][2] = $value['quantity'];
        $contentArr[2]['content'][$counter][3] = $value['basePrice'];
        $contentArr[2]['content'][$counter][4] = $value['totalCost'];

    }
    
    $counter++;
    $contentArr[2]['content'][$counter][0] = 'جمع';
    $contentArr[2]['content'][$counter][1] = '';
    $contentArr[2]['content'][$counter][2] = '';
    $contentArr[2]['content'][$counter][3] = '';
    $contentArr[2]['content'][$counter][4] = $param['trade']['aghlam']['sumCost'];
}

$contentArr[3]['content'] = "خواهشمند است با توجه به شرایط استعلام بها نسبت به تحویل کالای فوق به نشانی ".$param['trade']['specInfo']['data']['tahvilPlace']." اقدام لازم صورت پذیرد.";
$contentArr[3]['type'] = 'paragraph';


?>
