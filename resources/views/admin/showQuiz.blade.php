@extends('admin.adminmaster')

@section('content')
<div>
<button type="button" class="btn btn-success"><a href="{{route('createQuiz')}}">Tambah Quiz</a></button>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ $tab == 'SIM-A' ? 'active' : '' }}" id="home-tab" href="{{ route('show.quiz', ['tab' => 'SIM-A']) }}" role="tab" aria-controls="home-tab-pane" aria-selected="{{ $tab == 'SIM-A' ? 'true' : 'false' }}">SIM A</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ $tab == 'SIM-C' ? 'active' : '' }}" id="profile-tab" href="{{ route('show.quiz', ['tab' => 'SIM-C']) }}" role="tab" aria-controls="profile-tab-pane" aria-selected="{{ $tab == 'SIM-C' ? 'true' : 'false' }}">SIM C</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    {{-- SIM A --}}
    <div class="tab-pane fade {{ $tab == 'SIM-A' ? 'show active' : '' }}" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <table class="table">
            <tbody>
                @foreach ($quizes as $key => $quiz)
              <tr>
                  <td>
                    <p>{{$key+1}}. {{$quiz->questions}}</p>
                    <p>A. {{$quiz->opsiA}}</p>
                    <p>B. {{$quiz->opsiB}}</p>
                    <p>C. {{$quiz->opsiC}}</p>
                    <p>D. {{$quiz->opsiD}}</p>
                </td>
                <td>
                    <button><a href="{{route('edit.quiz', ['id' => $quiz->question_id])}}">Edit</a></button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Hapus
                      </button>

                      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Pertanyaan</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus pertanyaan {{$key+1}}?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                              <button type="button" class="btn btn-primary"><a href="{{route('delete.quiz', ['id' => $quiz->question_id])}}">Ya</a></button>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>

            </tr>
            @endforeach
        </tbody>
          </table>
        </div>
        {{-- SIM C --}}
        <div class="tab-pane fade {{ $tab == 'SIM-C' ? 'show active' : '' }}" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <table class="table">
                <tbody>
                    @foreach ($quizes as $key => $quiz)
                  <tr>
                      <td>
                        <p>{{$key+1}}. {{$quiz->questions}}</p>
                        <p>A. {{$quiz->opsiA}}</p>
                        <p>B. {{$quiz->opsiB}}</p>
                        <p>C. {{$quiz->opsiC}}</p>
                        <p>D. {{$quiz->opsiD}}</p>
                    </td>
                    <td>
                        <button><a href="{{route('edit.quiz', ['id' => $quiz->question_id])}}">Edit</a></button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hapus-sim-c">
                            Hapus
                          </button>

                          <div class="modal fade" id="hapus-sim-c" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Pertanyaan</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus pertanyaan {{$key+1}}?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                  <button type="button" class="btn btn-primary"><a href="{{route('delete.quiz', ['id' => $quiz->question_id])}}">Ya</a></button>
                                </div>
                              </div>
                            </div>
                          </div>
                    </td>

                </tr>
                @endforeach
                </tbody>
              </table>
    </div>
</div>

@endsection
