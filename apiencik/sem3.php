<!DOCTYPE html>
<html>
<head>
    <title>Call API with IC</title>
</head>
<body>
    <h2>Carian Ahli</h2>
    <form id="icForm">
        <label for="carian">Masukkan carian:</label>
        <input type="text" id="ic" name="ic" >
        <button type="submit">Submit</button>
    </form>

    <div id="result" style="margin-top:20px;"></div>

    <script>
        document.getElementById('icForm').addEventListener('submit', function(e) {
            e.preventDefault(); // prevent full form submission

            const ic = document.getElementById('ic').value;

            fetch('https://elite2b.com/kelasapi/2_B_apilink.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'ic=' + encodeURIComponent(ic)
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
                            resultDiv.innerHTML += `Name : ${item.nama}<br>`;
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
