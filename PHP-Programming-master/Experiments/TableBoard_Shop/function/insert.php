<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */
$connect = mysql_connect("localhost","kkh","1231");
mysql_select_db("kkh_db", $connect);
$sql = "insert into tableboard_shop (date, order_ID, name, price, quantity) values";
$sql .= "('$_POST[date]',$_POST[order_id],'$_POST[name]',$_POST[price],$_POST[quantity])";
$result = mysql_query($sql,$connect);
# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!

# 참고 : 에러 메시지 출력 방법
#echo "<script> alert('insert - error message') </script>";

?>

<script>
    location.replace('../index.php');
</script>
