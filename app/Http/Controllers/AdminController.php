<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

// use App\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function AuthLogin()
    {
        // day ve trang login khi khong ton tai admin_id
        $admin_id =  Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin.page-items.login')->send();
        }
    }
    public function managerOder()
    {
        $ds = DB::table('tb_order')->get();
        // print_r($ds);
        return view("admin.manager_order", ["order" => $ds]);
    }

    public function viewOrder($order_id)
    {
        $this->AuthLogin();
        $order_by_id = DB::table('tb_order')
            ->join('tb_customer', 'tb_order.customer_id', '=', 'tb_customer.customer_id')
            ->join('tb_shipping', 'tb_order.shipping_id', '=', 'tb_shipping.shipping_id')
            // ->join('tb_order_detail','tb_order.order_id','=','tb_order_detail.order_id')
            ->select('tb_order.*', 'tb_customer.*', 'tb_shipping.*')->first();
        // echo '<pre>';
        // print_r($order_by_id);
        // echo '</pre>';
        $manager_order_by_id = view('admin.view_order')->with("order_by_id", $order_by_id);
        return view('admin.layout.layout')->with('admin.view_order', $manager_order_by_id);
    }
}
//     public function checkLogin(Request $request)
//     {
//         if ($request->session()->has('users')) {
//             $request->session()->forget('users');
//         }

//         $email = $request->email;
//         $pwd = $request->pwd;

//         $user = DB::table('tb_user')->where('email', $email)->first();

//         if ($user != null && $user->password == $pwd) {
//             // $request->session()->push('user', $user);
//             // push() luu bien mang

//             // tao bien session de luu thong tin TK dang nhap thanh cong
//             session(['user' => $user]);
//             // $request->session()->put('user', $user);

//             if ($user->role == 1) {
//                 return redirect('admin/index');
//                 //return redirect()->route('adminuserlist');
//             } else {
//                 // return redirect("user/details/" . $user->accountID);
//                 return redirect('home');
//             }
//         } else {
//             return redirect('checkoutLogin')->with('message', 'Login Fail.');
//         }
//     }

//     public function addUser(Request $request)
//     {

//         $email = $request->email;
//         $pwd = $request->password;
//         $name = $request->name;
//         $role = $request->role;
//         $active = $request->active;
//         DB::table('tb_user')->insert([
//             'email' => $email,
//             'password' => $pwd,
//             'name' => $name,
//             'role' => intval($role),
//             'active' => intval($active)
//         ]);
//         return redirect('admin/users');
//     }

//     public function resetPassword($id)
//     {
//         DB::table('tb_user')
//             ->where('id', $id)
//             ->update(['password' => '123']);
//         return redirect('admin/users'); //->action([AccountController::class, 'users']);
//     }

//     public function users()
//     {
//         $users = DB::table('tb_user')->where('role', 0)->get();
//         return view('admin.customer')->with(['ds' => $users]);
//     }

//     public function staff()
//     {
//         $users = DB::table('tb_user')->where('role', 1)->get();
//         return view('admin.staff')->with(['ds' => $users]);
//     }

//     public function displayAddUser()
//     {
//         return view('admin.addUser');
//     }
//     public function details($id)
//     {
//         $user = DB::table('tb_user')->where('id', $id)->first();
//         return view('user/details')->with(['user' => $user]);
//     }

//     public function adminindex()
//     {
//         return view("admin.index");
//     }
//     public function showdashboard()
//     {
//         return view("admin.dashboard");
//     }
//     public function dashboard(Request $request)
//     {
//         $admin_name = $request->admin_name;
//         $admin_id = $request->admin_id;
//         $password = md5($request->password);
//         $result = DB::table("tb_admin")->where("admin_name", $admin_name)->where("password", $password)->first();
//         if ($result) {
//             Session::put('admin_name', $result->admin_name);
//             Session::put('password', md5($result->password));
//             Session::put('admin_id', $result->admin_id);
//             return redirect("admin/index");
//         } else {
//             Session::put('message', 'Mat khau hoac ten bi sai');
//             return redirect('user/page-items/login');
//         }
//     }

//     public function logout()
//     {
//         Session::put('admin_name', null);
//         Session::put('admin_id', null);
//         return redirect('user/page-items/home');
//     }
// }
