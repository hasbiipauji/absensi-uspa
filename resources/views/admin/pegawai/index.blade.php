@extends('template_backend.master')
@section('sub-judul', 'Pegawai')
@section('title', 'Pegawai')


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success col-sm-4" role="alert">
        {{ Session('success') }}
    </div>
@endif

    <a class="btn btn-primary" style="float: right" href="{{ route('pdf') }}">Export to PDF</a>

    @if (auth()->user()->role=="admin")
        <a href="{{ route('pegawai.create') }}" class="btn btn-info btn-sm">Tambah Pegawai</a>
        <br>
        <br>
    @else
    @endif

    <table class="table table-striped table-hover table-sm table-bordered shadow p-3 mb-5 bg-white rounded"
    style="width: 100% ; max-width:100%; white-space:nowrap;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Email</th>
                <th>Jabatan</th>
                @if(auth()->user()->role == "admin")

                    <th>Absensi</th>
                    <th>Action</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @foreach($pegawai as $result => $hasil)
                <tr>
                    {{-- ini untuk menampilkan nomor --}}
                    <td>{{ $result + $pegawai->firstitem() }}</td>
                    {{-- end --}}

                    <td>{{ $hasil->name }}</td>
                    <td>{{ $hasil->email }}</td>
                    <td>{{ $hasil->jabatan }}</td>
                    @if( auth()->user()->role == "admin")
                        <td>
                            <a class="btn-sm btn button-primary"
                                href="{{ route('pegawai.show',$hasil->id) }}">Lihat</a>
                        </td>
                        <td>
                            <a href="{{ route('pegawai.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <a href="#" data-id="{{ $hasil->id }}" class="btn btn-danger btn-sm swal-confirm">
                                <form action="{{ route('pegawai.destroy', $hasil->id) }}" method="post" id="delete{{ $hasil->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                Delete
                            </a>
                        </td>
                    @else
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

{{ $pegawai->links() }}

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


