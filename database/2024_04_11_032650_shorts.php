<?php

use Lib\Database\ColumnDefinition;
use Lib\Database\Contracts\Schema;
use Lib\Database\SchemaForge;

return new class implements Schema
{
    public function up(ColumnDefinition $column): void
    {
        SchemaForge::createTable('shorts', [
            $column->id()->generate(),
            $column->string('long_url')->notNullable()->generate(),
            $column->string('short_code')->unique()->notNullable()->generate(),
            $column->integer('hits')->default(0)->generate(),
            $column->timestamps()->generate(),
        ]);
    }

    public function down(): void
    {
        SchemaForge::dropTable('shorts');
    }
};
