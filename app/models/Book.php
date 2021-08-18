<?php

final class Book extends GPNode
{

    protected static function getDataTypesImpl()
    {
        return [
            new GPDataType('title', GPDataType::GP_STRING),
        ];
    }

    protected static function getEdgeTypesImpl()
    {
        return [
            (new GPEdgeType(Author::class, 'authors'))->setSingleNodeName('author')
        ];
    }
}
