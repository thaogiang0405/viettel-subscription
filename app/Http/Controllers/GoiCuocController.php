<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\GoiCuoc;
use App\Models\Sim;
use Carbon\Carbon;
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

    public function registerPackage($packageId)
    {
        $userId = Auth::id();
        $now = now();

        $package = GoiCuoc::findOrFail($packageId);

        DB::table('user_package')->insert([
            'user_id' => $userId,
            'goi_cuoc_id' => $package->id,
            'registered_at' => $now,
            'status' => 'Đang hoạt động',
            'note' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('success', 'Đăng ký thành công!');
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
        $goiCuoc = GoiCuoc::where('danh_muc', 'tra_truoc')->get();
        return view('auth.traTruoc', compact('goiCuoc'));
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

    public function listGoiCuoc()
    {
        $user = Auth::user();
        $goiCuoc = GoiCuoc::all();
        return view('admin.goiCuoc', compact('user', 'goiCuoc'));
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

public function updateSimNote(Request $request, $id)
{
    $request->validate([
        'sim' => 'required|string|max:50',
        'note' => 'required|string'
    ]);

    $updated = DB::table('user_package')
        ->where('id', $id)
        ->update([
            'sim' => $request->sim,
            'note' => $request->note
        ]);

    if ($updated) {
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false]);
}



public function list_tra_truoc()
{
    $user = Auth::user();

    // Join bảng user_package với users và goi_cuoc, lọc danh mục trả trước (tra_truoc)
    $dangKyTraTruoc = DB::table('user_package')
        ->join('users', 'user_package.user_id', '=', 'users.id')
        ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
        ->where('goi_cuoc.danh_muc', 'tra_truoc')
        ->select(
            'user_package.id',
            'users.name',
            'users.email',
            'users.phone',
            'goi_cuoc.ten_goi',
            'user_package.sim',
            'user_package.note'
        )
        ->get();

    return view('admin.traTruoc', compact('user', 'dangKyTraTruoc'));
}

    public function list_tra_sau()
    {
        $user = Auth::user();

         $dangKyTraSau = DB::table('user_package')
        ->join('users', 'user_package.user_id', '=', 'users.id')
        ->join('goi_cuoc', 'user_package.goi_cuoc_id', '=', 'goi_cuoc.id')
        ->where('goi_cuoc.danh_muc', 'tra_sau')
        ->select(
            'user_package.id',
            'users.name',
            'users.email',
            'users.phone',
            'goi_cuoc.ten_goi',
            'goi_cuoc.cuoc_phi',
            'goi_cuoc.chu_ky'
        )
        ->get();

    return view('admin.traSau', compact('user', 'dangKyTraSau'));

    }

}


?>