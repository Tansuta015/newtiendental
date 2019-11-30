<?php
session_start(); 
$servername = "db";
$username = "root";
$password = "test";
$dbname = "tienden";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/navbar.css">
    <style>
				
                body {
                min-height: 75rem;
                padding-top: 3.9rem;
}
        </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-md fixed-top" style="background: #00bcd5; ">
    <img src="img/tooth.png" href="/home.php" width="50" height="45">

    
    <h2><a class="display-8" href="/home.php">TIEN DENTAL</a></h2>
</nav>
    <div id="wrapper" class="toggled">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">

                <div class="sidebar-menu">
                    <ul>

                        <li class="sidebar-dropdown">
                            <a href="#">
                                <span>จัดการคิว</span>

                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                <li>
                                        <a href="/calendar.php">จองคิว</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>

                        <!-- sidebar-menu  -->
                        <li> <a href="/appoints.php">ใบนัด</a> </li>
                        
                        <li> <a href="/history.php">ประวัติการรักษา</a> </li>
                        
                        <li> <a href="/home.php">ออกจากระบบ</a> </li>

                    </ul>
                </div> <!-- /#sidebar-wrapper -->

        </div> <!-- /#wrapper -->
  
      
      <form action="insertappoints.php" method="post">
      <div class="container">
    
            <form class="form-horizontal" role="form"><br><br>
                <div class="text-center">
                    <h2>กรอกข้อมูลวันที่นัดหมาย</h2>
                </div>
<br>
<div class="form-group">
                        <label name="num">เลขสมาชิก :</label>
               <?php 
         
            $Customernum =  $_SESSION['UserID'];
           
            $_SESSION['UserID'] = $Customernum;

            $sql = "SELECT Customernum FROM customer WHERE CusID = $Customernum";
            //echo 'aaaa';
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            echo "<input type='text' name='mnumber' class='form-control' disabled='disabled' value='$row[0]'>";

        ?>
</div>
                <!-- celendar -->
                <div class="form-group col-md-3">
            <label for="input">วัน/เดือน/ปี :</label>
                <input id="datepicker" name="start" onchange="fillterdate()" width="555"   >
                
               
                </div>
                <!-- time -->
               <br>
               <input type="hidden" id="custId" name="custId" >
             <div class="form-group">
                    <label for="input"  >เวลาการรักษา :</label>
                    <select id="show" name="Time"  onchange="tttt()"class="form-control" required>
                    <!-- <option disabled  selected  >โปรดระบุเวลาการรักษา</option> -->
                                <!-- <option value="" disabled >จันทร์-ศุกร์</option>
                                <option value="17:00-17:45" >17:00-17:45</option>
                                <option value="17:45-18:30" >17:45-18:30</option>
                                <option value="18:30-19:15" >18:30-19:15</option>
                                <option value="19:15-20:00" >19:15-20:00</option>
                                <option value="" disabled >เสาร์-อาทิตย์</option>
                                <option value="09:00-09:45" >09:00-09:45</option>
                                <option value="09:45-10:30" >09:45-10:30</option>
                                <option value="10:30-11:15" >10:30-11:15</option>
                                <option value="11:15-12:00" >11:15-12:00</option>
                                <option value="13:00-13:45" >13:00-13:45</option>
                                <option value="13:45-14:30" >13:45-14:30</option>
                                <option value="14:30-15:15" >14:30-15:15</option>
                                <option value="15:15-16:00" >15:15-16:00</option>
                                <option value="16:00-16:45" >16:00-16:45</option>
                                <option value="16:45-17:30" >16:45-17:30</option> -->
                               
                    </select>
                </div>

               
       <!-- ประเภทการรักษา -->
       <div class="form-group">
                    <label for="input"  >ประเภทการรักษา :</label>
                    <select id="input" name="type"  class="form-control">
                        <option selected  >โปรดระบุประเภทการรักษา</option>
                        <option >ทันตกรรมพื้นฐาน</option>
                        <option >ทันตกรรมเพื่อความงาม</option>
                        <option >ทันตกรรมโรคเหงือก</option>
                        <option >ทันตกรรมรากฟันเทียม</option>
                        <option >ทันตกรรมรักษารากฟัน</option>
                        <option >ทันตกรรมอื่นๆ</option>
                    </select>
                </div>
     
<!-- หมายเหตุ -->
        <div class="form-group">
        <label for="exampleFormControlTextarea1">หมายเหตุการรักษา :</label>
        <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="5" required="required"></textarea>
        </div>
 

                <!-- ปุม -->
               <div class="col text-center">

               
               <input id="prodId" name="days" type="hidden" >       
             <button type="button"   class="btn btn-success btn-lg" role="button" >บันทึก</button>
              
             <!-- <input type="submit  class="  btn-success btn-lg "  value="บันทึก" > -->
                <!-- <input type="reset"   class="  btn-primary btn-lg "  value="รีเซ็ต" > -->
                </div>
               

                <!-- Button trigger modal -->
 <!-- <button>Trigger submit event</button> -->

        </div>

        </form> <!-- /form -->
       
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
    <script>
                    var today = new Date();
                    $('#datepicker').datepicker({
                       format:'yyyy-mm-dd',
                       minDate: today,
                        // uiLibrary: 'bootstrap4'


                    });
                   
var forDeletion = [];
var arrAfterDel = [];

function fillterdate(){
 
  
  // arrAfterDel.pop();
  // console.log(arrAfterDel,"HHHH");
  var a = document.getElementById("datepicker").value;
  //alert(a);
  document.getElementById("show").innerHTML = ""
  var d = new Date(a);
  var day = d.getDay();
  //alert(day);
  console.log("date ::" + a);
  console.log("day ::" + day);
  var day = localStorage.setItem('day', day)
  var day = localStorage.getItem("day")
  
  
  var arrmon = ["17:00-17:45","17:45-18:30","18:30-19:15","19:15-20:00"];

  var arrsat = ["09:00-09:45","09:45-10:30","10:30-11:15","11:15-12:00",
          "13:00-13:45","13:45-14:30","14:30-15:15","15:15-16:00",
          "16:00-16:45","16:45-17:30"];

   
  ////เสาร์-อาทิตย์
         var day = localStorage.getItem("day")


          if (day == "0" || day == "6") {
          document.getElementById("show").innerHTML += "<option value='' disabled selected>โปรดระบุเวลาการรักษา</option>";
          // console.log("เวลาที่ไม่ต้องแสดง :" + forDeletion);
          console.log(arrsat);
                                            
          /// คำสั่งลบของเสาร์-อาทิตย์ arrimeSS
          arrAfterDel = arrsat.filter(function (value, index, arr) {
          if (!forDeletion.includes(value)) {
          return value;
          }
          
          }
          
        
          )
         
         for (let n = 0; n < arrAfterDel.length; n++) {
                                
          document.getElementById("show").innerHTML += "<option value=" + arrAfterDel[n] + ">" + arrAfterDel[n] + "</option>";
           }
           
          }else {
          document.getElementById("show").innerHTML += "<option value='' disabled selected>โปรดระบุเวลาการรักษา</option>";
           console.log("เวลาที่ไม่ต้องแสดง :" + forDeletion);
          console.log(arrmon);
                                            

          ///คำสังลบของจันทร์-ศุกร์ arrimeMF
          arrAfterDel = arrmon.filter(function (value, index, arr) {
          if (!forDeletion.includes(value)) {
          return value;

          }

          })
           for (let n = 0; n < arrAfterDel.length; n++) {

            document.getElementById("show").innerHTML += "<option value" + arrAfterDel[n] + ">" + arrAfterDel[n] + "</option>";
                                             


            }

           }


}

function tttt(){
  var dayss = localStorage.getItem("day")
  // alert(rrrr)
  document.getElementsByName('days')[0].value=dayss;
}
                 
  
   
   $(document).ready(function (){
  $("form").submit(function(){
   
  });
  $("button").click(function(){
  
 swal({
      title: "",
      text: "ตรวจสอบข้อมูลให้ถูกต้อง ?",
      icon: "warning",
      buttons: [
        'ยกเลิก',
        'บันทึก'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {

          //form.submit(); // <--- submit form programmatically
          $("form").submit();
         
      } else {
        swal("ยกเลิกการบันทึก !" , "กลับสู่หน้าแก้ไข", "error");
      }
    })
  });  
});

                </script>
  
  </body>
</html>