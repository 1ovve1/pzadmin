<?php

use App\Repositories\Game\Log\Parser\Drivers\Formatters\ServiceFormattersEnum;
use App\Repositories\Game\Log\Parser\Parser;
use Tests\Mock\Services\Logs\LogsParser\Drivers\ParserDriverMock;
use Tests\Mock\Services\Logs\LogsParser\ParserMock;
use Tests\Mock\Services\Logs\LogsParser\Readers\ReaderMock;
use Tests\TestCase;

/** @var TestCase $this */
test('variables scanner', function () {
    $logsParser = new ParserMock(new ParserDriverMock, new ReaderMock);

    $this->assertEquals(
        ['test1' => '123', 'test2' => '456', 'test3' => '789'],
        $logsParser->tryVariablesScanner('@test1@, @test2@, @test3@', '123, 456, 789')
    );

    $this->assertEquals(
        ['test1' => '123', 'test2' => '456'],
        $logsParser->tryVariablesScanner('0@test1@, +@test2@, -@test3@', '0123, +456, 789')
    );
});

test('formatters', function () {
    $logsParser = new Parser(
        new ParserDriverMock(
            '@test1@ @test2@ @test3@',
            ['test1' => fn ($value) => "formatted{$value}"]),
        new ReaderMock(['123 456 789'])
    );

    $this->assertEquals(
        [['test1' => 'formatted123', 'test2' => '456', 'test3' => '789']],
        $logsParser->parse()
    );
});

test('service Formatters', function () {
    $logsParser = new Parser(
        new ParserDriverMock(
            '@test1@ @test2@ @test3@',
            [ServiceFormattersEnum::EACH->value => fn ($value) => "prefix{$value}", ServiceFormattersEnum::IGNORE->value => fn () => 'test2']),
        new ReaderMock(['123 456 789'])
    );

    $this->assertEquals(
        [['test1' => 'prefix123', 'test3' => 'prefix789']],
        $logsParser->parse()
    );
});
