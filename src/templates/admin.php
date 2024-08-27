<?php
$title = 'Admin';
ob_start(); 
?>

<div class="container m-2 mt-5 p-5 bg-light">
    <h2>Graphique des Qualifications des Employés</h2>
    <div style="">
        <canvas id="feedbackChart" width="350" height="150"></canvas>
    </div>
</div>

<script>
    var ctx = document.getElementById('feedbackChart').getContext('2d');
    var feedbackChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($employee_euler_scores as $score) echo '"' . $score['name'] . '",'; ?>],
            datasets: [{
                label: 'Qualifications (Méthode d\'Euler)',
                data: [<?php foreach ($employee_euler_scores as $score) echo $score['score'] . ','; ?>],
                backgroundColor: [<?= implode(',',$backgroundColors)?>],
                borderColor: [<?= implode(',',$borderColors)?>],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max:20,
                    ticks: { 
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>

<?php
$content = ob_get_clean();
require_once 'layout.php';