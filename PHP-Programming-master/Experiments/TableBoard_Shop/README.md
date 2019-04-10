# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

    create table tableboard_shop(
    num int not null auto_increment, 
    date char(20),
    order_id int,
    name char(20),
    price int,
    quantity int,
    primary key(num)
    );
  
Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    
## index.php 수정
    $connect = mysql_connect("localhost","kkh","1231");
    mysql_select_db("kkh_db", $connect);
   mysql에 데이터 베이스 연결을 위해 해당 문장을 사용하였으며
   
    $sql = "select * from tableboard_shop;";
   select * from을 통하여 tableboard_shop 테이블을 가져왔다.
   
    $total = ($row[price] * $row[quantity]);
   total은 굳이 테이블을 생성할 때 만들지 않은 변수이고 price와 quantity의 곱이므로 해당 문장을 통하여 선언을 하였다.
   

## board_form.php 수정
    $sql = "select * from tableboard_shop where num = $_GET[num];";
   인덱스와 같이 데이터베이스 연결 이후 num에 해당하는 레코드를 가져오기 위해서 where num = $_GET[num]을 추가 하였다.
   또 update form 에서 수정을 하기 전 상태의 값을 먼저 보여주기 위해 form에 value 값에 echo("$row[]"); 형식으로 넣었다.
## function
### insert.php 수정
    $sql = "insert into tableboard_shop (date, order_ID, name, price, quantity) values";
    $sql .= "('$_POST[date]',$_POST[order_id],'$_POST[name]',$_POST[price],$_POST[quantity])";
   해당 문장을 통하여 연결된 테이블 tableboard_shop에 새로운 레코드를 추가 하기 위해서 insert into로 date,order_id 등 각각
   값을 넣어주어서 추가시킨다.

### update.php 수정
    $sql = "update tableboard_shop set date='$_POST[date]', order_id='$_POST[order_id]', name='$_POST[name]', price='$_POST[price]', quantity='$_POST[quantity]' where num = '$_GET[num]'";
update - set - where 구문을 통하여 해당하는 num에 레코드를 post로 새로 받아 수정하는 문장을 만들었다.
### delete.php 수정
    $sql = "delete from tableboard_shop where num = $_GET[num]";
  delete from - where을 통하여 해당하는 num에 레코드를 삭제하는 문장을 만들었다.
