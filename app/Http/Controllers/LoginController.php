<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoiCuoc; 
use App\Models\UserPackage; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session(['user_id' => Auth::id()]);
            $user = Auth::user();

            if (isset($user->role)) {
                switch ($user->role) {
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                    case 'user':
                        return redirect()->route('auth.dashboard');
                    default:
                        return redirect('/dashboard');
                }
            } 
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }

    // public function dashboard()
    // {
    //     $goiPhoBien = UserPackage::select('goi_cuoc_id', DB::raw('COUNT(*) as tong_dang_ky'))
    //         ->groupBy('goi_cuoc_id')
    //         ->orderByDesc('tong_dang_ky')
    //         ->take(8)
    //         ->with('goiCuoc') 
    //         ->get();

    //      $goiMoi = GoiCuoc::orderByDesc('created_at')->take(4)->get();

    //     return view('auth.dashboard', compact('goiPhoBien', 'goiMoi'));
    // }

    public function dashboard()
    {
        $goiPhoBien = UserPackage::select('goi_cuoc_id', DB::raw('COUNT(*) as tong_dang_ky'))
            ->whereHas('goiCuoc', function($query) {
                $query->where('mang', '5G'); // Chỉ lấy gói có cột mang = "5G"
            })
            ->groupBy('goi_cuoc_id')
            ->orderByDesc('tong_dang_ky')
            ->take(8)
            ->with('goiCuoc') 
            ->get();

        $goiMoi = GoiCuoc::where('mang', '5G') // Chỉ lấy gói 5G
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        return view('auth.dashboard', compact('goiPhoBien', 'goiMoi'));
    }
    
    public function admin_dashboard()
    {
        $user = Auth::user(); 
        $tongDangKy = DB::table('user_package')->where('user_package.status', 'Hoàn thành') ->count();
        $tongDangKyChuaXuLy = DB::table('user_package')->where('user_package.status', 'Chờ xử lý') ->count();
        $soDangKyHomNay = DB::table('user_package')->whereDate('created_at', Carbon::today())->count();
        $tongNguoiDung = DB::table('users')->count();
        $soNguoiDungHomNay = DB::table('users')->whereDate('created_at', Carbon::today())->count();
        $goiCuoc = DB::table('goi_cuoc')->count();
        $tongDoanhThu = DB::table('user_package')
        ->join('goi_cuoc', 'goi_cuoc_id', '=', 'goi_cuoc.id')
        ->where('user_package.status', 'Hoàn thành')
        ->sum(DB::raw("
            goi_cuoc.cuoc_phi + 
            CASE WHEN user_package.sim IS NOT NULL AND user_package.sim <> '' 
                THEN 50000 ELSE 0 END
        "));


        $doanhThuHomNay = DB::table('user_package')
            ->join('goi_cuoc', 'goi_cuoc_id', '=', 'goi_cuoc.id')
            ->where('user_package.status', 'Hoàn thành') 
            ->whereDate('user_package.created_at', Carbon::today())
            ->sum(DB::raw("
                goi_cuoc.cuoc_phi + 
                CASE WHEN user_package.sim IS NOT NULL AND user_package.sim <> '' 
                    THEN 50000 ELSE 0 END
            "));

         $year = now()->year;

        $comboData = DB::table('user_package')
            ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
            ->select(DB::raw('MONTH(user_package.created_at) as thang'), DB::raw('COUNT(*) as so_lan'))
            ->where('goi_cuoc.loai_goi', 'combo')
            ->where('user_package.status', 'Hoàn thành') 
            ->whereYear('user_package.created_at', $year)
            ->groupBy(DB::raw('MONTH(user_package.created_at)'))
            ->pluck('so_lan', 'thang');

        $onlyData = DB::table('user_package')
            ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
            ->select(DB::raw('MONTH(user_package.created_at) as thang'), DB::raw('COUNT(*) as so_lan'))
            ->where('goi_cuoc.loai_goi', 'data')
            ->where('user_package.status', 'Hoàn thành') 
            ->whereYear('user_package.created_at', $year)
            ->groupBy(DB::raw('MONTH(user_package.created_at)'))
            ->pluck('so_lan', 'thang');

        $comboArray = [];
        $onlyArray = [];

        for ($i = 1; $i <= 12; $i++) {
            $comboArray[] = $comboData[$i] ?? 0;
            $onlyArray[] = $onlyData[$i] ?? 0;
        }


       $doanhThuTheoLoai = DB::table('user_package')
            ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
            ->select(
                DB::raw("
                    SUM(
                        CASE 
                            WHEN goi_cuoc.loai_goi = 'combo' 
                            THEN goi_cuoc.cuoc_phi + 
                                CASE WHEN user_package.sim IS NOT NULL AND user_package.sim <> '' THEN 50000 ELSE 0 END
                            ELSE 0 
                        END
                    ) as combo
                "),
                DB::raw("
                    SUM(
                        CASE 
                            WHEN goi_cuoc.loai_goi = 'data' 
                            THEN goi_cuoc.cuoc_phi + 
                                CASE WHEN user_package.sim IS NOT NULL AND user_package.sim <> '' THEN 50000 ELSE 0 END
                            ELSE 0 
                        END
                    ) as onlydata
                ")
            )
            ->where('user_package.status', 'Hoàn thành')
            ->first();

        $doanhThuCombo = DB::table('user_package')
            ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
            ->where('goi_cuoc.loai_goi', 'combo')
            ->where('user_package.status', 'Hoàn thành') 
            ->sum(DB::raw("goi_cuoc.cuoc_phi + 
                CASE WHEN user_package.sim IS NOT NULL AND user_package.sim <> '' THEN 50000 ELSE 0 END"));

        $doanhThuOnly = DB::table('user_package')
            ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
            ->where('goi_cuoc.loai_goi', 'data')
            ->where('user_package.status', 'Hoàn thành') 
            ->sum(DB::raw("goi_cuoc.cuoc_phi + 
                CASE WHEN user_package.sim IS NOT NULL AND user_package.sim <> '' THEN 50000 ELSE 0 END"));



        return view('admin.dashboard', compact('user', 'tongDangKy', 'soDangKyHomNay', 'tongNguoiDung', 'soNguoiDungHomNay', 'tongDoanhThu',
         'doanhThuHomNay', 'comboArray', 'onlyArray' , 'doanhThuTheoLoai', 'tongDoanhThu', 'doanhThuCombo', 'doanhThuOnly', 'tongDangKyChuaXuLy'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function question()
    {
        return view('auth.question');
    }
}
?>