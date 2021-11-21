<?php
class RGB
{
    private $color;
    private $red;
    private $green;
    private $blue;

    function __construct($colorCode = '')
    {
        $this->color = ltrim($colorCode, "#");
        $this->parseColor();
    }

    function getColor()
    {
        return $this->color;
    }

    function setColor($colorCode)
    {
        $this->color = ltrim($colorCode, "#");
    }

    function getRGBcolor()
    {
        return array($this->red, $this->green, $this->blue);
    }
    private function parseColor()
    {
        list($this->red, $this->green, $this->blue) = sscanf($this->color, "%02x%02x%02x");
    }
    function readRGBcolor()
    {
        echo "Red = {$this->red}\nGreen = {$this->green}\nBlue = {$this->blue}\n";
    }
    function getRED()
    {
        return $this->red;
    }
    function getGreen()
    {
        return $this->green;
    }
    function getBlue()
    {
        return $this->blue;
    }
}

$ourColor = new RGB('#ff00ff');
// $c = $ourColor->getRGBcolor();
// print_r($c);
$ourColor->readRGBcolor();
// echo $ourColor->getRED();
