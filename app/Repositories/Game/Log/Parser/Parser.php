<?php

declare(strict_types=1);

namespace App\Repositories\Game\Log\Parser;

use App\Repositories\Game\Log\Parser\Drivers\Formatters\ServiceFormattersEnum;
use App\Repositories\Game\Log\Parser\Drivers\ParserDriverInterface;
use App\Repositories\Game\Log\Parser\Readers\ReaderInterface;

readonly class Parser
{
    public function __construct(
        protected ParserDriverInterface $driver,
        protected ReaderInterface $reader
    ) {}

    /**
     * @return array<array<string, string>>
     */
    public function parse(): array
    {
        $result = [];

        $formatters = $this->driver->formatters();

        /** @var string $line */
        foreach ($this->reader->generator() as $line) {
            $parsedLine = $this->variablesScanner($this->driver->template(), $line);

            foreach ($formatters as $varName => $formatter) {
                if ($serviceFormatterEnum = ServiceFormattersEnum::tryFrom($varName)) {
                    $parsedLine = $serviceFormatterEnum->resolve($parsedLine, $formatter);
                } elseif (array_key_exists($varName, $parsedLine)) {
                    $parsedLine[$varName] = $formatter($parsedLine[$varName]);
                }
            }

            $result[] = $parsedLine;
        }

        return $result;
    }

    /**
     * @return array<string, string>
     */
    protected function variablesScanner(string $template, string $line): array
    {
        $result = [];
        $lineCursor = 0;
        $templateCursor = 0;
        $templateLength = strlen($template);
        $lineLength = strlen($line);

        while ($lineCursor < $lineLength) {
            if ($templateCursor < $templateLength && $line[$lineCursor] !== $template[$templateCursor] && $template[$templateCursor] !== '@') {
                $lineCursor++;

                continue;
            }

            if ($templateCursor < $templateLength && $template[$templateCursor] === '@') {
                $varName = '';
                $templateCursor++;

                while ($templateCursor < $templateLength && $template[$templateCursor] !== '@') {
                    $varName .= $template[$templateCursor];
                    $templateCursor++;
                }

                $templateCursor++;
                $result[$varName] = '';

                while ($lineCursor < $lineLength && ($templateCursor >= $templateLength || $line[$lineCursor] !== $template[$templateCursor])) {
                    $result[$varName] .= $line[$lineCursor];
                    $lineCursor++;
                }
            }

            $templateCursor++;
            $lineCursor++;
        }

        return $result;
    }
}
