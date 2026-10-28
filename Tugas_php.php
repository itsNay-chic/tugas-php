<?php

$matkul = [
    ["nama" => "Pemrograman Web", "sks" => 3, "Nilai" => 85],
    ["nama" => "Sistem Basis Data", "sks" => 3, "Nilai" => 75],
    ["nama" => "Sistem Operasi", "sks" => 3, "Nilai" => 55],
    ["nama" => "Jaringan Komputer", "sks" => 4, "Nilai" => 40],
    ["nama" => "Kecerdasan Buatan", "sks" => 2, "Nilai" => 90],
];

function hitungBobot($nilai) {
    if ($nilai >= 80){
        return ["huruf" => "A", "bobot" => 4.0];
    } elseif ($nilai>= 70) {
        return ["huruf" => "B", "bobot" => 3.0];
    } elseif ($nilai >=60) {
        return ["huruf" >= "C", "bobot" => 2.0];
    } elseif ($nilai >=50) {
        return ["huruf" => "D", "bobot" => 1.0];
    } else {
        return ["huruf" => "E", "bobot" => 0.0];
    }
}

$totalSKS = 0;
$totalmutu = 0;

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>Nama Matkul</th>
        <th>SKS</th>
        <th>Nilai Angka</th>
        <th>Nilai Huruf</th>
        <th>Status</th>
     </tr>";

foreach ($matkul as $mk) {
    $hasil = hitungBobot($mk['Nilai']);
    $huruf = $hasil['huruf'];
    $bobot = $hasil['bobot'];

    $status = ($bobot >= 2.0) ? "LULUS" : "MENGULANG";

    $style = ($status == "MENGULANG")? "style='background-color: #ffcccc; color: red;'":"";

    echo "<tr $style>";
    echo "<td>{$mk['nama']}</td>";
    echo "<td>{$mk['sks']}</td>";
    echo "<td>{$mk['Nilai']}</td>";
    echo "<td>{$huruf}</td>";
    echo "<td>{$status}</td>";
    echo "</tr>";

    $totalSKS += $mk['sks'];
    $totalmutu += ($bobot * $mk ['sks']);
}

echo "</table>";

$ips = ($totalSKS > 0) ? ($totalmutu / $totalSKS) :0;
echo "<h3>Ringkasan:</h3>";
echo "Total SKS: ". $totalSKS . "<br>";
echo "<strong>IPS (Indeks Prestasi Semester): " . number_format($ips,2) . "</strong><br><br>";

$jatahSKS = ($ips >= 3.00) ? 24 : 20;
echo "<strong>Batas Maksimal SKS semester depan: $jatahSKS</strong>";

?>