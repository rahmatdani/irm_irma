<!-- resources/views/penetapan_konteks/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Penetapan Konteks')

@section('content')
    <div class="container">
        <h1>Penetapan Konteks</h1>
        <form action="{{ route('penetapan_konteks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="sasaran_strategis">Sasaran Strategis</label>
                <select name="sasaran_strategis" id="sasaran_strategis" class="form-control">
                    <option value="">-- Pilih Sasaran Strategis --</option>
                    @foreach($sasaranStrategis as $sasaran)
                        <option value="{{ $sasaran->id }}">{{ $sasaran->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="inisiatif_strategis">Inisiatif Strategis</label>
                <select name="inisiatif_strategis" id="inisiatif_strategis" class="form-control">
                    <option value="">-- Pilih Inisiatif Strategis --</option>
                    @foreach($inisiatifStrategis as $inisiatif)
                        <option value="{{ $inisiatif->id }}">{{ $inisiatif->nama }}</option>
                    @endforeach
                </select>
            </div>

            {{-- <div class="form-group">
                <label for="sasaran_operasional">Sasaran Operasional</label>
                <select name="sasaran_operasional" id="sasaran_operasional" class="form-control">
                    <option value="">-- Pilih Sasaran Operasional --</option>
                    @foreach($sasaranOperasional as $operasional)
                    <option value="{{ $operasional->id }}">{{ $operasional->nama }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="form-group">
                <label for="deskripsi_risiko">Deskripsi Risiko</label>
                <textarea name="deskripsi_risiko" id="deskripsi_risiko" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection