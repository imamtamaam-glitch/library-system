<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
        {
            $validated = $request->validate([
                'name'    => 'required|string|max:255',
                'phone'   => 'required|string|max:20',
                'address' => 'required|string',
            ], [
                'name.required'    => 'Nama anggota wajib diisi.',
                'phone.required'   => 'Nomor telepon wajib diisi.',
                'address.required' => 'Alamat wajib diisi.',
            ]);

            // Generate kode otomatis berdasarkan ID terakhir (AGT-001, AGT-002, dst.)
            $nextNumber = (Member::max('id') ?? 0) + 1;
            $validated['member_code'] = 'AGT-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

            Member::create($validated);

            return redirect()
                ->route('members.index')
                ->with('success', 'Data anggota berhasil ditambahkan dengan kode ' . $validated['member_code']);
        }
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'member_code' => 'required|string|max:50|unique:members,member_code,' . $member->id,
            'name'        => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'address'     => 'required|string',
        ]);

        $member->update($validated);

        return redirect()
            ->route('members.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()
            ->route('members.index')
            ->with('success', 'Data anggota berhasil dihapus.');
    }
}