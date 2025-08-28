<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\GoiCuoc;
use App\Models\UserPackage;
use App\Models\Sim;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\DB;

class GoiCuocController extends Controller
{
    public function show($id)
    {
        $goi = GoiCuoc::findOrFail($id);

        $goiCungChuKy = GoiCuoc::where('chu_ky', $goi->chu_ky)
            ->where('id', '!=', $goi->id)
            ->get();

        return view('auth.DetailPackage', compact('goi', 'goiCungChuKy'));
    }

    // public function registerPackage($packageId)
    // {
    //     $userId = Auth::id();
    //     $now = now();

    //     $package = GoiCuoc::findOrFail($packageId);

    //     DB::table('user_package')->insert([
    //         'user_id' => $userId,
    //         'goi_cuoc_id' => $package->id,
    //         'registered_at' => $now,
    //         'status' => 'Đang hoạt động',
    //         'note' => null,
    //         'created_at' => $now,
    //         'updated_at' => $now,
    //     ]);

    //     return redirect()->back()->with('success', 'Đăng ký thành công!');
    // }


    public function registerPackage(Request $request)
{
    $request->validate([
        'fullname'   => 'required|string|max:255',
        'phone'      => 'required|string|max:20',
        'email'      => 'required|email|max:255',
        'goi_cuoc_id'=> 'required|integer|exists:goi_cuoc,id',
    ]);


    DB::table('user_package')->insert([
        'goi_cuoc_id'    => $request->goi_cuoc_id,
        'customer_name'  => $request->fullname,
        'customer_phone' => $request->phone,
        'customer_email' => $request->email,
        'status'         => 'Chờ xử lý',
        'registered_at'  => now(),
        'created_at'     => now(),
        'updated_at'     => now(),
    ]);

    return redirect()->back()->with('success', 'Đăng ký gói cước thành công! Vui lòng chờ xử lý.');
}

    public function goiChiData()
    {
        $nganNgay = GoiCuoc::where('loai_goi', 'DATA')
            ->whereBetween('chu_ky', [1, 7])
            ->paginate(6);

        $goiThang = GoiCuoc::where('loai_goi', 'DATA')
            ->where('chu_ky', 30)
            ->paginate(6);

        $daiNgay = GoiCuoc::where('loai_goi', 'DATA')
            ->where('chu_ky', '>', 30)
            ->paginate(6);

        return view('auth.onlydata', compact('nganNgay', 'goiThang', 'daiNgay'));
    }

    public function goiCombo()
    {
        $nganNgayC = GoiCuoc::where('loai_goi', 'COMBO')
        ->whereBetween('chu_ky', [1,7])->get();

        $goiThangC = GoiCuoc::where('loai_goi', 'COMBO')
        ->where('chu_ky', 30)->get();

         $daiNgayC = GoiCuoc::where('loai_goi', 'COMBO')
        ->where('chu_ky', '>', 30)->get();

        return view('auth.combo', compact('nganNgayC', 'goiThangC', 'daiNgayC'));
    }

    public function goiTraSau()
    {
        $goiCuoc = GoiCuoc::where('danh_muc', 'tra_sau')->get();
        return view('auth.traSau', compact('goiCuoc'));
    }

    public function goiTraTruoc()
{
    $goiCuoc = GoiCuoc::where('danh_muc', 'tra_truoc')
        ->orderBy('loai_goi')
        ->orderBy('chu_ky', 'asc')
        ->get();

    
    $onlyData = $goiCuoc->where('loai_goi', 'DATA');
    $dataZone = $goiCuoc->where('loai_goi', 'DATA_ZONE');
    $combo    = $goiCuoc->where('loai_goi', 'COMBO');
    $dacBiet  = $goiCuoc->where('loai_goi', 'DAC_BIET');

    return view('auth.traTruoc', compact('goiCuoc', 'onlyData', 'dataZone', 'combo', 'dacBiet'));
}


    public function chonSo($id)
    {
        $goi = GoiCuoc::findOrFail($id);
        $soDienThoai = Sim::where('da_chon', false)
            ->get();

        return view('auth.chonSo', compact('goi', 'soDienThoai'));
    }

    public function dangKy(Request $request)
    {
        $request->validate([
            'goi_id' => 'required|exists:goi_cuoc,id',
            'sim_id' => 'required|exists:sim,id',
        ]);

        $userId = Auth::id(); // hoặc 1 nếu test
        $now = now();

        $goiCuoc = DB::table('goi_cuoc')->where('id', $request->goi_id)->first();

        DB::table('user_package')->insert([
            'user_id'       => $userId,
            'goi_cuoc_id'   => $goiCuoc->id,
            'sim_id'        => $request->sim_id,
            'registered_at' => $now,
            'status'        => 'Đang hoạt động',
            'note'          => null,
            'created_at'    => $now,
            'updated_at'    => $now,
        ]);

        DB::table('sim')->where('id', $request->sim_id)->update(['da_chon' => true]);

        return redirect()->back()->with('success', 'Đăng ký gói cước và SIM thành công!');
    }

    public function chatLuongDichVu()
    {
        return view('auth.danhGia');
    }

    public function timGoi(Request $request)
    {
        $tenGoi = $request->input('ten_goi');
        $goi = GoiCuoc::where('ma_goi', $tenGoi)->first();

        if (!$goi) {
            return response()->json([
                'success' => false,
                'html' => '<div class="alert alert-danger">Không tìm thấy gói cước có tên: ' . $tenGoi . '</div>'
            ]);
        }

        // render view nhỏ của 1 gói cước
        $html = view('auth.timKiem', compact('goi'))->render();

        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }

    public function listGoiCuoc(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->input('keyword');

        $goiCuoc = GoiCuoc::when($keyword, function($query, $keyword) {
            $query->where('ma_goi', 'like', "%{$keyword}%");
        })->get();

        return view('admin.goiCuoc', compact('user', 'goiCuoc', 'keyword'));
    }


    public function view_add()
    {
        $user = Auth::user();   
        return view('admin.themGoiCuoc', compact('user'));
    }

    public function addGoiCuoc(Request $request)
{
    $request->validate([
        'ma_goi' => 'required|unique:goi_cuoc,ma_goi',
        'ten_goi' => 'required',
        'loai_goi' => 'required|in:DATA,DATA_ZONE,COMBO,DAC_BIET',
        'danh_muc' => 'required|in:tra_truoc,tra_sau',
        'cuoc_phi' => 'required|numeric',
        'chu_ky' => 'required|integer',
        'mang' => 'required|in:4G,5G',
        'uu_diem' => 'nullable|string',
        'cu_phap' => 'nullable|string',
        'pbh' => 'nullable|string',
    ]);

    GoiCuoc::create($request->all());

     return redirect()->route('list_goi_cuoc');
}

    public function delete_goi_cuoc($id)
    {
        $goiCuoc = GoiCuoc::findOrFail($id);
        $goiCuoc->delete();
        return redirect()->back()->with('success', 'Đã xóa gói cước thành công!');
    }

    

    public function edit($id)
    {
        $user = Auth::user();
        $goiCuoc = GoiCuoc::findOrFail($id);
        return view('admin.editGoiCuoc', compact('goiCuoc', 'user'));
    }
    public function update_goi_cuoc(Request $request, $id)
{
    $goiCuoc = GoiCuoc::findOrFail($id);
    $request->validate([
        'ma_goi' => 'required|unique:goi_cuoc,ma_goi,' . $id,
        'ten_goi' => 'required',
        'loai_goi' => 'required|in:DATA,DATA_ZONE,COMBO,DAC_BIET',
        'danh_muc' => 'required|in:tra_truoc,tra_sau',
        'cuoc_phi' => 'required|numeric',
        'chu_ky' => 'required|integer',
        'mang' => 'required|in:4G,5G',
        'uu_diem' => 'nullable|string',
        'cu_phap' => 'nullable|string',
        'pbh' => 'nullable|string',
    ]);

    
    $goiCuoc->update($request->all());

    return redirect()->route('list_goi_cuoc')->with('success', 'Cập nhật gói cước thành công!');
}

// public function updateSimStatus(Request $request, $id)
// {
//     $request->validate([
//         'sim' => 'required|string|max:50',
//         'status' => 'required|string|in:Chờ xử lý,Hoàn thành'
//     ]);

//     try {
//         $updated = DB::table('user_package')
//             ->where('id', $id)
//             ->update([
//                 'sim' => $request->sim,
//                 'status' => $request->status,
//                 'updated_at' => now()
//             ]);

//         if ($updated) {
//             return response()->json(['success' => true]);
//         }
//         return response()->json(['success' => false]);
//     } catch (\Exception $e) {
//         return response()->json([
//             'success' => false,
//             'message' => $e->getMessage()
//         ], 500);
//     }
// }



public function updateSimStatus(Request $request, $id)
{
    try {
        Log::info('UpdateSimStatus Request:', $request->all());

        $item = UserPackage::findOrFail($id);

        if (!$request->has('status')) {
            return response()->json([
                'success' => false,
                'message' => 'Thiếu tham số status'
            ], 400);
        }

        $item->status = $request->status;
        $item->save();

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật trạng thái thành công',
            'status'  => $item->status
        ]);
    } catch (\Exception $e) {
        Log::error('UpdateSimStatus Error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}






public function list_tra_truoc_khong_sim()
{

    
    $user = Auth::user();
    $dangKyTraTruoc = DB::table('user_package')
        ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
        ->where('goi_cuoc.danh_muc', 'tra_truoc')
        ->where(function ($query) {
            $query->whereNull('user_package.sim')
                  ->orWhere('user_package.sim', ''); 
        })
        ->select(
            'user_package.id',
            'user_package.customer_name',
            'user_package.customer_email',
            'user_package.customer_phone',
            'goi_cuoc.cuoc_phi',
            'goi_cuoc.ten_goi',
            'user_package.status',
            'user_package.registered_at'
        )
        ->get();

    return view('admin.traTruocKhongSim', compact( 'user', 'dangKyTraTruoc'));
}


// public function updateStatus(Request $request, $id)
// {
//     $package = UserPackage::findOrFail($id);
//     $package->status = $request->status ?? 'Hoàn thành';
//     $package->save();

//     return back()->with('success', 'Cập nhật trạng thái thành công!');
// }
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Chờ xử lý,Hoàn thành',
    ]);

    $userPackage = UserPackage::findOrFail($id);
    $userPackage->status = $request->status;
    $userPackage->save();

    return response()->json(['success' => true]);
}



public function list_tra_truoc_co_sim()
{
    $user = Auth::user();

    $dangKyTraTruoc = DB::table('user_package')
        ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
        ->where('goi_cuoc.danh_muc', 'tra_truoc')
        ->whereNotNull('user_package.sim') // Chỉ lấy sim KHÔNG null
        ->where('user_package.sim', '<>', '')
        ->select(
            'user_package.id',
            'goi_cuoc.ten_goi',
            'user_package.sim',
            'user_package.customer_name',
            'user_package.customer_phone',
            'user_package.cmnd_cccd',
            'user_package.dia_chi',
             DB::raw('goi_cuoc.cuoc_phi + 50000 as cuoc_phi'),
            'user_package.registered_at',
            'user_package.status',
            'user_package.note',
            'user_package.created_at',
            'user_package.updated_at'
        )
        ->get();

    return view('admin.traTruocCoSim', compact('user', 'dangKyTraTruoc'));
}


    public function list_tra_sau()
    {
        $user = Auth::user();

         $dangKyTraSau = DB::table('user_package')
        ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
        ->where('goi_cuoc.danh_muc', 'tra_sau')
        ->select(
            'user_package.id',
            'user_package.customer_name',
            'user_package.customer_email',
            'user_package.customer_phone',
            'goi_cuoc.ten_goi',
            'goi_cuoc.cuoc_phi',
            'goi_cuoc.chu_ky',
            'user_package.status',
            'user_package.registered_at',
        )
        ->get();

    return view('admin.traSau', compact('user', 'dangKyTraSau'));

    }

public function xuatFile()
{
    $goiCuoc = GoiCuoc::all();
    $filename = "goicuoc_" . date('Y-m-d_H-i-s') . ".csv";

    return response()->streamDownload(function() use ($goiCuoc) {
        $file = fopen('php://output', 'w');
        fwrite($file, "\xEF\xBB\xBF"); 

        fputcsv($file, ['Mã gói', 'Danh mục', 'Cú pháp', 'Dung lượng', 'Chu kỳ', 'Ưu điểm'], ';');

        foreach ($goiCuoc as $g) {
            $maGoi    = trim($g->ma_goi);
            $danhMuc  = trim($g->mang . ' - ' . $g->loai_goi);
            $cuPhap   = trim(preg_replace('/\s+/', ' ', $g->cu_phap)) 
                        . ' (Cước phí: ' . number_format($g->cuoc_phi, 0, ',', '.') . ' VNĐ)';
            $dungLuong= trim($g->dung_luong);
            $chuKy    = trim($g->chu_ky) . ' ngày';
            $uuDiem   = trim(preg_replace('/\s+/', ' ', $g->uu_diem));

            fputcsv($file, [$maGoi, $danhMuc, $cuPhap, $dungLuong, $chuKy, $uuDiem], ';');
        }

        fclose($file);
    }, $filename, [
        'Content-Type' => 'text/csv; charset=UTF-8',
    ]);
}
public function xuatFileThongKe()
{
    $ngayList = DB::table('user_package')
        ->selectRaw('DATE(registered_at) as ngay')
        ->union(
            DB::table('users')
                ->selectRaw('DATE(created_at) as ngay')
        )
        ->distinct()
        ->orderBy('ngay', 'asc');

    $stats = DB::table(DB::raw("({$ngayList->toSql()}) as d"))
        ->mergeBindings($ngayList)
        ->select(
            'd.ngay',
            DB::raw('(SELECT COUNT(*) 
                      FROM user_package up 
                      WHERE DATE(up.registered_at) = d.ngay) as so_dang_ky'),
            DB::raw('(SELECT SUM(gc.cuoc_phi + 
                                CASE WHEN up.sim IS NOT NULL THEN 50000 ELSE 0 END) 
                      FROM user_package up 
                      JOIN goi_cuoc gc ON up.goi_cuoc_id = gc.id 
                      WHERE DATE(up.registered_at) = d.ngay) as doanh_thu'),
            DB::raw('(SELECT gc2.ten_goi
                      FROM goi_cuoc gc2
                      JOIN user_package up2 ON gc2.id = up2.goi_cuoc_id
                      WHERE DATE(up2.registered_at) = d.ngay
                      GROUP BY gc2.id, gc2.ten_goi
                      ORDER BY COUNT(*) DESC
                      LIMIT 1) as goi_hot')
        )
        ->get();

    $tongDonHang = DB::table('user_package')->count();

    $tongDoanhThu = DB::table('user_package')
        ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
        ->where('user_package.status', 'Hoàn thành') 
        ->sum(DB::raw('goi_cuoc.cuoc_phi + CASE WHEN user_package.sim IS NOT NULL THEN 50000 ELSE 0 END'));

    $goiHotTong = DB::table('goi_cuoc')
        ->join('user_package', 'goi_cuoc.id', '=', 'user_package.goi_cuoc_id')
        ->select('ten_goi', DB::raw('COUNT(*) as total'))
        ->groupBy('goi_cuoc.id', 'ten_goi')
        ->orderByDesc('total')
        ->first();

    $filename = "thongke_" . date('Y-m-d_H-i-s') . ".csv";

    return response()->streamDownload(function() use ($stats, $tongDonHang, $tongDoanhThu, $goiHotTong) {
        $file = fopen('php://output', 'w');
        fwrite($file, "\xEF\xBB\xBF");

        // Tiêu đề cột
        fputcsv($file, ['Ngày', 'Số ĐK gói', 'Doanh thu (VNĐ)', 'Gói hot nhất'], ';');

        foreach ($stats as $row) {
            if (($row->doanh_thu ?? 0) == 0) {
                continue; // Bỏ qua ngày có doanh thu = 0
            }
            fputcsv($file, [
                $row->ngay,
                $row->so_dang_ky,
                number_format($row->doanh_thu ?? 0, 0, ',', '.'),
                $row->goi_hot
            ], ';');
        }

        fputcsv($file, [], ';');

        fputcsv($file, [
            'Tổng cộng',
            $tongDonHang,
            number_format($tongDoanhThu, 0, ',', '.'),
            $goiHotTong->ten_goi ?? ''
        ], ';');

        fclose($file);
    }, $filename, [
        'Content-Type' => 'text/csv; charset=UTF-8',
    ]);
}

//     public function dangKyGoi(Request $request, $id)
// {
//     $request->validate([
//         'ho_ten' => 'required|string|max:255',
//         'so_dien_thoai' => 'required|string|max:20',
//         'cmnd' => 'required|string|max:20',
//         'dia_chi' => 'required|string|max:255',
//         // 'yeu_cau' không bắt buộc
//     ]);

//     $dangKy = new DangKyGoi();
//     $dangKy->goi_id = $id;
//     $dangKy->ho_ten = $request->ho_ten;
//     $dangKy->so_dien_thoai = $request->so_dien_thoai;
//     $dangKy->cmnd = $request->cmnd;
//     $dangKy->dia_chi = $request->dia_chi;
//     $dangKy->note = $request->note ? $request->note : 'Không có yêu cầu';
//     $dangKy->save();

//     return redirect()->back()->with('success', 'Đăng ký gói cước thành công!');
// }

public function searchUser(Request $request)
{
    $tenGoi = $request->input('ten_goi');

    $goi = GoiCuoc::where('ma_goi', 'like', "%{$tenGoi}%")->get();

    if ($goi->isNotEmpty()) {
        return view('auth.timKiem', compact('goi'));
    } else {
        return redirect()->back()->with('error', 'Không tìm thấy gói cước chứa: ' . $tenGoi);
    }
}


public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|string|max:255',
            'cmnd_cccd'      => 'required|string|max:20',
            'dia_chi'        => 'required|string|max:255',
            'sim'           => 'nullable|string',
        ]);

        // Lưu dữ liệu
        UserPackage::create([
            'goi_cuoc_id'    => $request->goi_cuoc_id,
            'customer_name'  => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'cmnd_cccd'      => $request->cmnd_cccd,
            'dia_chi'        => $request->dia_chi,
            'sim'           => $request->sim,
            'status'         => 'Chờ xử lý',
            'registered_at'  => now(),
        ]);

        return redirect()->back()->with('success', 'Đăng ký gói cước thành công! vui lòng chờ xử lý');
    }
}

?>