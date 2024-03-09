<?php

declare(strict_types=1);

namespace App\Utils\ParserUtility\Parsers;

trait ParseDataTrait
{
    use ParseArrayTrait;
    use ParseBoolTrait;
    use ParseFloatTrait;
    use ParseIntTrait;
    use ParseStringTrait;
    use ParseEnumTrait;
    use ParseEntityTrait;
    use ParseCarbonTrait;
}
