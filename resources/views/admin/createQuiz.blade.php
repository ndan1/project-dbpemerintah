@extends('admin.adminmaster')

@section('content')
    <form action="{{route('buat.quiz')}}" method="POST">
        @csrf
        <div class="d-flex flex-column p-5 row-gap-3 mx-auto row-gap-3" style="justify-content: center">
            <h1 class="mx-auto">Buat Pertanyaan Quiz</h1>
            <div class="p-2 g-col-6 mx-auto">
                <div class="form-outline" data-mdb-input-init>
                    <textarea class="form-control" name="questions" id="textAreaExample" rows="4" cols="100"></textarea>
                    <label class="form-label" for="textAreaExample">Pertanyaan</label>
                  </div>
                </div>

                <div class="p-2 g-col-6 mx-auto">
                <h3>Jawaban :</h3>

            </div>
            <div class="p-2 g-col-6 mx-auto d-flex">

                <input class="me-3" type="radio" value="A" name="answer" id="answer">
                <div class="form-outline me-4" data-mdb-input-init>
                    <textarea class="form-control" name="opsiA" id="textAreaExample" rows="4" cols="100"></textarea>
                    <label class="form-label" for="textAreaExample">Opsi A</label>
                  </div>
            </div>
            <div class="p-2 g-col-6 mx-auto d-flex">
                <input class="me-3" type="radio" value="B" name="answer" id="answer">
                <div class="form-outline me-4" data-mdb-input-init>
                    <textarea class="form-control" name="opsiB" id="textAreaExample" rows="4" cols="100"></textarea>
                    <label class="form-label" for="textAreaExample">Opsi B</label>
                  </div>
            </div>
            <div class="p-2 g-col-6 mx-auto d-flex flex-row">
                <input class="me-3" type="radio" value="C" name="answer" id="answer">
                <div class="form-outline me-4" data-mdb-input-init>
                    <textarea class="form-control" name="opsiC" id="textAreaExample" rows="4" cols="100"></textarea>
                    <label class="form-label" for="textAreaExample">Opsi C</label>
                  </div>

            </div>
            <div class="p-2 g-col-6 mx-auto d-flex flex-row">
                <input class="me-3" type="radio" value="D" name="answer" id="answer">
                <div class="form-outline me-4" data-mdb-input-init>
                    <textarea class="form-control" name="opsiD" id="textAreaExample" rows="4" cols="100"></textarea>
                    <label class="form-label" for="textAreaExample">Opsi D</label>
                  </div>
            </div>

            <div>
            <select name="jenis_sim" id="sim" class="form-select" aria-label="Default select example">
                <option selected value="A">SIM A</option>
                {{-- <option value="A">SIM A</option> --}}
                <option value="B">SIM C</option>
              </select>
            </div>


            <div class="p-2 g-col-6 mx-auto">
                <button type="submit">Submit</button>
            </div>
        </div>

    </form>
@endsection
