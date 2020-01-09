<html>
<head>   
<link href="calendarStyle.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
include 'models/modelCalendar.php';
 
$calendar = new Calendar();
 
echo $calendar->show();
?>
</body>
</html>