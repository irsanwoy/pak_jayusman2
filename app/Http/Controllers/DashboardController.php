<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin()
    {
        
        // Data untuk dashboard admin
        // $totalUsers = User::count();
        // $newUsersToday = User::whereDate('created_at', now()->toDateString())->count();
        // $totalTransactions = Transaction::sum('amount');
        // $transactionGrowth = DB::table('transactions')
        //                         ->whereBetween('created_at', [now()->startOfWeek(), now()])
        //                         ->count();
        // $totalProducts = Product::count();
        // $newProducts = Product::whereDate('created_at', now()->toDateString())->count();

        // return view('dashboard.admin', compact(
        //     'totalUsers',
        //     'newUsersToday',
        //     'totalTransactions',
        //     'transactionGrowth',
        //     'totalProducts',
        //     'newProducts'
        // ));
        $totalUsers = User::count();
        $totalTransactions = Transaction::sum('total');
        $totalProducts = Product::count();
        return view('dashboard.admin', compact(
            'totalUsers',
            'totalTransactions',
            'totalProducts',
        ));

        // ini yang masih pake data dummy
        // return view('dashboard.admin');
    }

    public function kasir()
    {
        //ini yang normal 
        // return view('dashboard.kasir'); 

        // Ambil data produk dari database
        $products = Product::all(); // Sesuaikan dengan model dan query yang Anda butuhkan
    
    // Kirim data ke view
    return view('dashboard.kasir', compact('products'));
    }

    public function supervisor()
    {
        // ini yang masin data dummy
        // return view('dashboard.supervisor'); 

        // Ambil jumlah transaksi per kasir (asumsi ada kolom kasir_id di tabel transaksi)
    $kasir1Transactions = Transaction::where('employee_id', 1)->count();
    $kasir2Transactions = Transaction::where('employee_id', 2)->count();
    
    // Ambil data produk dan stok
    $products = Product::all(); // Sesuaikan dengan query yang diperlukan
    
    // Kirim data ke view
    return view('dashboard.supervisor', compact('kasir1Transactions', 'kasir2Transactions', 'products'));
    }

    public function manajer()
    {
        // ini yang masin data dummy
        return view('dashboard.manajer'); 

        // menggunakan data di database
        // $todayRevenue = Transaction::whereDate('created_at', today())->sum('total');

        // // Pendapatan Minggu Ini
        // $weekRevenue = Transaction::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->sum('total');

        // // Pendapatan Bulan Ini
        // $monthRevenue = Transaction::whereMonth('created_at', now()->month)->sum('total');

        // // Produk Terlaris
        // $topProducts = Product::withCount('transactions') 
        //                     ->orderByDesc('transactions_count')
        //                     ->limit(5)
        //                     ->get();

        // // Kinerja Tim Kasir (total transaksi dan pendapatan per kasir)
        // $kasirPerformance = Transaction::select('id', DB::raw('count(*) as transaction_count'), DB::raw('sum(total) as total_revenue'))
        //                             ->groupBy('id')
        //                             ->get();

        // // Kirim data ke view
        // return view('dashboard.store-manager', compact('todayRevenue', 'weekRevenue', 'monthRevenue', 'topProducts', 'kasirPerformance'));
    }

    public function gudang()
    {
        // ini yang normal
        // return view('dashboard.gudang'); 

        $products = Product::all(); // Atau bisa menggunakan query lainnya sesuai kebutuhan

    // Kirim data produk ke view
        return view('dashboard.gudang', compact('products'));
    }
}
