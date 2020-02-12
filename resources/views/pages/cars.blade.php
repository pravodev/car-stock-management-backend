@extends('template.app')
@section('title', 'List Mobil')
@section('content')
<div class="container content">
    <div class="text-right">
        <button class="btn btn-primary">Tambah Mobil</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('footer')
<script>
    jQuery(document).ready(function(){
        
    })
</script>
@endpush