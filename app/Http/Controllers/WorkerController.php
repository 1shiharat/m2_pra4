<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::all();
        return view('workers.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:workers,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            // パスワードのハッシュ化
            $validated['password'] = bcrypt($validated['password']);

            Worker::create($validated);

            return redirect()->route('workers.index')->with('success', '人材が登録されました。');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['message' => '登録処理中にエラーが発生しました。もう一度お試しください。']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        return view('workers.edit', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:workers,email,' . $worker->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // // パスワードのハッシュ化（パスワードが更新された場合のみ）
        // if ($request->filled('password')) {
        //     $validated['password'] = bcrypt($request->password);
        // } else {
        //     unset($validated['password']);
        // }

        $worker->update($validated);

        return redirect()->route('workers.index')->with('success', '人材情報が更新されました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index')->with('success', '人材が削除されました。');
    }
}
