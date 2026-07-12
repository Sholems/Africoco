<?php

namespace Tests\Feature;

use App\Models\User;
use Filament\Panel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Tests\TestCase;

class AdminPanelAccessTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public function test_users_without_dashboard_permission_cannot_access_filament_panel(): void
    {
        $user = User::factory()->create();

        $this->assertFalse($user->canAccessPanel(app(Panel::class)));
    }

    public function test_users_with_dashboard_permission_can_access_filament_panel(): void
    {
        $user = User::factory()->create();
        $permission = Permission::create(['name' => 'view dashboard']);

        $user->givePermissionTo($permission);

        $this->assertTrue($user->canAccessPanel(app(Panel::class)));
    }
}
