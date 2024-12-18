<?php include 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Language and Countries</title>
    <script>
        // Funksjon som kjører AJAX request mens du taster (onkeyup event)
        function fetchResults() {
            const query = document.getElementById('language').value;

            // Sjekker at input ikke er tomt
            if (query.trim() === "") {
                document.getElementById('results').innerHTML = ""; // Nullstiller resultat
                return;
            }

            // Oppretter XMLHttpRequest for å hente resultater fra serveren
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_results.php?language=' + encodeURIComponent(query), true);

            xhr.onload = function () {
                // Sjekker om serveren returnerte en suksessfull respons
                if (xhr.status === 200) {
                    document.getElementById('results').innerHTML = xhr.responseText;
                } else {
                    console.error('Error fetching results:', xhr.status);
                }
            };

            xhr.send();
        }
    </script>
</head>
<body>
    <h1>Search for Countries by Language</h1>
    <form method="GET" action="javascript:void(0);">
        <label for="language">Enter a Language:</label>
        <input 
            type="text" 
            id="language" 
            name="language" 
            placeholder="e.g., English" 
            onkeyup="fetchResults()" 
            required
        >
    </form>

    <div id="results">
    </div>
</body>
</html>
