<?php
include('koneksi.php');
$label = ["India","Japan","S.Korea","Turkey","Vietnam","Taiwan","Iran","Indonesia","Malaysia","Israel"];

for($covid = 1;$covid < 11;$covid++)
{
	$query = mysqli_query($conn,"select sum(total_recovered) as total_cases from tb_covid19 where id='$covid'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['total_cases'];
}
?>
<!doctype html>
<html>
    <head>
        <title>Membuat Grafik Menggunakan Chart JS</title>
        <script type="text/javascript" src="Chart.js"></script>
        <style>
        #canvas-holder {
            display: flex;
            justify-content: center;
            /* Horizontally center */
            align-items: center;
            /* Vertically center */
            width: 100%;
            height: 100%;
            /* Adjust the height as needed */
        }
        </style>
    </head>

    <body>
        <div style="width: 800px; height: 400px; display: inline-block;">
            <canvas id="pieChart"></canvas>
        </div>

        <script>
        var ctx3 = document.getElementById("pieChart").getContext('2d');
            var pieChart = new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($label); ?>,
                    datasets: [{
                        label: 'Presentase Kasus Aktif',
                        data: <?php echo json_encode($jumlah_produk); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 99, 255, 0.2)',
                            'rgba(54, 162, 64, 0.2)',
                            'rgba(255, 206, 153, 0.2)',
                            'rgba(75, 192, 128, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 99, 255, 1)',
                            'rgba(54, 162, 64, 1)',
                            'rgba(255, 206, 153, 1)',
                            'rgba(75, 192, 128, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>
    </body>
</html>