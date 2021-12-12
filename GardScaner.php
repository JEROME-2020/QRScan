
<!DOCTYPE html>
<html>
<head>
    <title>Hottel Booking System</title>
    <link rel="shortcut icon" href="ok.jpg" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&family=Imbue:wght@100&family=Mulish:ital,wght@1,200&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">      
    </script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" rel="nofollow"></script>
    <style>
    #preview{
        width:200px;
        height: 200px;
        border-radius: 5px;
        margin:0px auto;
        border: solid 5px #555;
        background: #555;
    }
    body{
        text-align: center;
    }
    label{
        font-family: 'Comfortaa', cursive;
        font-family: 'Imbue', serif;
        font-family: 'Mulish', sans-serif;
        transform: translate(12px, 0px);
        letter-spacing: 2px;
        font-weight: bold;
        color: #555;
        font-size: 20px;
        letter-spacing: 2px;
    }
    h1{
        font-family: 'Comfortaa', cursive;
        font-family: 'Imbue', serif;
        font-family: 'Mulish', sans-serif;
        transform: translate(12px, 0px);
        letter-spacing: 2px;
        font-weight: bold;
        color: #555; 
    }
    </style>
</head>
<body>
    <br>
    <br>
    <h1>This is the Scanner of QR Code</h1>
    <video id="preview">
    </video>
    <br>
    <script type="text/javascript">
        var scanner = new Instascan.Scanner(
                        { 
                            video: document.getElementById('preview'),scanPeriod: 5, mirror: false
                         }
        );
        scanner.addListener('scan',function(content){           

            if(document.getElementById("text").value = content){
                alert("Successfully Scan the QR CODE");
            }
            else{
                alert("Not Scan");
            }

    });

        Instascan.Camera.getCameras().then(function(cameras){

        if(cameras.length>0){
            scanner.start(cameras[0]);

            $('[name="options"]').on('change',function(){

                if($(this).val()==1){
                    if(cameras[0]!=""){
                        scanner.start(cameras[0]);
                    }else{
                        alert('No Front camera found!');
                    }
                }else if($(this).val()==2){
                    if(cameras[1]!=""){
                        scanner.start(cameras[1]);
                    }else{
                        alert('No Back camera found!');
                    }
                }
            });

        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }

    }).catch(function(e){
        console.error(e);
        alert(e);
    });

    </script>
    <br>

    <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
        <label class="btn btn-primary active">
            <label>FROMT CAMERA</label><br><input type="radio" name="options" value="1" autocomplete="off" checked><br><br>
        </label>
        <label class="btn btn-secondary">
            <label>BACK CAMERA</label><br><input type="radio" name="options" value="2" autocomplete="off">
        </label>
        <form method="post" action="">
           
            <input type="hidden" name="text" id="text"><br>
            <input type="text" name="bodytemp" placeholder="Input body teperature" required class="bodytemp"><br><br>
            <input type="Submit" name="save1" value="TIME IN" class="savebtn1">&nbsp;
            <input type="Submit" name="save2" value="TIME OUT" class="savebtn2">
        </form>
        <?php 

            include("connection.php");

            if(isset($_POST['save1'])){
                $QRdata = $_POST['text'];

                $newQRdata = explode(",", $QRdata);

                $Emp_Fullname = $newQRdata['0'];
                $Emp_Address = $newQRdata['1'];

                $Emp_ContactNumber = $newQRdata['2'];
                $Emp_Age = $newQRdata['3'];
                $Emp_Position = $newQRdata['4'];

                $bodytemp = $_POST['bodytemp'];

                $sql = "SELECT * FROM employee_record WHERE Emp_Fullname = '$Emp_Fullname'";

                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                if($Emp_Fullname == $row['Emp_Fullname']){
                    
                    $sql2 = "INSERT INTO logbook_record (RecordEmp_Fullname, RecordEmp_Address,  RecordEmp_ContactNumber, RecordEmp_Age, RecordEmp_Position, RecordEmp_BodyTemp)
                            VALUES('$Emp_Fullname', '$Emp_Address','$Emp_ContactNumber', '$Emp_Age', '$Emp_Position', '$bodytemp')"; 

                            if(mysqli_query($conn, $sql2)){
                                echo "Subccessfully Time In &#9786;";
                            }
                            else{
                                echo "Warning You have an Error" . mysqli_error($conn);
                            }

                }
                else{
                    echo "<p>Warning the Employee can not Identify &#9785</p>";
                }
            }
            if(isset($_POST['save2'])){

                $QRdata = $_POST['text'];

                $newQRdata = explode(",", $QRdata);

                $Emp_Fullname = $newQRdata['0'];

                $sql = "SELECT * FROM employee_record WHERE Emp_Fullname = '$Emp_Fullname'";

                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $bodytemp = $_POST['bodytemp'];

                if($Emp_Fullname == $row['Emp_Fullname']){

                    $Emp_ID = $row['Emp_Id'];

                    $sql2 = "INSERT INTO timeOut_record (Emp_Id, Emp_bodyTem) VALUES('$Emp_ID', '$bodytemp')"; 

                            if(mysqli_query($conn, $sql2)){
                                echo "Inserted Subccessfully &#9786;";
                            }
                            else{
                                echo "Warning You have an Error" . mysqli_error($conn);
                            }




                }else{
                    echo "<p>Warning the Employee can not Identify &#9785</p>";
                }
            }

         ?>
        
    </div>
    <script></script>
</body>
</html>
<style type="text/css">

    p{
        color: rgb(200, 120, 120);
    }
    .bodytemp{
        width: 200px;
        height: 30px;
        text-align: center;
        border: none;
        border: solid 1px rgb(187, 181, 187);
        border-radius: 10px;
    }
    .savebtn1{
        background: rgb(13, 120, 330);
        width: 93px;
        height: 35px;
        color: #fff;
        border: none;
        font-size: 17px;
        border-radius: 5px
    }
    .savebtn2{
        background: rgb(330, 133, 133);
        width: 93px;
        height: 35px;
        color: #fff;
        border: none;
        font-size: 17px;
        border-radius: 5px
    }
</style>