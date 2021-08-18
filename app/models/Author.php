<?php

class Author extends GPNode
{

    protected static function getDataTypesImpl()
    {
        return [
            new GPDataType('name', GPDataType::GP_STRING),
        ];
    }

    protected static function getEdgeTypesImpl()
    {
        return [
            (new GPEdgeType(Comment::class, 'comments'))
                ->inverse(Comment::getEdgeType('post')),
        ];
    }
}
