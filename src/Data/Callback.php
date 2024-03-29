<?php

declare(strict_types=1);

namespace BombenProdukt\OpenApi\Data;

use BombenProdukt\OpenApi\Data\Actions\MapArray;
use BombenProdukt\OpenApi\Reader;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#callback-object
 */
final class Callback extends Data
{
    public function __construct(
        /** @var PathItem[]|Reference[] */
        public array $items,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            items: MapArray::execute($reader, $data, PathItem::class),
        );
    }
}
