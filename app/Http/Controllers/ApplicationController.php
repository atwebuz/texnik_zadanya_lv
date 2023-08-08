<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
 
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs(
                'files',
                $name,
                'public',
            );
        }
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'file' => 'file|mimes:jpg,png,pdf,docx',
        ]);

        $application = Application::create([
            'user_id' => auth()->user()->id,
            'subject' => $request->subject,
            'message' => $request->message,
            'file_url' => $path ?? null
        ]);

        return redirect('dashboard');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
