<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Account = Account::all();
        return view('account.index', compact('Account'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'username' => 'required',
            'password' => 'required|size:9',
            'role' => 'required'
        ]);
        $account = new Account;
        $account->name = $request->name;
        $account->gender = $request->gender;
        $account->username = $request->username;
        $account->password = $request->password;
        $account->role = $request->role;
        $account ->save();

        // Account::created($request->all()); 

        return redirect('/account')->with('status', 'Data Akun Berhasil Ditambahkan!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return view('account.show', compact('account')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        return view('account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        
        // $request->validate([
        //     'name' => 'required',
        //     'gender' => 'required',
        //     'username' => 'required',
        //     'password' => 'required|size:9',
        //     'role' => 'required'
        // ]);
        
        $account->update([
                    'name' => $request->name,
                    'gender' => $request->gender,
                    'username' => $request->username,
                    'role' => $request->role,
                ]);
        return redirect('/account')->with('status','Data Berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        Account::destroy($account->id);

        return redirect('account')->with('status', 'Data berhasil dihapus!!');
    }
}
