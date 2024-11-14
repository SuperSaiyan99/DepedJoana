
<div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Recruitment Trends</h5>
                </div>
                <div class="card-body">
                    <div wire:ignore.self>
                        <canvas id="recruitmentTrendsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Applicant Demographics</h5>
                </div>
                <div class="card-body">
                    <div wire:ignore.self>
                        <canvas id="applicantDemographicsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@assets
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
<script>
    const ctx = document.getElementById('recruitmentTrendsChart');
    const ctxx = document.getElementById('applicantDemographicsChart');

    const recruitmentTrendsChartData = $wire.recruitmentTrendsChartData;
    const applicantDemographicsData = $wire.applicantDemographicsData;

    const label1 = recruitmentTrendsChartData.map(item=>item.Month);
    const data1 = recruitmentTrendsChartData.map(item=>item.Value);

    const label2 = recruitmentTrendsChartData.map(item=>item.Month);
    const data2 = recruitmentTrendsChartData.map(item=>item.Value);

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: label1,
            datasets: [{
                label: 'Month',
                data: data1,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    new Chart(ctxx, {
        type: 'line',
        data: {
            labels: label2,
            datasets: [{
                label: '# of Votes',
                data: data2,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

</script>
@endscript

