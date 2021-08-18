<?php

class Books extends GPController
{
    public function all()
    {
        $data = [['id' => 1, 'name' => 'book1'], ['id' => 2, 'name' => 'book2']];
        GP::ajax($data);
    }

    public function view(int $id): void
    {
        GP::ajax(['id' => $id]);
    }
}
