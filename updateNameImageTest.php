<?php
require_once 'updateNameImage.php';

class updateNameImageTest extends PHPUnit_Framework_TestCase
{
    private function valiStrLen($str, $min, $max)
    {
        $len = strlen($str);
        if($len < $min)
        {
            return "To short";
        }
        elseif($len > $max)
        {
            return "To long";
        }
        return TRUE;
    }

    // Testing in normal case when user updates story
    public function testcheckIfNameUpdated1()
    {
        $id = 1;
        $result = checkIfNameUpdated("Malek", 1);
        $this->assertEquals("Records added", $result);
    }

    // Make sure that records is not updated when blank string
    public function testcheckIfNameUpdated2()
    {
        $result = checkIfNameUpdated("", 1);
        $this->assertEquals("nothing to submit", $result);
    }

    // Even if input is a number it will still be treated as a string
    // and updated to the database
    public function testcheckIfNameUpdated3()
    {
        $result = checkIfNameUpdated(100, 1);
        $this->assertEquals("Records added", $result);
    }

    // Testing to make sure chr limit is not smaller than 2 and not
    // bigger than 20, to simulate what the database restricts on char limit
    public function testcheckIfNameUpdated4()
    {
        $str = "malek";
        $result = checkIfNameUpdated($str, 1);
        $result = $this->valiStrLen($str, 2, 20);
        $this->assertEquals(TRUE, $result);
    }

    public function testcheckIfNameUpdated5()
    {
        $id = 1;
        $str = "1234567891011121314151617181920";
        $result = checkIfNameUpdated($str, 1);
        $result = $this->valiStrLen($str, 2, 20);
        $this->assertEquals("To long", $result);
    }

    public function testcheckIfNameUpdated6()
    {
        $str = "12";
        $result = checkIfNameUpdated($str, 1);
        $result = $this->valiStrLen($str, 2, 20);
        $this->assertEquals(TRUE, $result);
    }

    public function testcheckIfNameUpdated7()
    {
        $str = "1";
        $result = checkIfNameUpdated($str, 1);
        $result = $this->valiStrLen($str, 2, 20);
        $this->assertEquals("To short", $result);
    }

    // test if picture gets inserted
//    public function checkIfImageUpdated1()
//    {
//        $id = 1;
//        $result = checkIfImageUpdated("pic.png", 1);
//        $this->assertEquals("ERROR", $result);
//    }
}
