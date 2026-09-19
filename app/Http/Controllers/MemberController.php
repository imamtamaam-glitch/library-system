<?php
namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            ['idMember' => 1, 'nama' => 'Jundi', 'Kota' => 'Cikarang'],
            ['idMember' => 2, 'nama' => 'Suparno', 'Kota' => 'Karawang'],
            ['idMember' => 3, 'nama' => 'Brando', 'Kota' => 'Bogor'],
            ['idMember' => 4, 'nama' => 'Aleks', 'Kota' => 'Jakarta'],
            ['idMember' => 5, 'nama' => 'Firman', 'Kota' => 'Bandung']
        ];
        
        return view('members.index', compact('members'));
    }
}