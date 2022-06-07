<?php
$link = mysqli_connect("localhost", 'root', '','classscore');
$_GET['order'] = isset($order) ? $_GET['order'] : null;
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>classscore</title>
    <style>
        .input-wrap {
            width: 960px;
            margin: 0 auto;
        }
        h1 { text-align: center; }
        th, td { text-align: center; }
        table {
            border: 1px solid #000;
            margin: 0 auto;
        }
        td, th {
            border: 1px solid #ccc;
        }
        a { text-decoration: none; }
    </style>
</head>
<body>
    <div class="input-wrap">
        <form action="classscore.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th colspan= "3">고객님 성함</th>
                        <th colspan= "2" rowspan="2">메뉴를 선택하세요.</th>
                    </tr>
                    <tr>
                    <td colspan= "3" ><input type="text" name="number" placeholder="ID"></td>
                    </tr>
                    
                </thead>
                <tbody>
                <tr>
                    <tr>
                        <td>커피 : 3000원</td>
                        <td>카페라떼 : 3500원</td>
                        <td>홍차 : 3200원</td>
                        <td>와플 : 3800원</td>
                        <td>치즈케이크 : 3800원</td>
                    </tr>
                    <tr>
                        <td>
                        <select name="name" placeholder="커피">
                        <option value="0" selected>0잔</option>
                        <option value="3000">1잔</option>
                        <option value="6000">2잔</option>
                        <option value="9000">3잔</option>
                        <option value="12000">4잔</option>
                        <option value="15000">5잔</option>
                        </select>
                        </td>
                        <td>
                        <select name="math" placeholder="카페라떼">
                        <option value="0" selected>0잔</option>
                        <option value="3500">1잔</option>
                        <option value="7000">2잔</option>
                        <option value="10500">3잔</option>
                        <option value="14000">4잔</option>
                        <option value="17500">5잔</option>
                        </select>
                        </td>
                        <td>
                        <select name="science" placeholder="홍차">
                        <option value="0" selected>0잔</option>
                        <option value="3200">1잔</option>
                        <option value="6400">2잔</option>
                        <option value="9600">3잔</option>
                        <option value="12800">4잔</option>
                        <option value="16000">5잔</option>
                        </select>
                        </td>
                        <td>
                        <select name="korea" placeholder="와플">
                        <option value="0" selected>0개</option>
                        <option value="3800">1게</option>
                        <option value="7600">2개</option>
                        <option value="11400">3개</option>
                        <option value="15200">4개</option>
                        <option value="19000">5개</option>
                        </select>
                        </td>
                        <td>
                        <select name="english" placeholder="치즈케이크">
                        <option value="0" selected>0조각</option>
                        <option value="3800">1조각</option>
                        <option value="7600">2조각</option>
                        <option value="11400">3조각</option>
                        <option value="15200">4조각</option>
                        <option value="19000">5조각</option>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <input type="submit" name="submit" value="submit">
                            <input type="submit" name="update" value="update">
                            <input type="submit" name="delete" value="delete">
                        </td>
                    </tr>
                </tbody>
            </table>
       </form>
       
        <h1>주문내역</h1>
        <table>
            <thead>
                <tr>
                    <th>고객님 성함</th>
                    <th>커피(잔)</th>
                    <th>카페라떼(잔)</th>
                    <th>홍차(잔)</th>
                    <th>와플(개)</th>
                    <th>치즈케이크(조각)</th>
                    
                    <th>결제액(원)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($_POST['number']) && strlen($_POST['number']) > 0) {
                        if (isset($_POST['submit']) && $_POST['submit'] == "submit" ) {
                            $sum = $_POST['name'] + $_POST['math'] + $_POST['science'] + $_POST['korea'] + $_POST['english'];
                            
                            /* insert */
                            $sql=" INSERT INTO  `scores` ".     //scores -> table name
                            "(`number` , `name` , `math` , `science` , `korea` , `english` , `sum` )".
                            "VALUES ('$_POST[number]',  '$_POST[name]',  '$_POST[math]',  '$_POST[science]',  '$_POST[korea]',
                              '$_POST[english]',  '$sum')";
                            
                        }
                        else if (isset($_POST['update']) &&  $_POST['update'] == "update" ) {
                            $sum = $_POST['name'] + $_POST['math'] + $_POST['science'] + $_POST['korea'] + $_POST['english'];
                            $mean = $sum / 5;
                            /* insert OR update */
                            $sql = "REPLACE INTO  `scores` ".   //scores -> table name
                            "(`number` , `name` , `math` , `science` , `korea` , `english` , `sum` )".
                            "VALUES ('$_POST[number]',  '$_POST[name]',  '$_POST[math]',  '$_POST[science]',  '$_POST[korea]',
                              '$_POST[english]',  '$sum')";
                            
                        }
                        else if ( $_POST['delete'] == "delete" ) {
                            /* delete */
                            $sql = "DELETE FROM  `scores` ".    //scores -> table name
                            "WHERE number = '$_POST[number]'";
                            
                        }
                        mysqli_query($link,$sql);
                    }


                    if(isset($_GET['sorting'])) {
                        if ( $_GET['sorting'] == 'math' ) {
                            $query = 'SELECT * FROM scores ORDER BY math DESC';
                        }
                        else if ( $_GET['sorting'] == "science") {
                            $query = 'SELECT * FROM scores ORDER BY science DESC';
                        }
                        else if ( $_GET['sorting'] == "korea") {
                            $query = 'SELECT * FROM scores ORDER BY korea DESC';
                        }
                        else if ( $_GET['sorting'] == "english") {
                            $query = 'SELECT * FROM scores ORDER BY english DESC';
                        }
                        
                        else if ( $_GET['sorting'] == "sum") {
                            $query = 'SELECT * FROM scores ORDER BY sum DESC';
                        }
                        else {
                            $query = 'SELECT * FROM scores ORDER BY sum DESC';
                        }                        
                    }
                    else {
                        $query = 'SELECT * FROM scores ORDER BY sum DESC';
                    }


                    $result = mysqli_query($link,$query) or die('Query failed: ' . mysqli_error());
                        while ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                        echo "<tr>";
                        foreach ($line as $col_value) {
                            echo "<td>$col_value</td>";
                        }
                        echo "</tr>";
                    }
                    mysqli_free_result($result);
                    mysqli_close($link);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
