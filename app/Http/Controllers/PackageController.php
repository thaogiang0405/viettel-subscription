<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
//     public function show($id)
//     {
//         $package = Package::findOrFail($id);
//         $otherPackage = Package::where('id', '!=', $id)->take(3)->get();
//         return view('auth.DetailPackage', compact('package','otherPackage'));
//     }

    public function registerPackage($packageId)
    {
        $userId = Auth::id();
        // $userId = Auth::id() ?? session('user_id');

        $package = Package::findOrFail($packageId);
        $now = Carbon::now();
        $endDate = $now->copy()->addDays((int) $package->duration);


        DB::table('user_package')->insert([
            'user_id' => $userId,
            'package_id' => $package->id,
            'registered_at' => $now,
            'status' => 'Đang hoạt động',
            'note' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return redirect()->back()->with('success', 'Đăng ký thành công!');
    }

//     public function updateExpiredPackages()
//     {
//         $now = Carbon::now();

//         DB::table('user_package')
//             ->join('packages', 'user_package.package_id', '=', 'packages.id')
//             ->whereRaw("DATE_ADD(user_package.registered_at, INTERVAL packages.duration DAY) < ?", [$now])
//             ->where('user_package.status', 'Đang hoạt động')
//             ->update(['user_package.status' => 'Hết hạn']);
//     }

    public function traTruoc(){
        return view('auth.traTruoc');
    }

    public function traSau(){
        return view('auth.traSau');
    }


//      public function filter(Request $request)
// {
//     $type = $request->query('type');

//     if ($type === 'day') {
//         $dataPackages = Package::where('type', 'data')->where('duration', '<=', 7)->paginate(4);
//         $callPackages = Package::where('type', 'call')->where('duration', '<=', 7)->paginate(8);
//     } elseif ($type === 'month') {
//         $dataPackages = Package::where('type', 'data')->where('duration', '>', 7)->paginate(8);
//         $callPackages = Package::where('type', 'call')->where('duration', '>', 7)->paginate(4);
//     } else {
//         $dataPackages = Package::where('type', 'data')->paginate(8);
//         $callPackages = Package::where('type', 'call')->paginate(4);
//     }

//     return view('auth.dashboard', compact('dataPackages', 'callPackages', 'type'));
// }


    
//     public function cancel($id)
//     {
//         $record = DB::table('user_package')->where('id', $id)->first();

//         if (!$record || $record->user_id != Auth::id()) {
//             abort(403);
//         }

//         DB::table('user_package')
//             ->where('id', $id)
//             ->update(['status' => 'Đã hủy', 'updated_at' => now()]);

//         return redirect()->route('history')->with('success', 'Hủy gói thành công.');
//     }


}
?>
