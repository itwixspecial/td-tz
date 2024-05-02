<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Створюємо ролі
        $adminRole = Role::create(['name' => 'admin']);
        $teamLeadRole = Role::create(['name' => 'team_lead']);
        $buyerRole = Role::create(['name' => 'buyer']);

        // Створюємо доступи
        $updateStatisticPermission = Permission::create(['name' => 'updateStatistic']);
        $assignBuyerPermission = Permission::create(['name' => 'assignBuyer']);
        $attachRolePermission = Permission::create(['name' => 'attachRole']);
        $viewAllStatisticPermission = Permission::create(['name' => 'viewAllStatistic']);
        $viewTeamStatisticPermission = Permission::create(['name' => 'viewTeamStatistic']);
        $viewBuyerStatisticPermission = Permission::create(['name' => 'viewBuyerStatistic']);
        
        // Прив'язуємо доступ "viewAllStatistic"
        $adminRole->givePermissionTo($viewAllStatisticPermission);

        // Прив'язуємо доступ "viewTeamStatistic"
        $teamLeadRole->givePermissionTo($viewTeamStatisticPermission);

        // Прив'язуємо доступ "viewBuyerStatistic"
        $buyerRole->givePermissionTo($viewBuyerStatisticPermission);

        // Прив'язуємо доступ "attachRole"
        $adminRole->givePermissionTo($attachRolePermission);
        $teamLeadRole->givePermissionTo($attachRolePermission);
        
        // Прив'язуємо доступ "assignBuyer"
        $adminRole->givePermissionTo($assignBuyerPermission);

        // Прив'язуємо доступ "updateStatistic"
        $adminRole->givePermissionTo($updateStatisticPermission);
        $teamLeadRole->givePermissionTo($updateStatisticPermission);

        // Створення користувача
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => bcrypt('12345678'),
        ]);

        // Додавання ролі адміна користувачу
        $user->assignRole($adminRole);
    }
}
