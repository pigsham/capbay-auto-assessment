<!-- resources/views/layouts/navigation.blade.php -->
<nav class="bg-gray-800 p-4">
    <div class="flex justify-between items-center max-w-7xl mx-auto">
        <div class="text-white text-xl">CapBay Auto Admin</div>
        <div>
            <a href="{{ route('admin.cars.index') }}" class="text-white hover:bg-gray-700 px-4 py-2 rounded-md">Cars</a>
            <a href="{{ route('admin.dashboard') }}" class="text-white hover:bg-gray-700 px-4 py-2 rounded-md">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="text-white hover:bg-gray-700 px-4 py-2 rounded-md">Logout</button>
            </form>
        </div>
    </div>
</nav>