<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Jobs\SendEmailJob;
use App\Mail\ApplicationCreated;
use App\Models\Application;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

    public function store(StorePostRequest $request)
    {

        if (!$this->canCreateApplication()) {
            return redirect()->back()->with('error', 'You can create only 1 application per day');
        }


        if($request->hasFile('file')){
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs(
                'files',
                $name,
                'public',
            );
        }

        $application = Application::create([
            'user_id' => auth()->user()->id,
            'subject' => $request->subject,
            'message' => $request->message,
            'file_url' => $path ?? null
        ]);

        dispatch(new SendEmailJob($application));

  
        return redirect('dashboard');
    }

 
    protected function canCreateApplication()
    {
        $last_application = auth()->user()->applications()->latest()->first();

        if (!$last_application) {
            return true; // No previous application found, user can create one
        }

        $last_app_date = Carbon::parse($last_application->created_at)->format('Y-m-d');
        $today = Carbon::now()->format('Y-m-d');

        return $last_app_date !== $today;
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
