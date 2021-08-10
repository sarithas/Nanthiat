<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'project_access',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 19,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 20,
                'title' => 'project_detail_create',
            ],
            [
                'id'    => 21,
                'title' => 'project_detail_edit',
            ],
            [
                'id'    => 22,
                'title' => 'project_detail_show',
            ],
            [
                'id'    => 23,
                'title' => 'project_detail_delete',
            ],
            [
                'id'    => 24,
                'title' => 'project_detail_access',
            ],
            [
                'id'    => 25,
                'title' => 'contact_create',
            ],
            [
                'id'    => 26,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 27,
                'title' => 'contact_show',
            ],
            [
                'id'    => 28,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 29,
                'title' => 'contact_access',
            ],
            [
                'id'    => 30,
                'title' => 'blog_create',
            ],
            [
                'id'    => 31,
                'title' => 'blog_edit',
            ],
            [
                'id'    => 32,
                'title' => 'blog_show',
            ],
            [
                'id'    => 33,
                'title' => 'blog_delete',
            ],
            [
                'id'    => 34,
                'title' => 'blog_access',
            ],
            [
                'id'    => 35,
                'title' => 'gallery_access',
            ],
            [
                'id'    => 36,
                'title' => 'photo_create',
            ],
            [
                'id'    => 37,
                'title' => 'photo_edit',
            ],
            [
                'id'    => 38,
                'title' => 'photo_show',
            ],
            [
                'id'    => 39,
                'title' => 'photo_delete',
            ],
            [
                'id'    => 40,
                'title' => 'photo_access',
            ],
            [
                'id'    => 41,
                'title' => 'video_create',
            ],
            [
                'id'    => 42,
                'title' => 'video_edit',
            ],
            [
                'id'    => 43,
                'title' => 'video_show',
            ],
            [
                'id'    => 44,
                'title' => 'video_delete',
            ],
            [
                'id'    => 45,
                'title' => 'video_access',
            ],
            [
                'id'    => 46,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
