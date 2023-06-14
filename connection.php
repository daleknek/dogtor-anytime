<HTML>
<BODY>

<?php
    $con = mysqli_connect("localhost","root","12345");
    if(!$con)
    die('Could not connect: ' . mysqli_error());
    
    echo "Connected!</br>" ;
    
    mysqli_close($con);
  

 mysqli_select_db("dogtorDB", $con);
 $sql = "CREATE TABLE User
 (
 UserID int (11) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (UserID),
 FirstName varchar(20),
 LastName varchar(20),
 UserName varchar(20),
 Password varchar(20),
 Email varchar(50),
 Phone int(20),
 Address varchar(30),
 City varchar(15)
 )";
 mysqli_query($sql,$con);
 mysqli_close($con);
 
 mysqli_select_db("dogtorDB", $con);
 $sql = "CREATE TABLE Appointments
 (
 AppId int(11) NOT NULL AUTO INCREMENT,
 PRIMARY KEY (AppId),
 VetID int(11),
 ClinicID int(11),
 UserID int(11),
 Time int(11),
 Date int (15)
 )";
 
 mysqli_query($sql,$con);
 mysqli_close($con);
 
 
mysqli_select_db("dogtorDB", $con);
$sql = "CREATE TABLE VetClinic
(ClinicID int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (ClinicID),
ClinicName varchar(20),
Address varchar(30),
Email varchar (50),
Phone int (20),
City varchar (15),
Specialties varchar(30) 
)";

mysqli_query($sql,$con);
mysqli_close($con);

 
 
?>

</BODY>
</HTML>
 