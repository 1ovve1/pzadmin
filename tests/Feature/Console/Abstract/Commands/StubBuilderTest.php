<?php

use App\Console\Abstract\Commands\Files\Stub\StubBuilder;
use App\Console\Abstract\Commands\Files\Stub\StubKeywordEnum;
use Illuminate\Filesystem\Filesystem;
use Tests\Mock\Console\Commands\Files\FileStubMock;

beforeEach(function () {
    $this->filesystem = new Filesystem;
    $this->stub = new FileStubMock;
    $this->stubBuilder = new StubBuilder($this->filesystem, $this->stub);
});

test('repository example', function () {
    $result = $this->stubBuilder
        ->set(StubKeywordEnum::CLASSNAME, 'test_classname')
        ->set(StubKeywordEnum::EXTEND_CLASSNAME, 'text_extend_classname')
        ->set(StubKeywordEnum::EXTEND_USE, 'test_extend_use')
        ->set(StubKeywordEnum::NAMESPACE, 'test_namespace')
        ->make()->buffer;

    $this->assertStringContainsString(
        '<?php test_namespace test_classname text_extend_classname test_extend_use namespace class extend_clas extend_use',
        $result
    );
});
