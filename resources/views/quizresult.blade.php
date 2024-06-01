@extends('master')

@section('content')
    <div class="modal fade" id="waiting-quiz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="waiting-quiz" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hasil Ujian Teori</h1>
                </div>
                <div class="modal-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif (session('fail'))
                        <div class="alert alert-danger">
                            {{ session('fail') }}
                        </div>
                    @endif
                    <p class="card-text">Skor Anda: {{ $score }} dari {{ $totalQuestions }} pertanyaan</p>
                    <p class="card-text">Persentase: {{ round($percentageScore, 2) }}%</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><a href="{{ url('home') }}" class="text-white">Kembali</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('waiting-quiz'));
            myModal.show();
        });
    </script>
@endsection
{{--
@extends('master')

@section('content')
    <div class="modal fade" id="waiting-quiz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="waiting-quiz" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Skor: {{ $percentageScore }}%</h1>
                </div>
                <div class="modal-body">
                    @if (session('success'))
                        {{ session('success') }}
                    @elseif (session('fail'))
                        {{ session('fail') }}
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><a href="{{ url('home') }}" class="text-white">Kembali</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('waiting-quiz'));
            myModal.show();
        });
    </script>
@endsection
 --}}
