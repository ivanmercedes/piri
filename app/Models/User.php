<?php

namespace App\Models;

use SleekDB\Store;

class User extends Store
{
    protected $storeName = "User";
    protected $databasePath = DATABASE_DIRECTORY;

    public function __construct()
    {
        parent::__construct($this->storeName, $this->databasePath, ['timeout'=>false]);
    }
}