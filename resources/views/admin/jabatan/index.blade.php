@extends('template_backend.master')
@section('sub-judul', 'Jabatan')
@section('title', 'Jabatan')


@section('content')

<a href="{{ route('jabatan.create') }}" class="btn btn-info btn-sm">Tambah Jabatan</a>
<br>
<br>

<table class="table table-striped table-hover table-sm table-bordered shadow p-3 mb-5 bg-white rounded">
    <thead>
        <tr>
            <th>No</th>
            <th>Jabatan</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($jabatan as $result => $hasil)
        <tr>
            {{-- ini untuk menampilkan nomor --}}
            <td>{{ $result + $jabatan->firstitem() }}</td>
            {{-- end --}}
            <td>{{ $hasil->jabatan }}</td>
            <td>
                <a href="{{ route('jabatan.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>

                <a href="#" data-id="{{ $hasil->id }}" class="btn btn-danger btn-sm swal-confirm">
                    <form action="{{ route('jabatan.destroy', $hasil->id) }}" id="delete{{ $hasil->id }}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                    Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $jabatan->links() }}

@endsection

@push('page-scripts')
<script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush



@push('after-script')
<script>
$(".swal-confirm").click(function(e) {
    id = e.target.dataset.id;
    swal({
        title: 'Yakin hapus data ini?',
        text: 'Data yang dihapus tidak dapat dikembalikan',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            swal('Data berhasil dihapus', {
            icon: 'success',
            });
            $(`#delete${id}`).submit();
        } else {
        // swal('Your imaginary file is safe!');
        }
      });
  });
</script>
@endpush
