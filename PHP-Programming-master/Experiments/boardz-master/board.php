<!-- 구글 검색 : galley board css => CSS Only Pinterest-like Responsive Board Layout - Boardz.css | CSS ... -->
<!-- 출처 : https://www.cssscript.com/css-pinterest-like-responsive-board-layout-boardz-css/ -->
<?php
$connect = mysql_connect('localhost','kkh','1231');
mysql_select_db('kkh_db', $connect);
$sql = "select * from boardz where title like '%$_POST[search]%'";
$result = mysql_query($sql, $connect);
$cnt = 0;

while($row = mysql_fetch_array($result)) {
    $cnt++;
} //튜플의 개수를 카운트한다.

$max_line = (int)($cnt / 3);
//3열로 나열하기 위해서 다음 열로 넘어가기 위한 단위이다.
//ex) 7개일때는 2/2/3으로 2개단위로 열넘김, 3개일때는 1/1/1으로 1개단위로 열넘김

?>


<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Boardz Demo</title>
    <meta name="description" content="Create Pinterest-like boards with pure CSS, in less than 1kB.">
    <meta name="author" content="Burak Karakan">
    <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
    <link rel="stylesheet" href="src/boardz.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wingcss/0.1.8/wing.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<div class="seventyfive-percent  centered-block">
    <!-- Sample code block -->
    <div>
        <hr class="seperator">

        <!-- Example header and explanation -->
        <div class="text-center">
            <h2>Beautiful <strong>Boardz</strong></h2>
            <div style="display: block; width: 50%; margin-right: auto; margin-left: auto; position: relative;">
                <form method="POST" class="example" action="board.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>

        <!--<hr class="seperator fifty-percent">-->

        <!-- Example Boardz element. -->
        <div class="boardz centered-block beautiful">

            <?php
            $result = mysql_query($sql, $connect);
            $num = 0; //원소 번호
            $line_num = 1; //라인 번호
            echo("$a");
            echo("<ul>");
            while($row = mysql_fetch_array($result)){
                $num++;
                echo("<li> <h1>$row[title]</h1>");
                echo("$row[contents]<br>");
                echo("<img src=$row[image_url] alt=\"demo image\"/></li>");
                if($line_num<3) { //최대 3열이므로 3열이 되면 열넘김을 하지 않는다.
                    if ($num % $max_line == 0 && $max_line!=0) {
                        echo("</ul><ul>");
                        $line_num++; //열넘김을 하였으므로 ++
                    } //원소번호가 max_line의 배수이면 열넘김
                }
            }
            echo("</ul>");
            ?>
        </div>
        <!--
        <div class="boardz centered-block beautiful">
            <ul>
                <li>
                    <h1>PHP</h1>
                    <img src="http://2.bp.blogspot.com/-pINYV0WlFyA/VUK-QcGbU5I/AAAAAAAABcU/fNy2pd2cFRk/s1600/WEB-Jack-White-Poster-Creative.png" alt="demo image"/>
                </li>
                <li>
                    <img src="http://payload140.cargocollective.com/1/10/349041/5110553/Florrie.jpg" alt="demo image"/>
                </li>
            </ul>
            <ul>
                <li>
                    <h1>sumo</h1>
                    <img src="http://wpmedia.ottawacitizen.com/2015/11/01.jpg?quality=55&strip=all&w=840&h=630&crop=1" alt="demo image"/>
                </li>
                <li>
                    <img src="https://s-media-cache-ak0.pinimg.com/736x/8c/ee/ff/8ceeff967c03c7cf4f86391dd6366544.jpg" alt="demo image"/>
                </li>
                <li>
                    <h1>sumo</h1>
                    <img src="https://s-media-cache-ak0.pinimg.com/originals/87/16/8c/87168cbbf07cb54a9793bebaa20b1bde.jpg" alt="demo image"/>
                </li>
            </ul>
            <ul>
                <li>
                    <h1>Sumo Summo</h1>
                    Ex nostrud verterem mea, duo no delicata neglegentur. Audire integre rationibus ut pri, ex cibo oblique euismod sit, cibo iracundia vix at. Legimus torquatos definiebas an nec, mazim postulant at sit. Ne qui quando vocent accusata, nam tritani fierent no. Ea per vocent voluptatibus.
                    <img src="https://s-media-cache-ak0.pinimg.com/736x/22/95/48/229548086245c332443109ca9f2e0890.jpg" alt="demo image"/>
                </li>
                <li>
                    h1>Sumo Summo</h1>
                    Ex nostrud verterem mea, duo no delicata neglegentur. Audire integre rationibus ut pri, ex cibo oblique euismod sit, cibo iracundia vix at. Legimus torquatos definiebas an nec, mazim postulant at sit. Ne qui quando vocent accusata, nam tritani fierent no. Ea per vocent voluptatibus.
                    <br />
                    <img src="https://inspirationfeeed.files.wordpress.com/2014/01/ca402f7410884454ec5c303336e8591d1.jpg" alt="demo image"/>
                </li>
            </ul>
        </div>-->

    </div>

    <hr class="seperator">

</div>
</body>
</html>