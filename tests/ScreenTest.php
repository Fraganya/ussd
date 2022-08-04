<?php

namespace TNM\USSD\Test;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;
use TNM\USSD\Http\Request;
use TNM\USSD\Http\TruRoute\TruRouteRequest;
use TNM\USSD\Screen;

class ScreenTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private LegacyMockInterface|Request|MockInterface $request;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->mockRequest();
    }

    public function testRender()
    {
        app()->instance(TruRouteRequest::class, $this->mockRequest());

        $screen = Screen::getInstance(new Request());

        $this->assertNotNull($screen->getResponseMessage());
    }


//    public function testOutOfRange()
//    {
//
//    }
//
//    public function testHasPayload()
//    {
//
//    }
//
//    public function testHandle()
//    {
//
//    }
//
//    public function testGetItemAt()
//    {
//
//    }
//
//    public function testPrevious()
//    {
//
//    }
//
//    public function testWithinRange()
//    {
//
//    }
    protected function mockRequest(): TruRouteRequest
    {
        $request = Mockery::mock(TruRouteRequest::class);
        $request->shouldReceive([
            'getMsisdn' => $this->faker->numerify('26588#######'),
            'getType' => Request::INITIAL,
            'getSession' => $this->faker->numerify('##########'),
            'getMessage' => 1,
        ]);
        return $request;
    }
}
