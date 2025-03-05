<?php

namespace App\Observers;

use App\Models\Company;
use Illuminate\Support\Str;

class CompanyObserver
{
    public function creating(Company $company): void
    {
        $company->uuid = (string) Str::uuid();
    }

    public function created(Company $company): void
    {
        $company->users()->attach(auth()->id());
    }
}
