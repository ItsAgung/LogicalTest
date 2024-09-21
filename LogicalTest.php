<?php

function gradingStudents($grades) {
    $finalGrades = [];

    foreach ($grades as $grade) {
        if ($grade < 38) {
            $finalGrades[] = $grade; // Jika nilai kurang dari 38, maka tidak perlu di bulatkan
        } else {
            $nextMultipleOfFive = ceil($grade / 5) * 5; // Hitung kelipatan 5 terdekat dari nilai
            if ($nextMultipleOfFive - $grade < 3) {
                $finalGrades[] = $nextMultipleOfFive; // Bulatkan jika perbedaannya kurang dari 3
            } else {
                $finalGrades[] = $grade; // Jika tidak, tidak perlu di bulatkan
            }
        }
    }

    return $finalGrades;
}

// Baca input dari terminal
$handle = fopen("php://stdin", "r");


// Kolom Input
echo "Input:\n";
fscanf($handle, "%d", $n);

// Ketentuan jumlah siswa (number of students) (1 <= n <= 60)
if ($n < 1 || $n > 60) {
    echo "Error: The number of students must be between 1 and 60.\n";
    exit;
}

$grades = [];
for ($i = 0; $i < $n; $i++) {
    fscanf($handle, "%d", $grade);

    // Ketentuan nilai (grade) antara 0 dan 100 (0 <= grade[i] <= 100)
    if ($grade < 0 || $grade > 100) {
        echo "Error: Grade must be between 0 and 100.\n";
        exit;
    }

    $grades[] = $grade; // Simpan nilai dalam array
}

// Proses data menggunakan fungsi gradingStudents
$roundedGrades = gradingStudents($grades);

// Output nilai akhir
echo "Output:\n";
foreach ($roundedGrades as $grade) {
    echo $grade . "\n";
}

?>