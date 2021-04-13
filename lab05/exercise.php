<?php
Class BuildPage {
  private $page, $title, $year, $copyright ;

  public function __construct($title, $year, $copyright)
  {
    $this->title = $title;
    $this->year = $year;
    $this->copyright = "@".$year.' Copyright '." ".$copyright;
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
    $this->addHeader();
  }

  private function addHeader()
  {
     $this->page .= "<header><h1>" . $this->title . "</h1></header>";
  }

  private function addFooter()
  { 
    $this->page .= "<footer><div> ". $this->copyright . "</div></footer></html>"."<br><br><br>";
    
  }
  
  public function addContent($content)
  { 
    $this->page .= "<div class='a'><p>" . $content . "</p></div>";
  }


  public function get()
  
  {   $this->addFooter();
      return $this->page;
  }
}
$page = new BuildPage("TITLE1",1999,"author1");
$page->addContent("content1");
echo $page->get();



$page1 = new BuildPage("TITLE2",2000,"author2");
$page1->addContent("content2");
$page1->addContent("content3");
echo $page1->get();


?>