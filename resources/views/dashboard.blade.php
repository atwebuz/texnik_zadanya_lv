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
                    @if(auth()->user()->role->name == 'manager' )

                    {{ __("Manager") }}

                    <!-- This is an example component -->
                    <div class='flex items-center justify-center p-4 mt-4'>
                        <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                            <div class="flex w-full items-center justify-between border-b pb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]">
                                    </div>
                                    <div class="text-lg font-bold text-slate-700">Joe Smith</div>
                                </div>
                                <div class="flex items-center space-x-8">
                                    <button
                                        class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">id: 2</button>
                                    <div class="text-xs text-neutral-500">  </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-6">
                                <div class="mb-3 text-xl font-bold">Nulla sed leo tempus, feugiat velit vel, rhoncus
                                    neque?</div>
                                <div class="text-sm text-neutral-600">Aliquam a tristique sapien, nec bibendum urna.
                                    Maecenas convallis dignissim turpis, non suscipit mauris interdum at. Morbi sed
                                    gravida nisl, a pharetra nulla. Etiam tincidunt turpis leo, ut mollis ipsum
                                    consectetur quis. Etiam faucibus est risus, ac condimentum mauris consequat nec.
                                    Curabitur eget feugiat massa</div>
                            </div>

                            <p>
                               email@email.com
                            </p>
                        </div>
                    </div>

                    

                    @else

                    {{ __("Clent") }}

                    <div class='flex items-center justify-center '>
                        <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                            <div class='max-w-md mx-auto space-y-6'>
                
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h2 class="text-2xl font-bold ">Submit your application</h2>
                                    <hr class="my-6">
                                    <label class="uppercase text-sm font-bold opacity-70">Subject</label>
                                    <input type="text" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                         
                                    <hr class="my-6">
                                    <label class="uppercase text-sm font-bold opacity-70">Text Area</label>
                                    <textarea name="" id="" cols="30" rows="10" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>
                                

                                    <label class="uppercase text-sm font-bold opacity-70">File Upload</label>
                                    <input type="file" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">

                                    
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