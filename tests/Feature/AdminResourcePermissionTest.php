<?php

namespace Tests\Feature;

use App\Filament\Resources\BlogPostResource;
use App\Filament\Resources\ContactMessageResource;
use App\Filament\Resources\MediaResource;
use App\Filament\Resources\UserResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Tests\TestCase;

class AdminResourcePermissionTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }

    public function test_guest_cannot_view_admin_resources(): void
    {
        $this->assertFalse(BlogPostResource::canViewAny());
        $this->assertFalse(ContactMessageResource::canViewAny());
        $this->assertFalse(MediaResource::canViewAny());
        $this->assertFalse(UserResource::canViewAny());
    }

    public function test_admin_resources_require_their_configured_permissions(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->assertFalse(BlogPostResource::canViewAny());
        $this->assertFalse(ContactMessageResource::canViewAny());
        $this->assertFalse(MediaResource::canViewAny());
        $this->assertFalse(UserResource::canViewAny());

        Permission::create(['name' => 'manage blog']);
        Permission::create(['name' => 'manage contact']);
        Permission::create(['name' => 'manage gallery']);
        Permission::create(['name' => 'manage users']);

        $user->givePermissionTo('manage blog');
        $this->assertTrue(BlogPostResource::canViewAny());
        $this->assertFalse(ContactMessageResource::canViewAny());
        $this->assertFalse(MediaResource::canViewAny());
        $this->assertFalse(UserResource::canViewAny());

        $user->givePermissionTo('manage contact', 'manage gallery', 'manage users');
        $this->assertTrue(ContactMessageResource::canViewAny());
        $this->assertTrue(MediaResource::canViewAny());
        $this->assertTrue(UserResource::canViewAny());
    }
}
