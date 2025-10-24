<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-700">📚 Daftar Buku dan Penulis</h1>

        <table class="w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-3 text-left">#</th>
                    <th class="py-2 px-3 text-left">Judul Buku</th>
                    <th class="py-2 px-3 text-left">Penulis</th>
                    <th class="py-2 px-3 text-left">Tahun Terbit</th>
                    <th class="py-2 px-3 text-left">Genre</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-3">{{ $loop->iteration }}</td>
                    <td class="py-2 px-3 font-semibold text-blue-700">{{ $book->title }}</td>
                    <td class="py-2 px-3">{{ $book->author->name ?? '-' }}</td>
                    <td class="py-2 px-3">{{ $book->publication_year }}</td>
                    <td class="py-2 px-3">{{ $book->genre ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
