<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        // Cek apakah ada input pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            // Filter branches berdasarkan nama atau kota
            $branches = Branch::where('branch_name', 'like', '%' . $search . '%')
                ->orWhere('city', 'like', '%' . $search . '%')
                ->paginate(5); // Pagination 5 item per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua branches dengan pagination
            $branches = Branch::paginate(5);
        }

        // Input pencarian untuk ditampilkan di view
        $searchQuery = $request->input('search', '');

        return view('branches.index', compact('branches', 'searchQuery'));
    }

    public function create()
    {
        return view('branches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
        ]);

        Branch::create($validated);

        return redirect()->route('branch.index')->with('success', 'Branch created successfully!');
    }

    public function edit(Branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $validated = $request->validate([
            'branch_name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
        ]);

        $branch->update($validated);

        return redirect()->route('branch.index')->with('success', 'Branch updated successfully!');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branch.index')->with('success', 'Branch deleted successfully!');
    }
}
