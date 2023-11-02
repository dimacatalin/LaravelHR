<?php
namespace Database\Seeders;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\FileLabelPolicy;
use App\Policies\FilePolicy;
use App\Policies\LabelPolicy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{

    protected $permissions = [
        User::USER_ROLE_USER => [
            'data' => [
                LabelPolicy::ROLE_CREATE,
                LabelPolicy::ROLE_INDEX,
                LabelPolicy::ROLE_SHOW,
                LabelPolicy::ROLE_UPDATE,
                LabelPolicy::ROLE_DELETE,
                CategoryPolicy::ROLE_CREATE,
                CategoryPolicy::ROLE_INDEX,
                CategoryPolicy::ROLE_SHOW,
                CategoryPolicy::ROLE_UPDATE,
                CategoryPolicy::ROLE_DELETE,
                FilePolicy::ROLE_CREATE,
                FilePolicy::ROLE_INDEX,
                FilePolicy::ROLE_SHOW,
                FilePolicy::ROLE_UPDATE,
                FilePolicy::ROLE_DELETE,
                FilePolicy::ROLE_DOWNLOAD,
                FileLabelPolicy::ROLE_CREATE,
                FileLabelPolicy::ROLE_INDEX,
                FileLabelPolicy::ROLE_SHOW,
                FileLabelPolicy::ROLE_UPDATE,
                FileLabelPolicy::ROLE_DELETE,
            ]
        ],
        User::USER_ROLE_ADMIN => [
            'data' => [
                //
            ],
            'inherits' => User::USER_ROLE_USER
        ],
    ];

    public function run()
    {
        DB::table('role_has_permissions')->truncate();
        foreach ($this->permissions as $role => $rolePermissions) {
            $dbRole = Role::firstOrCreate(['name' => $role]);
            $permissionsArray = [];
            if ($rolePermissions && array_key_exists('data', $rolePermissions)) {
                foreach ($rolePermissions['data'] as $permission) {
                    Permission::firstOrCreate(['name' => $permission]);
                    $permissionsArray[] = $permission;
                }
                $dbRole->givePermissionTo($permissionsArray);
                if (array_key_exists('inherits', $rolePermissions)) {
                    $inheritedRole = $rolePermissions['inherits'];
                    if (array_key_exists($inheritedRole, $this->permissions) && array_key_exists('data', $this->permissions[$inheritedRole])) {
                        $inheritedDbRole = Role::firstOrCreate(['name' => $inheritedRole]);
                        $permissionsArray = [];
                        foreach ($inheritedDbRole->permissions as $permission) {
                            $permissionsArray[] = $permission->name;
                        }
                        $dbRole->givePermissionTo($permissionsArray);
                    }
                }
            }
        }
    }
}
