<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Provides a User model for login
     */
    protected function user(): User
    {
        return factory(User::class)->make();
    }
}
