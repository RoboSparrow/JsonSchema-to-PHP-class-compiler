<?php
namespace API\Validator\V10\Schema;

use JsonSchema;

final class JsonSchema
{

    private static $schema = @@SCHEMA_VALUES@@;

    public static function schema(){
        return self::$schema;
    }

}
