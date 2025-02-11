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
     
        $totalUsers = User::count();
        $totalTransactions = Transaction::sum('total');
        $totalProducts = Product::count();
        return view('dashboard.admin', compact(
            'totalUsers',
            'totalTransactions',
            'totalProducts',
        ));

      
    }

    public function kasir()
    {
       
        $products = Product::all(); 
    
   
    return view('dashboard.kasir', compact('products'));
    }

<<<<<<< HEAD
=======
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
>>>>>>> 46c42614a99f602985da2840c0f462ebc13d58c6

    public function manajer()
    {
        $pendapatanHariIni = Transaction::whereDate('date', today())->sum('total');
        $pendapatanMingguIni = Transaction::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->sum('total');
        $pendapatanBulanIni = Transaction::whereMonth('date', now()->month)->whereYear('date', now()->year)->sum('total');
    
        $produkTerlaris = TransactionDetail::select('product_id', DB::raw('SUM(quantity) as total_terjual'))
            ->groupBy('product_id')
            ->orderByDesc('total_terjual')
            ->take(5)
            ->with('product') 
            ->get();
    
        $kinerjaTim = Transaction::select('employee_id', DB::raw('COUNT(*) as jumlah_transaksi'), DB::raw('SUM(total) as total_pendapatan'))
            ->groupBy('employee_id')
            ->with('employee') 
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
        

        $products = Product::all(); 

  
        return view('dashboard.gudang', compact('products'));
    }
    public function supervisor()
    {
        

    $teamPerformance = Transaction::select('employee_id', DB::raw('COUNT(*) as transaction_count'))
        ->groupBy('employee_id')
        ->with('employee') 
        ->get();

    $stockAlerts = Product::where('stock', '<=', 10)->get();

    return view('dashboard.supervisor', compact('teamPerformance', 'stockAlerts'));


    }
}
