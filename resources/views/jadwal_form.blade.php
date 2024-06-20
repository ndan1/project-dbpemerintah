@extends('master')

@section('content')
    <div class="container mt-5">
        <h2>Pilih Jadwal Kedatangan Pembuatan SIM</h2>
        <form action="{{ route('jadwal-kedatangan.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="pembuatan_sim_id" value="{{ $pembuatanSim->id_pembuatan }}">
            <div class="mb-3">
                <label for="schedule_date" class="form-label">Tanggal Kedatangan:</label>
                <input type="date" class="form-control" id="schedule_date" name="schedule_date" required>
            </div>
            <div class="mb-3">
                <label for="schedule_time" class="form-label">Waktu Kedatangan:</label>
                <select class="form-control" id="schedule_time" name="schedule_time" required>
                    <!-- Options will be added by JavaScript -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scheduleTimeSelect = document.getElementById('schedule_time');
            const startTime = 8;  // 8 AM
            const endTime = 17;   // 5 PM
            const interval = 30;  // 30 minutes

            for (let hour = startTime; hour <= endTime; hour++) {
                for (let minutes = 0; minutes < 60; minutes += interval) {
                    // Skip times after 5 PM
                    if (hour === endTime && minutes > 0) break;
                    const time = `${String(hour).padStart(2, '0')}:${String(minutes).padStart(2, '0')}`;
                    const option = document.createElement('option');
                    option.value = time;
                    option.textContent = time;
                    scheduleTimeSelect.appendChild(option);
                }
            }
        });
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scheduleTimeSelect = document.getElementById('schedule_time');
            const startTime = 8; // 8 AM
            const endTime = 17; // 5 PM
            const interval = 30; // 30 minutes

            function loadScheduleTimes(disabledTimes) {
                scheduleTimeSelect.innerHTML = ''; // Clear existing options
                for (let hour = startTime; hour <= endTime; hour++) {
                    for (let minutes = 0; minutes < 60; minutes += interval) {
                        // Skip times after 5 PM
                        if (hour === endTime && minutes > 0) break;
                        const time = `${String(hour).padStart(2, '0')}:${String(minutes).padStart(2, '0')}`;
                        const option = document.createElement('option');
                        option.value = time;
                        option.textContent = time;
                        if (disabledTimes.includes(time)) {
                            option.disabled = true;
                        }
                        scheduleTimeSelect.appendChild(option);
                    }
                }
            }

            document.getElementById('schedule_date').addEventListener('change', function() {
                const selectedDate = this.value;
                fetch(`/api/get-scheduled-times?date=${selectedDate}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        loadScheduleTimes(data.disabledTimes);
                    })
                    .catch(error => {
                        console.error('Error fetching scheduled times:', error);
                        // Handle error here, e.g., display a message to the user
                    });
            });

            // Initial load when the page is first loaded
            const initialDate = document.getElementById('schedule_date').value;
            fetch(`/api/get-scheduled-times?date=${initialDate}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    loadScheduleTimes(data.disabledTimes);
                })
                .catch(error => {
                    console.error('Error fetching scheduled times:', error);
                    // Handle error here, e.g., display a message to the user
                });
        });
    </script> --}}
@endsection
