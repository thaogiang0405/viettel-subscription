<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserPackage;

class UserPackageController extends Controller
{
    // public function showHistory()
    // {
    //     $userId = Auth::id(); // đã là ID số

    //     $histories = UserPackage::with('package')
    //         ->where('user_id', $userId)
    //         ->latest('registered_at')
    //         ->get();

    //     return view('auth.history', compact('histories'));
    // }

    // public function cancel($id)
    // {
    //     $userPackage = UserPackage::findOrFail($id);
    //     $userPackage->status = 'Đã hủy'; // hoặc 'Đã hết hạn'
    //     $userPackage->save();

    //     return redirect()->back()->with('success', 'Gói cước đã được hủy thành công.');
    // }

}
