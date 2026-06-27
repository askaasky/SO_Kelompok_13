@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/admin-crud.css') }}">
@endpush

@section('content')

<h1 class="page-title">
    Kelola Lokasi
</h1>

<div class="table-card">

    <div class="table-header">

        <h2>Daftar Lokasi</h2>

        <a
            href="{{ route('admin.locations.create') }}"
            class="btn-add"
        >
            + Tambah Lokasi
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

            @forelse($locations as $location)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $location->name }}
                </td>

                <td class="action-column">

                    <a
                        href="{{ route('admin.locations.edit',$location) }}"
                        class="btn-edit"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('admin.locations.destroy',$location) }}"
                        method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('Hapus lokasi ini?')"
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
                    Belum ada lokasi barang hiilang
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection