<!DOCTYPE html>
<html>
<head>
    <title>Call API OF Modul</title>
</head>
<body>
    <h2>Carian Subjek DIPA</h2>
    <form id="icForm">
        <label for="carian">Masukkan carian kod/Nama modul/Semester:</label>
        <br>
        <input type="text" id="cari" name="cari" >
      <button type="submit">Carian</button>
      <div>Contoh: Semester 3</div>
    </form>

    <div id="result" style="margin-top:20px;"></div>

    <script>
        document.getElementById('icForm').addEventListener('submit', function(e) {
            e.preventDefault(); // prevent full form submission

            const cari = document.getElementById('cari').value;

            fetch('http://localhost/apiencik/endpoint.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'cari=' + encodeURIComponent(cari)
            })
            .then(response => response.json())
            .then(data => {
                const resultDiv = document.getElementById('result');
                resultDiv.innerHTML = ''; // Clear previous results

                if (data.status === 'success' && Array.isArray(data.data)) {
                    const total = data.data.length;
                    resultDiv.innerHTML += `<strong>Total found:</strong> ${total}<br><br>`;

                    if (total > 0) {
                        data.data.forEach(item => {
                            resultDiv.innerHTML += `Nama Pengajar: ${item.nama}<br>Modul ${item.ic} <br>`;
                        });
                    } else {
                        resultDiv.innerHTML += 'No matching data found.';
                    }
                } else {
                    resultDiv.textContent = 'No data found or error from API.';
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                document.getElementById('result').textContent = 'Failed to fetch data.';
            });
        });
    </script>
</body>
</html>
