<?php

namespace Tests\PersonalRecordTests;

use App\PersonalRecords\Models\PersonalRecord;
use App\PersonalRecords\Services\PersonalRecordService;
use PHPUnit\Framework\TestCase;

class PersonalRecordTest extends TestCase
{
    /**
     * @var PersonalRecord
     */
    protected PersonalRecord $personalRecord;

    /**
     * @var PersonalRecordService
     */
    protected $service;

    public function setUp(): void
    {
        $this->personalRecord = new PersonalRecord();
        $this->service = PersonalRecordService::class;
    }

    /**
     * @test
     */
    public function verifyContainsInstancePersonalRecord()
    {
        $this->assertInstanceOf(PersonalRecord::class, $this->personalRecord);
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
