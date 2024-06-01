<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .page-item-answer .page-link {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-danger">

        <div id="timer" class="mx-auto bg-body-tertiary" style="padding: 7px 15px;border-radius:10%"></div>
    </nav>
<div class="container" style="margin-top: 100px">
    @if ($quizes->count() > 0)
        @foreach ($quizes as $quiz)
            <div class="card mb-4">
                <div class="card-header">
                    Pertanyaan {{ $quizes->currentPage() }}
                </div>
                <div class="card-body">
                    <form id="quizForm" action="{{ route('submit.quiz') }}" method="POST">
                        @csrf
                        <input type="hidden" name="page" value="{{ $quizes->currentPage() }}">
                        <input type="hidden" name="last_page" value="{{ $quizes->lastPage() }}">
                        <h5 class="card-title">{{ $quiz->questions }}</h5>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="answer" value="A" {{ (isset($answers[$quizes->currentPage()]) && $answers[$quizes->currentPage()] == 'A') ? 'checked' : '' }}> {{ $quiz->opsiA }}
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="answer" value="B" {{ (isset($answers[$quizes->currentPage()]) && $answers[$quizes->currentPage()] == 'B') ? 'checked' : '' }}> {{ $quiz->opsiB }}
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="answer" value="C" {{ (isset($answers[$quizes->currentPage()]) && $answers[$quizes->currentPage()] == 'C') ? 'checked' : '' }}> {{ $quiz->opsiC }}
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="answer" value="D" {{ (isset($answers[$quizes->currentPage()]) && $answers[$quizes->currentPage()] == 'D') ? 'checked' : '' }}> {{ $quiz->opsiD }}
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

        <!-- Pagination -->
        <nav aria-label="Page navigation" style="margin-top: 50px">
            <ul class="pagination justify-content-center">
                @if ($quizes->onFirstPage())
                    <li class="page-item disabled"><a class="page-link">Previous</a></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $quizes->previousPageUrl() }}">Previous</a></li>
                @endif

                @foreach ($quizes->getUrlRange(1, $quizes->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $quizes->currentPage() ? 'active' : '' }} {{ isset($answers[$page]) ? 'page-item-answer' : '' }}" data-page="{{ $page }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($quizes->hasMorePages())
                    <li class="page-item"><a id="nextBtn" class="page-link" href="#">Next</a></li>
                @else
                    <li class="page-item disabled" style="display: none"><a class="page-link">Next</a></li>
                    <li class="page-item"><button id="submitBtn" class="page-link">Submit</button></li>
                @endif
            </ul>
        </nav>
    @else
        <p>No quizzes available.</p>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const timerDisplay = document.getElementById('timer');
        const totalMinutes = 1;
        let timeRemaining;

        // Initialize or retrieve start time
        if (!localStorage.getItem('quizStartTime')) {
            localStorage.setItem('quizStartTime', new Date().getTime());
        }
        const quizStartTime = parseInt(localStorage.getItem('quizStartTime'));

        function updateTimer() {
            const now = new Date().getTime();
            timeRemaining = totalMinutes * 60 - Math.floor((now - quizStartTime) / 1000);

            const minutes = Math.floor(timeRemaining / 60);
            const seconds = timeRemaining % 60;
            timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                submitQuiz();
            }
        }

        const timerInterval = setInterval(updateTimer, 1000);
        updateTimer();

        function submitQuiz() {
            var form = document.getElementById('quizForm');
            form.method = "POST";
            var formData = new FormData(form);
            console.log("Masuk");
            fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            }).then(response => {
                if (response.ok) {
                    localStorage.removeItem('quizStartTime'); // Clear start time from localStorage
                    window.location.href = "{{ route('result.show') }}"; // Redirect to result page
                }
            });
        }

        document.getElementById('nextBtn').addEventListener('click', function (e) {
            e.preventDefault();
            var nextPageUrl = '{{ $quizes->nextPageUrl() }}';

            var form = document.getElementById('quizForm');
            var formData = new FormData(form);
            fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            }).then(response => {
                if (response.ok) {
                    window.location.href = nextPageUrl;
                }
            });
        });

        document.getElementById('submitBtn').addEventListener('click', function (e) {
            e.preventDefault();
            console.log("Masuk");
            submitQuiz();
        });

        document.querySelectorAll('input[type="radio"]').forEach(function (radio) {
            radio.addEventListener('change', function () {
                var currentPage = parseInt(document.querySelector('input[name="page"]').value);
                var pageItem = document.querySelector('.page-item[data-page="' + currentPage + '"]');
                if (pageItem) {
                    pageItem.classList.add('page-item-answer');
                }
            });
        });

        document.querySelectorAll('.page-item').forEach(function (item) {
            var pageLink = item.querySelector('.page-link');
            if (pageLink) {
                var page = pageLink.textContent.trim();
                if (page) {
                    item.setAttribute('data-page', page);
                }
            }
        });
    });
</script>

</body>
</html>
