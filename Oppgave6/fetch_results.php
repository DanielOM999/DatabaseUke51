<?php
include 'dbconnect.php';

// Sjekker om language (språk) er sendt via GET
if (isset($_GET['language'])) {
    $search_language = $_GET['language'];

    // Forbereder SQL spørring med placeholder for å unngå SQL Injection
    $stmt = $conn->prepare("
        SELECT 
            c.Language,
            co.Name AS Country,
            JSON_EXTRACT(doc, '$.demographics.Population') AS Population,
            c.IsOfficial
        FROM 
            countrylanguage c
        JOIN 
            country co ON c.CountryCode = co.Code
        JOIN
            world_x.countryinfo ON JSON_EXTRACT(doc, '$.Code') = co.Code
        WHERE 
            c.Language LIKE ?
    ");

    // Legger til wildcard for å søke etter delvise treff
    $param = '%' . $search_language . '%';
    $stmt->bind_param("s", $param); // Binder parameter som string
    $stmt->execute();
    $result = $stmt->get_result();

    $official_count = 0; // Teller antall offisielle språk
    $rows = [];          // Lager en array for å lagre resultatene

    // Hvis det finnes resultater i databasen
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Sjekker om språket er offisielt (T for true)
            if ($row['IsOfficial'] === 'T') {
                $official_count++; // Øker telleren
            }
            // Setter tekst for IsOfficial til YES/NO
            $row['IsOfficialText'] = ($row['IsOfficial'] === 'T') ? 'YES' : 'NO';
            $rows[] = $row; // Legger til raden i resultatene
        }

        // Viser antall offisielle språk først
        echo "<h3>Official Language Count: " . $official_count . "</h3>";

        // Lager en tabell for å vise resultatene
        echo "<table border='1' cellspacing='0' cellpadding='5'>";
        echo "<tr><th>Language</th><th>Is Official</th><th>Country</th><th>Population</th></tr>";

        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Language']) . "</td>";
            echo "<td>" . $row['IsOfficialText'] . "</td>";
            echo "<td>" . htmlspecialchars($row['Country']) . "</td>";
            echo "<td>" . htmlspecialchars(number_format($row['Population'])) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Viser en melding hvis ingen resultater finnes
        echo "<p>No results found for '$search_language'.</p>";
    }

    // Lukker statement
    $stmt->close();
}

// Lukker databasetilkobling
$conn->close();
?>