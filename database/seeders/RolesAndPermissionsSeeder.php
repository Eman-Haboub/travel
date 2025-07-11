<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 🛠️ Permissions
        $permissions = [
            // إدارة الرحلات
            'view trips', 'create trips', 'edit trips', 'delete trips',

            // إدارة الفنادق
            'view hotels', 'create hotels', 'edit hotels', 'delete hotels',

            // إدارة الحجوزات
            'view bookings', 'manage bookings',

            // إدارة التذاكر
            'view tickets', 'manage tickets',

            // إدارة المراجعات
            'view reviews', 'delete reviews',

            // إدارة المستخدمين
            'view users', 'edit users', 'delete users', 'assign roles',

            // الإشعارات
            'view notifications', 'send notifications',

            // المدفوعات
            'view payments', 'manage payments',

            // الصفحات الثابتة
            'edit pages',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // 👤 Roles

        // مستخدم عادي
        $user = Role::firstOrCreate(['name' => 'user']);
        $user->givePermissionTo([
            'view trips',
            'view hotels',
            'view bookings',
            'view tickets',
            'view reviews',
            'view notifications',
            'view payments',
        ]);

        // موظف (Editor)
        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->givePermissionTo([
            'view trips', 'create trips', 'edit trips',
            'view hotels', 'create hotels', 'edit hotels',
            'view bookings', 'manage bookings',
            'view tickets', 'manage tickets',
            'view reviews', 'delete reviews',
            'view notifications', 'send notifications',
            'view payments',
        ]);

        // المشرف العام (Admin)
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());
    }
}
