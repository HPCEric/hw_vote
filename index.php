<?php include_once "./api/db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./scss/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="row">
            <!-- logo -->
            <div class="col-2">
                <!-- <a href=""><img src="./element/logo1.png" alt=""></a> -->
                <a href="index.php"><i class="p-3 fas fa-book-reader fa-5x text-VeryPeri d-flex justify-content-center"></i></a>
            </div>
            <!-- logo end -->

            <!-- login bar -->
            <div class="col-10 p-3 ">
                <!-- <div class="row-6 col d-block text-right h-75 bg-VeryPeri rounded-left"> -->
                <div class="row-6 col d-flex justify-content-center align-items-center h-50 bg-VeryPeri rounded-left">
                    <a href="" class="text-light"><i class="fab fa-guilded"></i> Introductory &nbsp;</a>
                    <a href="" class="text-light"><i class="fas fa-phone-square"></i> Contact &nbsp;</a>
                    <!-- <a href="?do=reg" class="text-light"><i class="fas fa-question-circle"></i> Register</a>
                    <a href="" class="text-light"><i class="fas fa-sign-in-alt"></i> Login</a> -->

                    <!-- register/login -->
                    <?php
                    // 判斷是否有任何的錯誤訊息存在，有則顯示
                    if (isset($_SESSION['error'])) {
                        //   echo "<span class='text-danger'>".$_SESSION['error']."</span>";
                        //alert後 頁面跳轉
                        $url = "./default.html";
                        echo "<script>alert('account / password error')</script>";
                        echo "<script>window.location.href = '$url'</script>";
                    }

                    //判斷是否有登入的紀錄，根據登入狀況，顯示不同的功能按鈕
                    if (isset($_SESSION['user'])) {
                        echo "<span class='px-2 text-light font-weight-bold'>Welcome {$_SESSION['user']}!</span>";

                    ?>
                        <div>
                            <a class="btn btn-sm btn-MutedClay text-light mx-1" href="./backend/index.php">Management</a>
                            <a class="btn btn-sm btn-HawthornFlose mx-1" href="logout.php">Logout</a>
                        </div>

                    <?php

                    } else {
                    ?>
                        <a href="?do=reg" class="text-light"><i class="fas fa-question-circle"></i> Register&nbsp;</a>
                        <!-- <a href="?do=login" class="text-light"><i class="fas fa-sign-in-alt"></i> Login</a> -->
                        <a href="./default.html" class="text-light"><i class="fas fa-sign-in-alt"></i> Login</a>

                    <?php
                    }
                    ?>
                    <!-- register/login end -->

                </div>

                <div class="row-6 p-4 d-block text-right">
                    <!-- option -->
                    <a href="">link1</a>
                    <a href="">link2</a>
                    <a href="">link3</a>
                    <a href="">link4</a>
                    <!-- option end -->
                </div>
            </div>

            <!-- login bar end -->

        </div>
        <div class="input-group">
            <input type="text" class="form-control shadow-sm" placeholder="Enter...." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <button type="submit" class="btn btn-primary c-fix-1 mb-3 shadow-sm" title="點擊即可進行全站搜尋">search</button>
        </div>
    </div>

    <div class="container">
        <!-- carousel -->
        <div id="demo" class="carousel slide  mt-3" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <!-- get pic -->
            <!-- <?php

                    //取得資料表中狀態為1的廣告圖片
                    $images = all('ad', ['sh' => 1]);

                    //使用迴圈來將每一筆廣告圖片依照html的格式顯示在網頁上
                    foreach ($images as $key => $image) {

                        //判斷如果是第一筆，會加入一個active的class
                        if ($key == 0) {
                            echo "<div class='carousel-item active'>";
                        } else {
                            echo "<div class='carousel-item'>";
                        }

                        //帶入圖片的檔名及資訊
                        echo "  <img class='d-block w-100' src='image/{$image['name']}' title='{$image['intro']}'>";
                        echo "</div>";
                    }
                    ?> -->
            <!-- get pic end -->


            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/id/10/1920/550" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/id/11/1920/550" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/id/12/1920/550" class="d-block w-100">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        <!-- carousel end -->
    </div>

    <!-- vote list -->
    <div class="container">
        <?php

        //根據網址帶的do參數內容來決定要include那一個檔案內容
        $do = (isset($_GET['do'])) ? $_GET['do'] : 'show_vote_list';

        //建立要引入的檔案路徑
        $file = "./frontend/" . $do . ".php";
        if (file_exists($file)) {
            include $file;
        } else {
            include "./frontend/show_vote_list.php";
        }
        ?>
    </div>
    <!-- vote list end -->

    <!-- tabs -->
    <guide id="link-tabs"></guide>
    <br>
    <div class="container mt-1 text-center">
        <h2>option</h2>
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs justify-content-around">
            <li class="nav-item">
                <!-- <a class="nav-link active" href="#page1">Page 1</a> -->
                <a class="nav-link active" href="#page1">Page 1</a>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link" href="#page2">Page 2</a> -->
                <a class="nav-link" href="#page2">Page 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#page3">Page 3</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- active 預設顯示 -->
            <!-- <div id="page1" class="container tab-pane active"><br> -->
            <div id="page1" class="container tab-pane active"><br>
                <!-- 第一排 -->
                <div class="row">
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <div class="card w-80">
                            <img src="https://picsum.photos/id/1023/400/300" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-md-4 end-->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <div class="card w-80">
                            <img src="https://picsum.photos/id/1023/400/300" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-md-4 end-->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <div class="card w-80">
                            <img src="https://picsum.photos/id/1023/400/300" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-md-4 end-->



                </div>
                <!-- 第一排end -->

                <!-- 第二排 -->
                <div class="row mt-5">
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <div class="card w-80">
                            <img src="https://picsum.photos/id/1023/400/300" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-md-4 end-->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <div class="card w-80">
                            <img src="https://picsum.photos/id/1023/400/300" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-md-4 end-->
                    <!-- col-md-4 -->
                    <div class="col-md-4">
                        <div class="card w-80">
                            <img src="https://picsum.photos/id/1023/400/300" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <!-- col-md-4 end-->



                </div>
                <!-- 第二排end -->
            </div>
            <!-- <div id="page2" class="container tab-pane fade"><br> -->
            <div id="page2" class="container tab-pane fade"><br>
                <!-- tab2 row1 -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="icon text-success py-3 ">
                                <i class="fas fa-child fa-5x"></i>
                            </div>
                            <h3 class="text-secondary">Child</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem animi quibusdam maiores
                                dolore nesciunt perferendis tempore modi nulla deserunt fugit.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="icon text-primary py-3 ">
                                <i class="fas fa-cat fa-5x"></i>
                            </div>
                            <h3 class="text-secondary">Cat</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem animi quibusdam maiores
                                dolore nesciunt perferendis tempore modi nulla deserunt fugit.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box">
                            <div class="icon text-warning py-3 ">
                                <i class="fas fa-bus fa-5x "></i>
                            </div>
                            <h3 class="text-secondary">Bus</h3>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus alias quod
                                doloremque labore dolorem ratione non neque nisi, nam consequatur eius itaque
                                reprehenderit nemo facere suscipit necessitatibus eos repudiandae at. A provident, totam
                                earum ea voluptates temporibus illum odio sint?</p>
                        </div>
                    </div>
                </div>
                <!-- tab2 row1 end -->

                <!-- tab2 row2 -->
                <div class="row m-auto text-secondary">
                    <div class="box2 col-md-2 col-sm-4 col-6">
                        <div class="icon text-info py-3 ">
                            <i class="fas fa-dog fa-3x"></i>
                        </div>
                        <h5>Lorem, ipsum dolor.</h5>
                    </div>
                    <div class="box2 col-md-2 col-sm-4 col-6">
                        <div class="icon text-info py-3 ">
                            <i class="fas fa-kiwi-bird fa-3x"></i>
                        </div>
                        <h5>Lorem, ipsum dolor.</h5>
                    </div>
                    <div class="box2 col-md-2 col-sm-4 col-6">
                        <div class="icon text-info py-3 ">
                            <i class="fas fa-fish fa-3x"></i>
                        </div>
                        <h5>Lorem, ipsum dolor.</h5>
                    </div>
                    <div class="box2 col-md-2 col-sm-4 col-6">
                        <div class="icon text-info py-3 ">
                            <i class="fas fa-frog fa-3x"></i>
                        </div>
                        <h5>Lorem, ipsum dolor.</h5>
                    </div>
                    <div class="box2 col-md-2 col-sm-4 col-6">
                        <div class="icon text-info py-3 ">
                            <i class="fas fa-horse-head fa-3x"></i>
                        </div>
                        <h5>Lorem, ipsum dolor.</h5>
                    </div>
                    <div class="box2 col-md-2 col-sm-4 col-6">
                        <div class="icon text-info py-3 ">
                            <i class="fas fa-hippo fa-3x"></i>
                        </div>
                        <h5>Lorem, ipsum dolor.</h5>
                    </div>
                </div>
            </div>
            <!-- tab2 row2 end -->
            <!-- table -->
            <div id="page3" class="container tab-pane fade"><br>
                <h3>other</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum quaerat magni est aliquam vitae
                    mollitia incidunt, dolorum distinctio ipsa id.</p>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- table end -->

        </div>
    </div>
    <!-- tabs end -->

    <!-- footer -->
    <footer class="pt-3 mt-4 bg-primary text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    company
                </div>
                <div class="col-12">
                    <i class="fa fa-copyright" aria-hidden="true"></i> Copy right by ...
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end-->





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <!-- tabs js -->
    <script>
        $(document).ready(function() {
            $(".nav-tabs a").click(function() {
                $(this).tab('show');
            });
        });
    </script>
    <!-- tabs js end -->

</body>

</html>