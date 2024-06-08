<?php include "includes/header.php" ?>
<?php include 'includes/navbar.php';?>
<?php require_once("Database/connDB.php"); ?>
<?php
$headers = ['星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期日'];
$timeslots = [
    '第一節<br>8:10~9:00',
    '第二節<br>9:10~10:00',
    '第三節<br>10:10~11:00',
    '第四節<br>11:10~12:00',
    '第五節<br>12:10~13:00',
    '第六節<br>13:10~14:00',
    '第七節<br>14:10~15:00',
    '第八節<br>15:10~16:00',
    '第九節<br>16:10~17:00',
    '第十節<br>17:10~18:00',
    '第十一節<br>18:10~19:00',
    '第十二節<br>19:10~20:00',
    '第十三節<br>20:10~21:00',
    '第十四節<br>21:10~22:00'
];


$result = mysqli_query($conn, "SELECT * FROM course");


while ($row = mysqli_fetch_array($result)) {
    $courseName = $row['課程名稱'];
    $classroom = $row['教室地點'];

    preg_match('/^星期(\S+)/', $row['星期'], $matches);
    $dayString = $matches[1];

    $day = convertDayToNumber($dayString);
    
    preg_match('/^第(\S+)節/', $row['開始節數'], $matches);
    $startTimeslotString = $matches[1];

    $startTimeslot = convertToNumber($startTimeslotString);

    preg_match('/^第(\S+)節/', $row['結束節數'], $matches);
    $endTimeslotString = $matches[1];

    $endTimeslot = convertToNumber($endTimeslotString);

    if ($endTimeslot >= $startTimeslot) {
        for ($timeslot = $startTimeslot; $timeslot <= $endTimeslot; $timeslot++) {
            $schedule[$day][$timeslot][] = [
                'course_name' => $courseName,
                'classroom' => $classroom
            ];
        }
    }
}


function convertToNumber($timeslotString) {
    $map = [
        "一" => 0,
        "二" => 1,
        "三" => 2,
        "四" => 3,
        "五" => 4,
        "六" => 5,
        "七" => 6,
        "八" => 7,
        "九" => 8,
        "十" => 9,
        "十一" => 10,
        "十二" => 11,
        "十三" => 12,
        "十四" => 13
    ];

    return $map[$timeslotString];
}

function convertDayToNumber($dayString) {
    $map = [
        "一" => 0,
        "二" => 1,
        "三" => 2,
        "四" => 3,
        "五" => 4,
        "六" => 5,
        "日" => 6
    ];

    return $map[$dayString];
}

?>
<div class="main" style="min-height: calc(100vh - 450px);">
    <div class="page-header">
        <div class="text-white inner" style="margin: auto;  max-width: 1380px;">
            <p>葉春秀 老師課表及請益時間</p>
        </div>
    </div>

    <div style="margin: auto;  max-width: 1200px;">
        <section class="tab-container">
            <div class="mt-2">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">課表 & 接見時間</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">開課資訊</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row m-0">
                            <div class="table-responsive mt-5">
                                <table id="officehours" class="table table-bordered text-center align-middle rwdfs1">
                                    <thead>
                                        <tr class="table-light">
                                        <th></th>
                                        <?php
                                        foreach ($headers as $header) {
                                            echo "<th width='15%'>$header</th>";
                                        }
                                        ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($timeslots as $timeslotIndex => $timeslot) {
                                    ?>
                                        <tr>
                                            <td class='time-slot table-light'><?php echo $timeslot; ?></td>
                                            <?php
                                            for ($dayIndex = 0; $dayIndex < count($headers); $dayIndex++) {
                                            ?>
                                            <td>
                                                <?php
                                                if (isset($schedule[$dayIndex][$timeslotIndex])) {
                                                    foreach ($schedule[$dayIndex][$timeslotIndex] as $course) {
                                                    ?>
                                                        <p style="font-size:0.9rem;"><?php echo $course['course_name']; ?><br><?php echo $course['classroom'];?></p>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <div class="mt-1">
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item border-0 m-2 text-end">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                        學年
                                    </li>

                                    <li class="list-group-item border-0 px-0">
                                        <select class="form-select" id="opt-syear" name="opt-syear">
                                            <option value="113">113</option>
                                            <option value="112">112</option>
                                            <option value="111">111</option>
                                            <option value="110">110</option>
                                            <option value="109">109</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>

                            <div class="table-responsive">
                                <table id="course" class="table rg-table align-middle text-center" width="95%">
                                    <thead>
                                        <tr>
                                            <th>學期</th>
                                            <th>開課碼</th>
                                            <th>課程名稱</th>
                                            <th>班級</th>
                                            <th>時間地點</th>
                                            <th>必修 / 選修</th>
                                            <th>學分</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section>
            <div class="card" style="margin: 50px 100px;" id="appointment">
                <div class="card-header">
                    <h5>預約表單</h5>
                </div>
                <div class="card-body">
                    <form id="data-form" action="appointment/process.php" method="post" enctype="multipart/form-data">
                        <?php require_once("appointment/create.php") ?>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="javascript/alertDisappear.js"></script>
<script src="javascript/alerturldelete.js"></script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5',
        format: 'yyyy-mm-dd'
    });
</script>
<?php include "includes/footer.php" ?>