<h1>Let's Vote</h1>
<?php
$subjects = all('topics');
echo "<ol class='list-group'>";
foreach ($subjects as $key => $value) {
    if (rows('options', ['topic_id' => $value['id']]) > 0) {
        echo "<li class='list-group-item'>";
        //題目
        //有登入的會員才能使用投票功能
        if (isset($_SESSION['user'])) {
            echo "<a class='d-inline-block col-md-8' href='index.php?do=vote&id={$value['id']}'>";
            echo $value['topic'];
            echo "</a>";
        } else {

            echo "<span class='d-inline-block col-md-8'>" . $value['topic'] . "</span>";
        }

        //總投票數顯示
        $count = q("select sum(`count`) as '總計' from `options` where `topic_id`='{$value['id']}'");
        echo "<span class='d-inline-block col-md-2 text-center'>";
        echo $count[0]['總計'];
        echo "</span>";

        //看結果按鈕 vote_result.php
        echo "<a href='?do=vote_result&id={$value['id']}' class='d-inline-block col-md-2 text-center'>";
        echo "<button class='btn btn-primary'>Result</button>";
        echo "</a>";

        echo "</li>";
    }
}
echo "</ol>";

?>
<hr>

<!-- Media object -->
<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <h3><i class="far fa-thumbs-up"></i> title</h3>
        </div>
        <div class="col-6">
            <a href="">new</a>
            <a href="">hot</a>
            <a href="">expired</a>
        </div>
    </div>

    <div class="row">
        <?php
        $subjects = all('topics');
        $colItem = '<div class="col-6">'
            . '<div class="media">'
            . '<div><i class="fas fa-utensils mr-3 fa-3x"></i></div>'
            . '<div class="media-body">';


        foreach ($subjects as $key => $value) {
            if (rows('options', ['topic_id' => $value['id']]) > 0) {
                echo $colItem;
                //總投票數顯示
                $count = q("select sum(`count`) as 'sum' from `options` where `topic_id`='{$value['id']}'");
                //看結果按鈕 vote_result.php
                $resultBtn = "<a href='?do=vote_result&id={$value['id']}'>"
                ."<button class='btn btn-primary'>Result</button>"
                ."</a>";
                if (isset($_SESSION['user'])) {
                    echo "<a href='index.php?do=vote&id={$value['id']}'>";
                    echo '<h5 class="mt-0">';
                    echo $value['topic'];
                    echo "</h5></a>";
                    echo $count[0]['sum'];
                    echo $resultBtn;
                } else {
                    echo "<span>" . '<h5 class="mt-0">' . $value['topic'] . "</h5>" . "</span>";
                    echo $count[0]['sum'];
                    echo $resultBtn;
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }

        echo "</div>";
        echo "</div>";
        ?>