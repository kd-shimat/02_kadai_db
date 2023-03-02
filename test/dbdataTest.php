<?php
use PHPUnit\Framework\TestCase;
use app\DbData;

//require_once("vendor/autload.php");

class dbdataTest extends TestCase
{
    public function test_returnPerson()
    {
        $uid = 1;
        $sql = "select * from person where uid = ?";
        $dbdata = new Dbdata();
        $stmt = $dbdata->query( $sql, [ $uid ] );
        $resultPerson = $stmt->fetch( );
        //$expectedPerson = array("uid" => 1, "name" => "財津一郎", "company_id" => 1, "age" => 5);
        $this->assertEquals($resultPerson['uid'],1);
    }

}