<?php
if (session_id() === '') {
// Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
$proto = ((isset($_SERVER["HTTPS"])) && (strtoupper($_SERVER["HTTPS"]) == 'ON')) ? "https://" : "http://";
$hname = getenv("SERVER_NAME");
$port = getenv("SERVER_PORT");
if ((($port == 80) && ($proto == 'http://')) || (($port == 443) && ($proto == 'https://'))) {
    $port = '';
}
$params = '';
foreach ($_GET as $key => $value) {
    if (strtolower($key) == 'start')
        continue;
    $params .= (empty($params)) ? "$key=$value" : "&$key=$value";
}
$url = $proto . $hname . $port . $_SERVER['SCRIPT_NAME'] . '?' . $params;
$last = count($listBookbyCategory) - 1;
$start = (isset($_GET['start'])) ? intval($_GET['start']) : 0;
if ($start < 0)
    $start = 0;
if ($start > $last)
    $start = $last;
$maxpage = 4;
//echo "<p>Start index = $start</p>" . PHP_EOL;
$curpage = 0;
require_once "header.php";
?> 
 <style>
        ul#results{
            list-style: none;
            width: 131px;
            margin: 0;
            padding: 0;
            display: none;
        }

        ul#results li a {
            color: #000;
            background: #ccc;
            display: block;
            text-decoration: none;
        }
        ul#results li a:hover {
            background: #aaa;
        }
    </style>
<link rel="stylesheet" href="./View/css/custom.css">
<form action="index.php" method="get">
    <input type="text"  name="search" id="search">
    <input type="submit" value="search" >       </form>

<ul id = "results">

</ul>
<script type = "text/javascript">
    var results = document.getElementById("results");
    var search = document.getElementById("search");

    function getSearchResults() {
        var searchVal = search.value;

        if (searchVal.length < 1) {
            results.style.display = 'none';
            return;
        }

        console.log('searchVal : ' + searchVal);
        var xhr = new XMLHttpRequest();
        var url = './utils/do_search.php?search=' + searchVal;
        // open function
        xhr.open('GET', url, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var text = xhr.responseText;
                results.innerHTML = text;
                results.style.display = 'block';
            }
        }

        xhr.send();
    }

    search.addEventListener("input", getSearchResults);


</script>

</div>


<div class="container">
    <div class ="row" style="height: 100vh">
        <div class="col-md-4">
            <div style="display: flex; justify-content: space-between">
                <p><button class ="btn btn-default" type"submit" onclick="location.href = '../../editproject/View/User/cart.php'" >Go to Cart</button>

                <div>
                    <?php
                    $prev = $start - $maxpage;
                    if ($prev < 0)
                        $prev = 0;
                    $next = ( ($start + $maxpage) > $last) ? $start : $start + $maxpage;
                    $prev = ( ($start - $maxpage) < 0) ? 0 : $start - $maxpage;
                    echo '<p><a href="' . $url . '&start=' . $prev . '">Previous</a>&nbsp;&nbsp;';
                    echo '<a href="' . $url . '&start=' . $next . '">Next</a></p>';
                    ?>
                </div>
            </div>
        </div>

        <div style="display: flex">
            <div class="demo-div" style="width: 20%; padding: 20px;border: 2px solid yellowgreen; height: fit-content;">
                <div class = "panel-heading panel-heading-dark">
                    <h2 class="panel-title"> Categories</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item" style="padding: 5px 0px">
                        <a href='index.php?category=Comic'>Comic</a></li>
                    <li class="list-group-item" style="padding: 5px 0px">
                        <a href='index.php?category=Novel'>Novel</a></li>
                    <li claComicss="list-group-item" style="padding: 5px 0px">
                        <a href='index.php?category=Drama'>Drama</a></li>
                    <li class="list-group-item" style="padding: 5px 0px">
                        <a href='index.php?category=Sci-Fic'>Sci-Fic</a></li>
                    <li class="list-group-item" style="padding: 5px 0px">
                        <a href='index.php?category=Others'>Others</a></li>
                </ul>
            </div>
            <div style="display: flex; width: 80%; display: grid;grid-template-columns: 1fr 1fr 1fr; grid-template-rows: 400px 20px;">
                <?php
                for ($xi = $start; $xi <= $last; $xi++) {
                    if ($curpage >= $maxpage)
                        break;
                    $curpage++;

                    $name = $listBookbyCategory[$xi]['Name'];
                    $img_src = $listBookbyCategory[$xi]['ImageURL'];
                    $price = $listBookbyCategory[$xi]['Price'];
                    $id = $listBookbyCategory[$xi]['BookID'];
                    ?>
                    <div class ="" style="text-align: center;">

                        <img  src=<?php echo $img_src; ?>  style="width:400px;height:200px;">
                 <div class="book-title"><strong>
                                            Name:</strong> <?php echo $name; ?> 
                                    </div>
                                    <div class="price"><strong>Price :<?php echo $price; ?></strong>$</div>
                        <div class="book-add">
                            <a href="index.php?bookid=<?= $id ?>">
                                <button class="btn btn-primary" type"submit">View</button>                            
                            </a> 

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>

</body>
<!--    <footer>
        <div class="content-wrapper">
            <p>&copy; 2021, Book store System</p>
        </div>
    </footer>-->



</html>

