<?php

namespace Tests\PersonalTests;

use App\Personals\Models\Personal;
use App\Personals\Services\PersonalService;
use PHPUnit\Framework\TestCase;

class PersonalTest extends TestCase
{
    /**
     * @var Personal
     */
    protected Personal $personal;

    /**
     * @var PersonalService
     */
    protected $service;

    public function setUp(): void
    {
        $this->personal = new Personal();
        $this->service = PersonalService::class;
    }

    /**
     * @test
     */
    public function verifyContainsInstancePersonal()
    {
        $this->assertInstanceOf(Personal::class, $this->personal);
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
