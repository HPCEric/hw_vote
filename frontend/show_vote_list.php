<h1 style="text-align:center;" class="mt-3">Let's Vote</h1>

<!-- Media object -->
<div class="container mt-3">
    <div class="row">
        <div class="col-6">
            <h3><i class="far fa-thumbs-up"></i> title</h3>
        </div>
        <div class="col-6  p-2 d-flex justify-content-around">
            <h4><a href="">New</a>
            <a href="">Hot</a>
            <a href="">Expired</a></h4>
        </div>
    </div>

    <div class="row">
        <?php
        $subjects = all('topics');
        $images = all('ad', ['sh' => 1]);
        $colItem = '<div class="col-6 mt-2">'
            . '<div class="media">';
            // . '<div><i class="fas fa-utensils mr-3 fa-3x"></i></div>'
            // ."  <img class='d-block w-25' src='image/{$image['name']}' title='{$image['intro']}'>"
            // . '<div class="media-body">';


        foreach ($subjects as $key1 => $value) {
            if (rows('options', ['topic_id' => $value['id']]) > 0) {
                echo $colItem;
                foreach ($images as $key2 => $image) {
                    if ($key1 == $key2) {
                    echo "  <img class='d-block w-25' src='image/{$image['name']}' title='{$image['intro']}'>";
                    echo '<div class="media-body">';
                    }
                }
                //總投票數顯示
                $count = q("select sum(`count`) as 'sum' from `options` where `topic_id`='{$value['id']}'");
                //看結果按鈕 vote_result.php
                $resultBtn = " <a href='?do=vote_result&id={$value['id']}'>"
                ."<button class='btn btn-primary'>Result</button>"
                ."</a>";
                if (isset($_SESSION['user'])) {
                    echo "<a href='index.php?do=vote&id={$value['id']}'>";
                    echo '<h5 class="mt-0">';
                    echo $value['topic'];
                    echo "</h5></a>";
                    echo "total votes : ".$count[0]['sum'];
                    echo $resultBtn;
                } else {
                    echo "<span>" . '<h5 class="mt-0">' . $value['topic'] . "</h5>" . "</span>";
                    echo "total votes : ".$count[0]['sum'];
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