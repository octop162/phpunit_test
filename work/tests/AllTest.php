<?php

use PHPUnit\Framework\TestCase;

class AllTest extends TestCase
{
  /**
   * phpunitをただただ使う
   */
  function testMain() {
    $this->assertEquals(10,5+5);
  }

  /**
   * Mockeryで普通のMockオブジェクト作成
   */
  function testSampleMockery() {
    $mock = \Mockery::mock('SampleMock');
    $mock->shouldReceive('Hello')
      ->with('foo')
      ->andReturn("Hello foo");

    $mock->Hello('foo');
    $this->assertEquals("Hello foo", $mock->Hello('foo'));
  }

  /**
   * Mockeryで上書きしない場合
   */
  function testStudent() {
    $classroom = new myapp\Classroom();
    $this->assertEquals("No Name", $classroom->getName());
  }

  
  /**
   * @runInSeparateProcess
   * @preserveGlobalState disabled
   * 
   * メソッド内で作成するクラスを上書きしてくれるDIってやつ
   */
  function testStudentMockery() {
    \Mockery::mock('overload:myapp\Student')
      ->shouldReceive('getStudentName')
      ->once()
      ->andReturn('Mock Tarou');

    $classroom = new myapp\Classroom();
    $this->assertEquals("Mock Tarou", $classroom->getName());
  }
}