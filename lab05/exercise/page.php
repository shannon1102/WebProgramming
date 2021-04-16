<?php

Class page {
  private $page, $title, $year, $copyright ;

  public function __construct($title, $year, $copyright)
  {
    $this->title = $title;
    $this->year = $year;
    $this->copyright = "@".$year.' Copyright '." ".$copyright;
    $this->page ='';
  }

  private function addHeader()
  {
     return "<header><h1>" . $this->title . "</h1></header>";
  }

  private function addFooter()
  { 
    return "<footer><div> ". $this->copyright . "</div></footer></html>"."<br><br><br>";
    
  }
  
  public function addContent($content)
  { 
    $this->page .= "<div class='a'><p>" . $content . "</p></div>";
  }


  public function get()
  
  {   
      
      return "<html>
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
</head>".$this->addHeader().$this->page.$this->addFooter();
  }
}

?>
 

