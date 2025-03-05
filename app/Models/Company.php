<?php

namespace App\Models;

use App\Enums\State;
use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy(CompanyObserver::class)]
class Company extends Model
{
    use HasFactory, SoftDeletes;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    protected function casts(): array
    {
        return [
            'uuid' => 'string',
            'name' => 'string',
            'website' => 'string',
            'phone' => 'string',
            'address' => 'string',
            'city' => 'string',
            'state' => State::class,
            'zip' => 'string',
        ];
    }
}
