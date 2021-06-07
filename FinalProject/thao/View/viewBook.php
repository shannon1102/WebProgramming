<?php
if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}


// Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
// Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, intial-scale=1.0"/>
        <title>Bookstore</title>
        <link rel="stylesheet" href="custom.css">
        <style>
            * {box-sizing: border-box;}

            .img-zoom-container {
                position: relative;
            }

            .img-zoom-lens {
                position: absolute;
                border: 1px solid #d4d4d4;
                /*set the size of the lens:*/
                width: 40px;
                height: 40px;
            }

            .img-zoom-result {
                border: 1px solid #d4d4d4;
                /*set the size of the result div:*/
                width: 300px;
                height: 300px;
            }
        </style>
        <script>
            function imageZoom(imgID, resultID) {
                var img, lens, result, cx, cy;
                img = document.getElementById(imgID);
                result = document.getElementById(resultID);
                /*create lens:*/
                lens = document.createElement("DIV");
                lens.setAttribute("class", "img-zoom-lens");
                /*insert lens:*/
                img.parentElement.insertBefore(lens, img);
                /*calculate the ratio between result DIV and lens:*/
                cx = result.offsetWidth / lens.offsetWidth;
                cy = result.offsetHeight / lens.offsetHeight;
                /*set background properties for the result DIV:*/
                result.style.backgroundImage = "url('" + img.src + "')";
                result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
                /*execute a function when someone moves the cursor over the image, or the lens:*/
                lens.addEventListener("mousemove", moveLens);
                img.addEventListener("mousemove", moveLens);
                /*and also for touch screens:*/
                lens.addEventListener("touchmove", moveLens);
                img.addEventListener("touchmove", moveLens);
                function moveLens(e) {
                    var pos, x, y;
                    /*prevent any other actions that may occur when moving over the image:*/
                    e.preventDefault();
                    /*get the cursor's x and y positions:*/
                    pos = getCursorPos(e);
                    /*calculate the position of the lens:*/
                    x = pos.x - (lens.offsetWidth / 2);
                    y = pos.y - (lens.offsetHeight / 2);
                    /*prevent the lens from being positioned outside the image:*/
                    if (x > img.width - lens.offsetWidth) {
                        x = img.width - lens.offsetWidth;
                    }
                    if (x < 0) {
                        x = 0;
                    }
                    if (y > img.height - lens.offsetHeight) {
                        y = img.height - lens.offsetHeight;
                    }
                    if (y < 0) {
                        y = 0;
                    }
                    /*set the position of the lens:*/
                    lens.style.left = x + "px";
                    lens.style.top = y + "px";
                    /*display what the lens "sees":*/
                    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
                }
                function getCursorPos(e) {
                    var a, x = 0, y = 0;
                    e = e || window.event;
                    /*get the x and y positions of the image:*/
                    a = img.getBoundingClientRect();
                    /*calculate the cursor's x and y coordinates, relative to the image:*/
                    x = e.pageX - a.left;
                    y = e.pageY - a.top;
                    /*consider any page scrolling:*/
                    x = x - window.pageXOffset;
                    y = y - window.pageYOffset;
                    return {x: x, y: y};
                }
            }
        </script>

    </head>
    <body style="height: 100vh;">
        <h3 style="text-align:center;"> BookStore</h3>
        <div style="height: 100vh" class ="navbar navbar-inverse narbar-fixed-top" role="navigation" data-toggle="collapse" data-target=".nav-collapse">
            <div class ="navbar-header">
                <div class="collapse navbar-collapse">
                    <ul style="display: flex; align-items: center; justify-content: center;"
                        <li class="active">
                        <a href="index.php" style="padding: 0px 10px;;">
                            Home 
                        </a>
                        </li>

                        <li>
                            <a href="register.php">
                                Create Account
                            </a>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-right"style="text-align:center">
                        <div class ="form-group">
                            <input name="username" type="text" class="form-control" placeholder="Enter username">
                        </div>
                        <div class ="form-group">
                            <input name="password" type="text" class="form-control" placeholder="Enter password">
                        </div>
                        <button name="submit" type="submit" class="btn btn-default"> Login </button>

                    </form>
                </div>
            </div>


            <div class="container">
                <div class ="row" style="height: 100vh">

                    <div style="display: flex; width: 80%; display: grid;grid-template-columns: 1fr 1fr 1fr; grid-template-rows: 400px 20px;">

                        <div class ="" style="text-align: center;">
                            <div class="img-zoom-container">
                                <div> <img id="myimage"   src=<?php echo $book['ImageURL']; ?>  style="width:400px;height:200px;"></div>
                                <div id="myresult" class="img-zoom-result" style="width:200px;height:200px;" >

                                </div>
                                <div class="book-title">


                                </div>
                                <?php echo $book['Name']; ?>
                            </div>
                            <div class="price"><?php echo $book['Price']; ?></div>
<!--                            <div class="form-group">
                                <label for="soluong">Quantity:</label>
                                <input type="number" class="form-control" id="soluong" name="soluong">
                            </div>-->
                            <div class="action">
                                <!-- <button class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Add to cart</button> -->
                                <form action="addToCart.php" method="post">
                                    <input type="hidden" name="itemID" value="<?= $itemID ?>">
                                    <input type="submit" value="Add This to Cart"> <br><br>
                                </form>
                                <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> 
    <script>
// Initiate zoom effect:
        imageZoom("myimage", "myresult");
    </script>
</body>
</html>
