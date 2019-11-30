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
  <body>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
    <style>
				#calendar{
					margin-top:10px;
				}
                body {
                min-height: 75rem;
                padding-top: 3.9rem;
}
        </style>
  <!-- idcard -->
  <script type="text/javascript">
        function autoTab(obj) {
            /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย
            หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น  รูปแบบเลขที่บัตรประชาชน
            4-2215-54125-6-12 ก็สามารถกำหนดเป็น  _-____-_____-_-__
            รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____
            หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__
            ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน
            */
            var pattern = new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
            var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
            var returnText = new String("");
            var obj_l = obj.value.length;
            var obj_l2 = obj_l - 1;
            for (i = 0; i < pattern.length; i++) {
                if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                    returnText += obj.value + pattern_ex;
                    obj.value = returnText;
                }
            }
            if (obj_l >= pattern.length) {
                obj.value = obj.value.substr(0, pattern.length);
            }
        }
    </script>

    <script type="text/javascript">
        function autoTab1(tel) {
            var pattern = new String("___-_______"); // กำหนดรูปแบบในนี้
            var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
            var returnText = new String("");
            var tel_l = tel.value.length;
            var tel_l2 = tel_l - 1;
            for (i = 0; i < pattern.length; i++) {
                if (tel_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                    returnText += tel.value + pattern_ex;
                    tel.value = returnText;
                }
            }
            if (tel_l >= pattern.length) {
                tel.value = tel.value.substr(0, pattern.length);
            }
        }
    </script>

  
  
  
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
      
      
      <form action="inserthistory.php" method="post">
      <div class="container">
      
      
            <form class="form-horizontal" role="form"><br><br>
                <div class="text-center">
                    <h2>ประวัติการรักษา</h2>
                </div>
                <div class="form-group">
                        <label name="num">เลขสมาชิก :</label>
               <?php 
         
            $Customernum = $_SESSION['UserID'];
           
            $_SESSION['UserID'] = $Customernum;

            $sql = "SELECT Customernum FROM customer WHERE CusID = $Customernum";
            //echo 'aaaa';
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            echo "<input type='text' name='mnumber' class='form-control' disabled='disabled' value='$row[0]'>";

        ?>
</div>
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

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">รายละเอียดการรักษา :</label>
                    <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>

                <div class="row">
                    <div class="columns col-md-6">
                    <label for="input">วัน/เดือน/ปี :</label>
                   
                <!-- <input id="datepicker" name="start" width="550"> -->
                <?php 
               
                $start = $_SESSION['start'];
                $_SESSION['start'] = $start;
                
                $sql = "SELECT Time FROM book WHERE start='$start'";
                //echo $sql;
                $query = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($query);
                echo "<input type='text' name='start' class='form-control' disabled='disabled' value=$start>";

               
                ?>
                </div>
               
               
                
               <br>
               <!-- <div class="form-group col-md-6">
                    <label for="input"  >เวลาการรักษา :</label>
                    <select id="input" name="Time" class="form-control">
                    <option selected  >โปรดระบุเวลาการรักษา</option>

                    </select>
                </div> -->
                <?php
                 $start = $_SESSION['start'];
                 $_SESSION['start'] = $start;
                 $dayofweek = date('w', strtotime($start));
                
                 $sql = "SELECT Time FROM book WHERE start='$start'";
                 $query = mysqli_query($conn,$sql);
                 $a = array();

                while($row = mysqli_fetch_array($query)){
                    $Time = $row["Time"];  
                   
                    array_push($a, $Time);
                   
                 }
                
             
                $mon = array("17:00-17:45","17:45-18:30","18:30-19:15","19:15-20:00");

                $sat = array("09:00-09:45","09:45-10:30","10:30-11:15","11:15-12:00",
                           "13:00-13:45","13:45-14:30","14:30-15:15","15:15-16:00",
                           "16:00-16:45","16:45-17:30");
                           
                
                 
                if($dayofweek ==  0 ||$dayofweek == 6){
                    echo '<div class="form-group col-md-6">
                    <label for="input"  >เวลาการรักษา :</label>
                    <select id="input" name="Time"  class="form-control">
                    <option selected  >โปรดระบุเวลาการรักษา</option> 
                    <option value="" disabled >เสาร์-อาทิตย์</option>';
                    
                    $arr=$sat;
                }else{
                    echo '<div class="form-group col-md-6">
                    <label for="input"  >เวลาการรักษา :</label>
                    <select id="input" name="Time"  class="form-control">
                    <option selected  >โปรดระบุเวลาการรักษา</option> 
                    <option value="" disabled >จันทร์-ศุกร์</option>';
                    $arr=$mon;
                }

               
               
               foreach ($arr as $value) {
                    
                echo "<option value='$value'>$value</option>";
                
            }
           echo '</select>';
           
            ?>
                  
              
                </div>
</div> 
<div class="row">
                    <div class="form-group col-md-6 ">
                        <label for="input">ห้อง :</label>
                        <select id="input" name="room" class="form-control">
                            <option selected>โปรดระบุห้อง</option>
                            <option>ห้อง 1</option>
                            <option>ห้อง 2</option>
                        </select>
                    </div>
                

               
                    <div class="form-group col-md-6 ">
                       <label for="">หมายเลขเบอร์โทรศัพท์ :</label>  
                            <input  name="phone" type="text" id="data" placeholder="เบอร์โทรศัพท์" class="form-control"
                                onkeyup="autoTab1(this)" />
                    </div>
                </div>
<br>
                <div class="col text-center">
                <!-- <button type="submit"  class="btn btn-success btn-lg" role="button" >บันทึก</button> -->
                <button type="button"   class="btn btn-success btn-lg" role="button" >บันทึก</button>

                <!-- <input type="reset"   class="  btn-primary btn-lg "  value="รีเซ็ต" > -->
                
                </div>
          
                    </form>
                </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
    <!-- <script>
//       $('#datepicker').datepicker({
//       showOtherMonths: true
//   }); 

$('#date').datetimepicker({ footer: true, modal: true });


  </script>
   -->
   <script>
       
       
       var today = new Date();
                    $('#datepicker').datepicker({
                       format:'yyyy-mm-dd',
                       minDate: today,
                        // uiLibrary: 'bootstrap4'
                    });
                    
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