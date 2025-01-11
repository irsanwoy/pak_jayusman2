<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\TransactionDetail;
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
    // $kasir1Transactions = Transaction::where('employee_id', 1)->count();
    // $kasir2Transactions = Transaction::where('employee_id', 2)->count();
    
    // Ambil data produk dan stok
    // $products = Product::all(); // Sesuaikan dengan query yang diperlukan
    
    // Kirim data ke view
    // return view('dashboard.supervisor', compact('kasir1Transactions', 'kasir2Transactions', 'products'));


    // Performance per kasir
    $teamPerformance = Transaction::select('employee_id', DB::raw('COUNT(*) as transaction_count'))
        ->groupBy('employee_id')
        ->with('employee') // Relasi ke Employee
        ->get();

    // Produk dengan stok rendah atau habis
    $stockAlerts = Product::where('stock', '<=', 10)->get();

    return view('dashboard.supervisor', compact('teamPerformance', 'stockAlerts'));


    }

    public function manajer()
    {
        $pendapatanHariIni = Transaction::whereDate('date', today())->sum('total');
        $pendapatanMingguIni = Transaction::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->sum('total');
        $pendapatanBulanIni = Transaction::whereMonth('date', now()->month)->whereYear('date', now()->year)->sum('total');
    
        $produkTerlaris = TransactionDetail::select('product_id', DB::raw('SUM(quantity) as total_terjual'))
            ->groupBy('product_id')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->with('product') // Relasi ke tabel `products`
            ->get();
    
        $kinerjaTim = Transaction::select('employee_id', DB::raw('COUNT(*) as jumlah_transaksi'), DB::raw('SUM(total) as total_pendapatan'))
            ->groupBy('employee_id')
            ->with('employee') // Relasi ke tabel `employees`
            ->get();
    
        return view('dashboard.manajer', compact(
            'pendapatanHariIni',
            'pendapatanMingguIni',
            'pendapatanBulanIni',
            'produkTerlaris',
            'kinerjaTim'
        ));
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
