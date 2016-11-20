<?
$tb = new businessTrade();
$ttb = new businessTrade_team();
$tableId = $param['trade']['generalInfo']['data']['id'];
$tRow = $tb->getRow("'$tableId'");
$ttResult = $ttb->select("trade_team.tradeId = '$tableId' and trade_team.userId = user.id and trade_team.userType=4", "", "", "trade_team.*, user.fname, user.lname, user.username", 'trade_team, user');
$frm_pmvb = new businessFrm_permission_module_value();
$ub = new businessUser();
$db = new businessDocuments();

$frm_pmvResult = $frm_pmvb->select("frm_permission_module.id = frm_permission_module_value.frm_permission_moduleId and frm_permission_module.systemKey = 'trade_team_sematType'", '', '', 
    'frm_permission_module_value.title, frm_permission_module_value.value', 
    'frm_permission_module, frm_permission_module_value');
$frm_pmvArr = array();
while($frm_pmvRow = mysql_fetch_object($frm_pmvResult))
{
    $frm_pmvArr[$frm_pmvRow->value] = $frm_pmvRow->title;
}
$muArr = array();
$username = array();
while($ttRow = mysql_fetch_assoc($ttResult))
{
    $uRow = $ub->getRow($ttRow['userId']);
    $ttRow['fileEmza'] = $uRow->fileEmza;
    $muArr[$ttRow['sematType']][] = $ttRow;
    $username[] = $ttRow['username']; 
}

mysql_select_db('core');

$postArr = array();
foreach($username as $user)
{
    $query = 'SELECT organization_posts.title FROM user,user_organization_posts, organization_posts WHERE user.id = user_organization_posts.userId and user_organization_posts.organization_postsId = organization_posts.id and user.username = '.$user;
    $result = mysql_query($query);
    $row = mysql_fetch_object($result);
    $postArr[$user] = $row->title;

}
mysql_select_db('trs');
$mainMembers = $muArr[10]; 
$otherMembers = $muArr[11]; 
$madovMembers = $muArr[12]; 
$dabirMembers = $muArr[13]; 
$nazerMembers = $muArr[14]; 

$tradeRow = $param['trade']['generalInfo']['data'];
?>                          
<br/>
<table cellspacing="0" cellpadding="5px" style="font-size: 11px;">
    <tr>
        <td>
            <table width="100%" cellspacing="0" cellpadding="5px">
                <tr>
                    <td style="border: 1px solid #000;">تاريخ: <?=str_replace('-','/',$param['formValue']['jalaseDate'])?></td>
                    <td align="center" style="border-top: 1px solid #000;">وزارت نيرو</td>
                    <td style="border-top: 1px solid #000;border-right: 1px solid #000;border-left: 1px solid #000;">شماره جلسه: <?=$param['formValue']['jalaseNumber']?></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">ساعت شروع: <?=$param['formValue']['jalaseStartHour']?></td>
                    <td align="center">شركت توزيع نيروي برق آذربايجانغربي</td>
                    <td style="border-right: 1px solid #000;border-left: 1px solid #000;">صفحه</td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">ساعت ختم جلسه: <?=$param['formValue']['jalaseEndHour']?></td>
                    <td align="center">عنوان  جلسه</td>
                    <td style="border-right: 1px solid #000;border-left: 1px solid #000;">دستورات جلسه بعدي : <?=$param['formValue']['jalaseBadiDastoorat']?></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">محل جلسه: <?=$param['formValue']['jalasePlace']?></td>
                    <td align="center">كميسيون مناقصه</td>
                    <td align="center" style="border-right: 1px solid #000;border-left: 1px solid #000;"></td>
                </tr>
                <tr>
                    <td style="border: 1px solid #000;">دبیرجلسه: <?=$param['formValue']['jalaseDabir']?></td>
                    <td style="border-bottom: 1px solid #000;"></td>
                    <td style="border-bottom: 1px solid #000; border-right: 1px solid #000;border-left: 1px solid #000;"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" style="border:1px solid #000;" cellpadding="5px">
                <tr>
                    <td>اعضاي اصلي  كميسيون:
                        <?//$comission = $param['trade']['team']['data']['comission'];
                        $cArr = array();
                        foreach($mainMembers as $member)
                        {
                            $cArr[] = $member['fname'].' '.$member['lname'];
                        }

                        echo implode(' - ', $cArr);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>ساير اعضا ومدعوين :
                        <?
                        $cArr = array();
                        foreach($otherMembers as $member)
                        {
                            $cArr[] = $member['fname'].' '.$member['lname'];
                        }

                        foreach($madovMembers as $member)
                        {
                            $cArr[] = $member['fname'].' '.$member['lname'];
                        }

                        echo implode(' - ', $cArr);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>ناظر :   
                        <?
                        $cArr = array();
                        foreach($nazerMembers as $member)
                        {
                            $cArr[] = $member['fname'].' '.$member['lname'];
                        }

                        echo implode(' - ', $cArr);
                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" cellpadding="5px">
                <tr>
                    <td style="border:1px solid #000;" align="center" width="30px">رديف</td>
                    <td style="border:1px solid #000;" width="75%">موضوعات ونكات بحث شده درجلسه</td>
                    <td style="border:1px solid #000;" width="10%">اقدام كننده</td>
                    <td style="border:1px solid #000;" width="10%">تاريخ نتيجه اقدام</td>
                </tr>
                <tr>
                    <td style="border:1px solid #000;"></td>
                    <td style="border:1px solid #000;">
                        <table>
                            <tr>
                                <td>دستورات جلسه: ليست كوتاه شركتهاي ارزيابي شده جهت دعوت به مناقصه محدود</td>
                            </tr>
                            <tr>
                                <td>تصميمات كميسيون: به استناد تصميمات كميسيون مناقصه مبني بر انجام مناقصه محدود <?=$param['trade']['specInfo']['data']['bargozariType']?> <?=$param['trade']['generalInfo']['data']['title']?>
                                    ونامه هاي شماره <?=$param['formValue']['first_letter_number']?> مورخ <?=str_replace('-', '/', $param['formValue']['first_letter_date'])?> <?=$param['formValue']['first_letter_subject']?> و <?=$param['formValue']['second_letter_number']?> مورخ <?=str_replace('-', '/', $param['formValue']['second_letter_date'])?> <?=$param['formValue']['second_letter_subject']?> كميته فني و بازرگاني ، موضوع در كميسيون مناقصه مطرح و پس از بررسي ضمن موافقت با ليست مذكور مقرر گرديد برابر صورتجلسه تاييد كفايت اسناد ، مناقصه بصورت محدوددومرحله اي با دعوت از شركتهاي مشروحه ذيل انجام گيرد.</td>
                            </tr>
                            <?
                            $counter = 0;
                            foreach($param['trade']['girandegan']['data'] as $mpRow)
                            {
                                $counter++;
                                ?>
                                <tr><td><?=$mpRow['title']?></td></tr>
                                <?
                            }
                            ?>
                            <tr>
                                <td>اعضاي اصلي كميسيون : آقايان وخانمها</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%">
                                        <?
                                        $i = 0;
                                        foreach($mainMembers as $member)
                                        {
                                            if($i%3==0)
                                            {
                                                ?>
                                                <tr>
                                                    <?
                                                }
                                                ?>
                                                <td height="50px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                <?if($tradeRow['varchar1_2'] == 1)
                                                {?>
                                                <br><?=$db->getImageTag($member['fileEmza'], '', 100);
                                                }?>
                                                </td>
                                                <?
                                                if($i%3==2 || $i == (count($mainMembers)-1))
                                                {
                                                    ?>
                                                </tr>
                                                <?
                                            }
                                            $i++;
                                        }?>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>ساير اعضا  :آقايان وخانمها</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%">
                                        <?
                                        $i = 0;
                                        foreach($otherMembers as $member)
                                        {
                                            if($i%3==0)
                                            {
                                                ?>
                                                <tr>
                                                    <?
                                                }
                                                ?>
                                                <td height="50px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                <?if($tradeRow['varchar1_2'] == 1)
                                                {?>
                                                <br><?=$db->getImageTag($member['fileEmza'], '', 100);
                                                }?>
                                                </td>
                                                <?
                                                if($i%3==2 || $i == (count($otherMembers)-1))
                                                {
                                                    ?>
                                                </tr>
                                                <?
                                            }
                                            $i++;
                                        }?>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>مدعوین :آقايان وخانمها</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%">
                                        <?
                                        $i = 0;
                                        foreach($madovMembers as $member)
                                        {
                                            if($i%3==0)
                                            {
                                                ?>
                                                <tr>
                                                    <?
                                                }
                                                ?>
                                                <td height="50px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                <?if($tradeRow['varchar1_2'] == 1)
                                                {?>
                                                <br><?=$db->getImageTag($member['fileEmza'], '', 100);
                                                }?>
                                                </td>
                                                <?
                                                if($i%3==2 || $i == (count($madovMembers)-1))
                                                {
                                                    ?>
                                                </tr>
                                                <?
                                            }
                                            $i++;
                                        }?>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>ناظر :</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%">
                                        <?
                                        $i = 0;
                                        foreach($nazerMembers as $member)
                                        {
                                            if($i%3==0)
                                            {
                                                ?>
                                                <tr>
                                                    <?
                                                }
                                                ?>
                                                <td height="50px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                <?if($tradeRow['varchar1_2'] == 1)
                                                {?>
                                                <br><?=$db->getImageTag($member['fileEmza'], '', 100);
                                                }?>
                                                </td>
                                                <?
                                                if($i%3==2 || $i == (count($nazerMembers)-1))
                                                {
                                                    ?>
                                                </tr>
                                                <?
                                            }
                                            $i++;
                                        }?>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>دبيركميسيون : </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%">
                                        <?
                                        $i = 0;
                                        foreach($dabirMembers as $member)
                                        {
                                            if($i%3==0)
                                            {
                                                ?>
                                                <tr>
                                                    <?
                                                }
                                                ?>
                                                <td height="50px"><?=$member['fname'].' '.$member['lname'];?><br><?=$postArr[$member['username']]?>
                                                <?if($tradeRow['varchar1_2'] == 1)
                                                {?>
                                                <br><?=$db->getImageTag($member['fileEmza'], '', 100);
                                                }?>
                                                </td>
                                                <?
                                                if($i%3==2 || $i == (count($dabirMembers)-1))
                                                {
                                                    ?>
                                                </tr>
                                                <?
                                            }
                                            $i++;
                                        }?>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>كدفرم : : 1121FR002</td>
                            </tr>
                        </table>
                    </td>
                    <td style="border:1px solid #000;"></td>
                    <td style="border:1px solid #000;"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>