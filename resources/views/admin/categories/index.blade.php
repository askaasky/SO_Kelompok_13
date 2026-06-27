@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/admin-crud.css') }}">
@endpush

@section('content')

<h1 class="page-title">
    Kelola Kategori Barang
</h1>

<div class="table-card">

    <div class="table-header">

        <h2>Daftar Kategori Barang</h2>

        <a
            href="{{ route('admin.categories.create') }}"
            class="btn-add"
        >
            + Tambah Kategori Barang
        </a>

    </div>

    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>Nama LOkasi</th>

                <th width="180">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($categories as $location)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $location->name }}
                </td>

                <td class="action-column">

                    <a
                        href="{{ route('admin.categories.edit',$location) }}"
                        class="btn-edit"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('admin.categories.destroy',$location) }}"
                        method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('Hapus kategori ini?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn-delete"
                        >
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td
                    colspan="3"
                    class="empty-text"
                >
                    Belum ada kategori barang
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection