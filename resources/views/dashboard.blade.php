<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session()->has('error'))
                     <div class="w-full mb-2 select-none border-l-4 border-blue-400 bg-blue-100 p-4 font-medium hover:border-blue-500">{{session()->get('error')}}</div>
                     @endif

                    @if(auth()->user()->role->name == 'manager' )

                    {{ __("Manager") }}
                    @foreach($applications as $application)
                        <div class='flex items-center justify-center p-4 mt-4'>
                            <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                                <div class="flex w-full items-center justify-between border-b pb-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]">
                                        </div>
                                        <div class="text-lg font-bold text-slate-700">{{$application->user->name}}</div>
                                    </div>
                                    <div class="flex items-center space-x-8">
                                        <button
                                            class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">id: {{$application->id}}</button>
                                        <div class="text-xs text-neutral-500">  </div>
                                    </div>
                                </div>

                                <div class="mt-4 mb-6 flex justify-between">
                                    <div>
                                        <div class="mb-3 text-xl font-bold">                                       
                                              {{$application->subject}}
                                        </div>
                                        <div class="text-sm text-neutral-600">                                   
                                             {{$application->message}}
                                        </div>
                                    </div>

                                    <div class="border p-6 rounded hover:bg-gray-100 transition cursor-pointer">
                                   @if(is_null($application->file_url) )
                                        <p target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                              </svg>                                                
                                          </p>
    
                                    @else

                                    <a href="{{ asset('storage/'.$application->file_url) }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                          </svg>
                                          
                                      </a>
                                    @endif
                                        
                                    </div>
                                </div>

                                <div class="box flex justify-between">
                                 <p>
                                    {{$application->user->email}}
                                </p>

                                <p>
                                   {{$application->created_at}}
                                </p>
                                </div>
                               
                            </div>
                        </div>
                    @endforeach

                    {{$applications->links()}}
                    
                

                    @else

                    {{ __("Clent") }}

                    <div class='flex items-center justify-center '>
                        <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                            <div class='max-w-md mx-auto space-y-6'>
                
                                <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h2 class="text-2xl font-bold ">Submit your application</h2>
                                    <hr class="my-6">
                                    <label class="uppercase text-sm font-bold opacity-70">Subject</label>
                                    <input required name="subject" type="text" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                         
                                    <hr class="my-6">
                                    <label class="uppercase text-sm font-bold opacity-70">Text Area</label>
                                    <textarea required name="message" id="" cols="30" rows="10" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>
                                

                                    <label class="uppercase text-sm font-bold opacity-70">File Upload</label>
                                    <input name="file" type="file" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">

                                    
                                    <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="Send">
                                </form>
                
                            </div>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>