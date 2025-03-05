<?php

namespace App\Models;

use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(CompanyObserver::class)]
class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected function casts(): array
    {
        return [
            'uuid' => 'string',
            'name' => 'string',
            'industry' => 'string',
            'website' => 'string',
            'phone' => 'string',
            'address' => 'string',
            'city' => 'string',
            'state' => 'string',
            'zip' => 'string',
        ];
    }
}
