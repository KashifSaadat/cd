<?php

namespace KashifSaadat\DirectoryManager;

class DirectoryManagerTest extends \PHPUnit_Framework_TestCase
{
    protected $directoryManager;

    protected function setUp()
    {
        $this->directoryManager = new DirectoryManager();
    }

    protected function tearDown()
    {
        $this->directoryManager = null;
    }


    public function testGetPaths()
    {
        $this->assertInstanceOf('\SplDoublyLinkedList', $this->directoryManager->getPaths());
    }

    public function testCd()
    {
        $firstDirectory = getcwd();
        $this->directoryManager->cd(sys_get_temp_dir());
        $this->assertEquals($firstDirectory, $this->directoryManager->getPaths()->top());
        $this->assertEquals(sys_get_temp_dir(), getcwd());
    }

    public function testReset()
    {
        $firstDirectory = getcwd();
        $this->directoryManager->cd(sys_get_temp_dir());
        $this->assertEquals($firstDirectory, $this->directoryManager->getPaths()->top());
        $this->assertEquals(sys_get_temp_dir(), getcwd());
        $this->directoryManager->reset();
        $this->assertEquals($firstDirectory, getcwd());
        $this->assertTrue($this->directoryManager->getPaths()->isEmpty());
    }

    public function testResetDoesNotThrowExceptionWhenListIsEmpty()
    {
        $currentDirectory = getcwd();
        $this->assertTrue($this->directoryManager->getPaths()->isEmpty());
        $this->directoryManager->reset();
        $this->assertTrue($this->directoryManager->getPaths()->isEmpty());
        $this->assertEquals($currentDirectory, getcwd());
    }
}
