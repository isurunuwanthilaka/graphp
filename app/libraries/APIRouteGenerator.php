v<?php

    final class APIRouteGenerator extends GPRouteGenerator
    {

        private const OPTIONS = 'OPTIONS';

        private static array $methodMap = [
            'GET' => 'all',
            'GETID' => 'view',
            'POST' => 'create',
            'PUTID' => 'update',
            'DELETEID' => 'delete',
            'OPTIONS' => self::OPTIONS,
        ];

        public function __construct(string $uri)
        {
            parent::__construct($uri);
        }

        public function getController(): string
        {
            return $this->getPath()[3];
        }

        public function getMethod(): string
        {
            $id = null;

            if (count($this->getPath()) > 4) {
                $id = $this->getPath()[4];
            }

            $has_id = in_array($_SERVER['REQUEST_METHOD'], ['GET', 'PUT', 'DELETE']) && $id;

            $method = idxx(
                self::$methodMap,
                $_SERVER['REQUEST_METHOD'] . ($has_id ? 'ID' : ''),
            );

            if ($method === self::OPTIONS) {
                GP::exit();
            }

            return $method;
        }

        public function getArgs(): array
        {
            return array_slice($this->getPath(), 4);
        }
    }
