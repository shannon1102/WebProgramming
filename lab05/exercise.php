<?php
Class BuildPage {
  private $page, $title, $year, $copyright ;

  public function __construct($title, $year, $copyright)
  {
    $this->title = $title;
    $this->year = $year;
    $this->copyright = "@".$copyright;
    $this->page ="<html>
    <head>
    <style type='text/css'>
        header{
            background-color:#73ad21;
            text-align:center;
        }
        footer{
            background-color:#ccc;
            text-align:center;
            padding:25px;
            font-size:18px;
        }
        div.a {
	text-align: center;
        background-color:#5F9EA0;
}
    </style>
</head>";
  }

  public function addHeader()
  {
     $this->page .= "<body><header><h1>" . $this->title . "</h1></header>";
  }

  public function addFooter()
  {
    $this->page .= "<footer><div> ".$this->year . " " . $this->copyright . "</div></footer></html></body>"."<br><br><br>";
  }
  
  public function addContent($content)
  {
    $this->page .= "<main><div class='a'><p>" . $content . "</p></div></main>";
  }


  public function getPage()
  {
    return $this->page;
  }
}
$page = new BuildPage("TITLE1",1999,"author1");
$page->addHeader();
$page->addContent("content1");
$page->addFooter();
echo $page->getPage();



$page1 = new BuildPage("TITLE2",2000,"author2");
$page1->addHeader();
$page1->addContent("content2");
$page1->addFooter();
echo $page1->getPage();


?>
