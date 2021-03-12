<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        // Role::create(['name'=>'admin']);
        // Role::create(['name' => 'doctor']);
        // Permission::create(['name' => 'edit_doctor']);
        // Permission::create(['name' => 'show_doctor']);
        // Permission::create(['name' => 'remove_doctor']);
        // Permission::create(['name' => 'create_doctor']);


        // $role = Role::findById(2);
        // $permission = Permission::findById(8);
        // $permission = Permission::findById(9);

        // $role->givePermissionTo($permission);
        // return auth()->user();
        // auth()->user()->givePermissionTo('edit doctor');


        // auth()->user()->assignRole('admin');
        // auth()->user()->givePermissionTo('edit_doctor');
        // auth()->user()->givePermissionTo('show_doctor');
        // auth()->user()->givePermissionTo('remove_doctor');
        // auth()->user()->givePermissionTo('create_doctor');




        // return auth()->user()->getPermissionsViaRoles();

        // to check which permission the user has
        // return auth()->user()->permissions;
        // return User::role('admin')->get();
        // return User::permission('edit doctor')->get();


        return view('home');
    }
}
