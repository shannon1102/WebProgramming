
<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$myCollection = array();

$r = new Rectangle();
$r->width = 5;
$r->height = 7;
$myCollection[] = $r;
unset($r);

 
$t = new triangle();
$t->base = 4;
$t->height = 5;
$myCollection[] = $t;
unset($t);


$c = new Circle();

$c->radius = 3;
$myCollection[] = $c;
unset($c);

$c = new Color();
$c->name = "blue";
$myCollection[] = $c;
unset($c);

foreach ($myCollection as $s) {
    if ($s instanceof Shape) {
        print("Area:" . $s->getArea() . "<br/>");
    }
    if ($s instanceof Polygon) {
        print("Sides:" . $s->getNumberOfSides() . "<br/>");
    }
    if ($s instanceof Color) {
        print("Color:" . $s->name . "<br/>");
    }

    print("<br/>");
}
?>