# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)
[만약 추가한 파일이 있으면, 내용 추가! 없으면 이 문구 삭제!]
```

## board.php (수정)
    <?php
        $connect = mysql_connect('localhost','kkh','1231');
        mysql_select_db('kkh_db', $connect);
        $sql = "select * from boardz where title like '%$_POST[search]%'";
        $result = mysql_query($sql, $connect);
        $cnt = 0;
        while($row = mysql_fetch_array($result)) {
            $cnt++;
        } 
        $max_line = (int)($cnt / 3);
    ?>
 
PPT에 적혀있는 힌트와 같이 테이블에서 검색한 타이틀을 불러온다. 테이블 안의 원소 개수를 우선
카운트를 하기 위해서 while 문을 통하여 개수를 확인한다. 문제에서 원소들을 3열씩 혹은 1개일때는
1열씩 나열하므로 이를 위해서 몇개 단위로 나눌것인지를 정하는 변수 max_line을 추가한다.예를 들어
 원소 개수가 7개일때는 2/2/3으로 2개단위로 열넘김, 3개일때는 1/1/1으로 1개단위로 열넘김을 하기 위함이다.
 
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
                    } //원소 max_line의 배수이면 열넘김
                }
            }
            echo("</ul>");
    ?>

이후 출력을 위해서 다시금 원소 번호를 나타내는 변수 num과 몇번째 라인인지 나타내는 변수 line_num을 초기화한다.
이후 출력을 하면서 먼저 최대 라인수는 3개이므로 if문을 통하여 3번째줄이면 max_line과 상관없이 그 라인에 
다음 원소를 넣게 한다. 3번째줄을 넘지 않았을 시에는 원소번호가 max_line의 배수이면 다음 라인으로 넘기게끔 한다.
 