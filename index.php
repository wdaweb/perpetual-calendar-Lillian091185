<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>19號蕭妘霓-萬年曆製作</title>
    <style>
    
    .square {

            width: 400px;
            height: 500px;
            
            background-image: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.3)), url(13.jpg);
            position: relative; 
            padding: 10px;
            box-sizing: border-box;
            border-radius: 20px;  
            display: inline-block;        
    }

    .square:after {
            content: "";
            width: calc(100% + 20px);
            height: calc(100% + 20px);
            display: block;
            z-index: -1;
            position: absolute;
            top: -10px;
            left: -10px;
            border-radius:20px;
            filter: blur(5px);
            background-image: linear-gradient(#009fff, #ec2f4b, #FF3B3B,#FFFF4F	);
            background-attachment: fixed;
            background-size: 300% 300%;
            animation-name: bg;
            animation-duration: 6s;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        }
        @keyframes bg {
            0%{
                background-position: 0% 0%;
            }
            100%{
                background-position: 0% 100%;
            }
        }
      
    *{
        list-style-type:none;
        text-align:center;
    }


    .bg{
        background:radial-gradient(ellipse,#FF8C8C,white);
        color: #FF1212;
        cursor: pointer;  
    }
    
    table{
       border-collapse: collapse ; 
       margin:auto;
       border-spacing: 0;
       border: none;
       font-size: 1.5rem;
       
       
     }
    
    table td{
        width: 30px;
        height: 30px;
        padding:10px;
        background-image: radial-gradient(ellipse, pink,white);
        color:	#9999FF;
        border-radius:40%;
       }

    body{
       
        background-image: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.3)), url(1002.gif);
        background-attachment: fixed;
        background-position: center;
        background-size: contain;
        text-shadow: 0px 0px 7px red;
        position: fixed;
        font-family: "微軟正黑體";
        font-weight:bold;
        
        display: flex;
        justify-content: center; 
        align-items: center; 
        width: 100vw;
        height: 100vh; 
    } 
 
   
    h2{
        
        text-align:center;
        color:#FFFFFF;
        
    }
    .h2:hover{
        color: #FFA488;
    }
    
    .a{
        background-image: radial-gradient(ellipse, #FF6E6E	,white);
        color:white;
        text-shadow: 0px 0px 7px orange;  
    }

    .b{
        transform: rotate(-30deg);
        width: 40px;
        margin-right: 0.3rem;
        display: block;
        position: absolute; top:70px; left:30px; 
     }

    .c{
        transform: rotate(30deg);
        width: 40px;
        margin-right: 0.3rem;
        display: block;
        position: absolute; top:70px; right:30px;
    }
       
    </style>
</head>
<body>

<?php

//決定目前的月份

if(!empty($_GET['month'])){

    $month=$_GET['month'];

}else{
        $month=date("m",time());
}


//決定目前的年分

if(!empty($_GET['year'])){

    $year=$_GET['year'];

}else{
        $year=date("Y",time());
}


?>
<div class="square">
<?php

    $sd=[
        9=>"生日",
        10=>"國慶日",
        25=>"光復節",
    ];
    $today=date("Y-m-d"); 
    $todayDays=date("d");
    $start="$year-$month-01";
    $startDay=date("w",strtotime($start));/*這個月第一天星期幾*/
    $days=date("t",strtotime($start));/*這個月有幾天 */
    $endDay=date("w",strtotime("$year-$month-$days"));/*這個月最後一天星期幾 */

    echo "<h2>".date("Y-F",strtotime($start))."</h2>";
  
?> 


<?php
   if(($month-1)>0){
    
    $premonth=$month-1;
    $preyear=$year;

}else{

    $premonth=12;
    $preyear=$year-1;
}
if(($month+1)<=12){

    $nextmonth=$month+1;
    $nextyear=$year;

}else{

    $nextmonth=1;
    $nextyear=$year+1;   
}
?>

<h3>
<a href="?month=<?php echo $premonth ?>&year=<?php echo $preyear ?>"><img src="./16.png" class="b"></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="?month=<?php echo $nextmonth ?>&year=<?php echo $nextyear ?>"><img src="./16.png" class="c"></a>
</h3>

<table>
    <tr>
        <td class="a">Su</td>
        <td class="a">Mo</td>
        <td class="a">Tu</td>
        <td class="a">We</td>
        <td class="a">Th</td>
        <td class="a">Fr</td>
        <td class="a">Sa</td>
    </tr>
<?php
for($i=0;$i<6;$i++){

    echo "<tr>";

    for($j=0;$j<7;$j++){
        if(!empty($sd[$i*7+$j+1-$startDay])){
            $str="";
        }else{
            $str="";
        }
        if($i==0){

            if($j<$startDay){
                 echo "<td></td>";

            }else{
                $d = date("Y-m-d", mktime(0, 0, 0, $month, ($i * 7 + $j + 1 - $startDay), $year));
                if($d==$today){
                    
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{

                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }
        }else{

            if(($i*7+$j+1-$startDay)<=$days){
                $d = date("Y-m-d", mktime(0, 0, 0, $month, ($i * 7 + $j + 1 - $startDay), $year));
                if($d==$today){
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{
                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }else{
                echo "    <td></td>";    
            }
        }
   }
    echo "</tr>";
}

?>
   
</table>
</div>
</body>
</html>