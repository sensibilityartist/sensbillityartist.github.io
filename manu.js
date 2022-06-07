function updateAll(){

    // input의 id값 수량을 가져와서 n1~n3까지 임의의 변수를 만들어서 집어넣습니다.
    var n1 = document.getElementById("coffee").value;
    var n2 = document.getElementById("lat").value;
    var n3 = document.getElementById("wap").value;
       
    
    var p1 = 2500* n1;
    var p2 = 3000* n2;
    var p3 = 2800* n3;
       
    // 각각 계산된 값을 합계값을 ~Total 까지 각각 넣어줍니다.
    document.getElementById("coffeeTotal").value = p1 + "원";
    document.getElementById("latTotal").value = p2 + "원";
    document.getElementById("wapTotal").value = p3 + "원";
       
    // 수량이 들어갈 곳의 id인 totalNumber에 n1~n3 까지의 합을 계산해서 넣어줍니다.
    // 문자열로 인식해서 정수형으로 바꿔줬습니다.
    // 원래소스 : 1 + 2 + 3 = 123 --> 수정소스 : 1 + 2 + 3 = 6   
    var totalNumber = parseInt(n1) + parseInt(n2) + parseInt(n3);
    document.getElementById("totalNumber").value = "주문한 메뉴:" + totalNumber + "개";
       
    
    var totalPrice = p1 + p2 + p3 + "원";
    document.getElementById("totalPrice").value = totalPrice;
    }
    

    function setClock(){
        var dateInfo = new Date(); 
        var hour = modifyNumber(dateInfo.getHours());
        var min = modifyNumber(dateInfo.getMinutes());
        var sec = modifyNumber(dateInfo.getSeconds());
        var year = dateInfo.getFullYear();
        var month = dateInfo.getMonth()+1; //monthIndex를 반환해주기 때문에 1을 더해준다.
        var date = dateInfo.getDate();
        document.getElementById("time").innerHTML = hour + ":" + min  + ":" + sec;
        document.getElementById("date").innerHTML = year + "년 " + month + "월 " + date + "일";
    }
    function modifyNumber(time){
        if(parseInt(time)<10){
            return "0"+ time;
        }
        else
            return time;
    }
    window.onload = function(){
        setClock();
        setInterval(setClock,1000); //1초마다 setClock 함수 실행
    }