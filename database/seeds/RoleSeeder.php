<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $created_at = Carbon::now()->format('Y-m-d H:i:s');
        \DB::table('tbl_roles')->delete();
        \DB::table('tbl_roles')->insert(
        	array(
	        	array('id' => 1, 'role_name' => 'NORMAL_USER', 'display_name' => 'Người dùng bình thường (Các đơn vị)', 'created_at' => $created_at),
				array('id' => 2, 'role_name' => 'SUPER_USER', 'display_name' => 'Người quản lý (Nhân viên bảo hiểm Quận/Huyện)', 'created_at' => $created_at),
				array('id' => 3, 'role_name' => 'ROOT', 'display_name' => 'Người quản lý cấp cao (Anh Bảo)', 'created_at' => $created_at),
				array('id' => 4, 'role_name' => 'LORD', 'display_name' => 'Chúa tể của các vị thần', 'created_at' => $created_at),
        	)
        );
        echo "[DB SEED]: Finish seeding data for tbl_roles";
    }
}
