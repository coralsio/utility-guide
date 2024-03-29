<?php

namespace Tests\Feature;

use Corals\User\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UtilityGuideViewTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $user = User::query()->whereHas('roles', function ($query) {
            $query->where('name', 'superuser');
        })->first();
        Auth::loginUsingId($user->id);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_utility_guide_view()
    {
        $response = $this->get('utilities/guides');

        $response->assertStatus(200)->assertViewIs('utility-guide::guide.index');
    }

    public function test_utility_guide_create()
    {
        $response = $this->get('utilities/guides/create');

        $response->assertViewIs('utility-guide::guide.create_edit')->assertStatus(200);
    }
}
