<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <!-- Table -->
<div class="min-w-full">
  <div class="overflow-x-auto [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb">
  <a href="{{ route('user.create') }}">TAMBAH DOSEN</a>
    <table class="min-w-full divide-y divide-table-line">
      <thead>
        <tr>
            <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">#</th>
          <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">Username</th>
          <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">Fullname</th>
          <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">Email</th>
          <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">Program Studi</th>
          <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-muted-foreground-1 uppercase">Action</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-table-line">
      @foreach($users as $user)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground">{{ ($users->perPage() * ($users->currentPage()-1))+$loop->iteration }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground">{{ $user->username }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $user->fullname }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $user->email }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">{{ $user->department->name }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
            <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg text-primary hover:text-primary-hover focus:outline-hidden focus:text-primary-focus disabled:opacity-50 disabled:pointer-events-none">Delete</button>
          </td>
        </tr>
    @endforeach
       
      </tbody>
    </table>
    {{ $users->links() }}
  </div>
</div>
<!-- End Table -->


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
