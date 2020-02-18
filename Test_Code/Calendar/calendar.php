<?php
$dt = new DateTime;
if (isset($_GET['year']) && isset($_GET['week'])) {
    $dt->setISODate($_GET['year'], $_GET['week']);
} else {
    $dt->setISODate($dt->format('o'), $dt->format('W'));
}
$year = $dt->format('o');
$week = $dt->format('W');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link type="text/javascript" href="#">
        <link type="text/css" rel="stylesheet" href="cal.css">
    </head>
    <body>
        <div class="cal-box">
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">Pre Week</a> <!--Previous week-->
            <a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Next Week</a> <!--Next week-->

            <table class="table table-responsive">
                <tr>
                  


            <?php
            do {
                echo "<td>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
                $dt->modify('+1 day');
            } while ($week == $dt->format('W'));
            ?>
                </tr>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
            </table>
        </div>
    </body>
</html>