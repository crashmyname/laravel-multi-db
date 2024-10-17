<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'emplyees';

    // public function __construct(array $attributes = [])
    // {
    //     parent::__construct($attributes);
    //     $this->setConnection($this->resolveConnection());
    // }

    // public function resolveConnection()
    // {
    //     $vendor = auth()->user()->vendor;
    //     return $vendor;
    // }
}
