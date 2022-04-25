<?php

namespace Tests\MovementTests;

use App\Movements\Models\Movement;
use App\Movements\Services\MovementService;
use PHPUnit\Framework\TestCase;

class MovementTest extends TestCase
{
    /**
     * @var Movement
     */
    protected Movement $movement;

    /**
     * @var MovementService
     */
    protected $service;

    public function setUp(): void
    {
        $this->movement = new Movement();
        $this->service = MovementService::class;
    }

    /**
     * @test
     */
    public function verifyContainsInstanceMovement()
    {
        $this->assertInstanceOf(Movement::class, $this->movement);
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfGetFindAll()
    {
        $this->assertTrue(method_exists($this->service, 'findAll'), 'Method not found: findAll()');
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfGetById()
    {
        $this->assertTrue(method_exists($this->service, 'findById'), 'Method not found: findById()');
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfStore()
    {
        $this->assertTrue(method_exists($this->service, 'store'), 'Method not found: store()');
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfEnable()
    {
        $this->assertTrue(method_exists($this->service, 'enable'), 'Method not found: enable()');
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfDisable()
    {
        $this->assertTrue(method_exists($this->service, 'disable'), 'Method not found: disable()');
    }

    /**
     * @test
     */
    public function verifyContainsInstanceOfDestroy()
    {
        $this->assertTrue(method_exists($this->service, 'destroy'), 'Method not found: destroy()');
    }
}
