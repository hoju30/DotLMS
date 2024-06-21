document.addEventListener('DOMContentLoaded', function() {
    fetch('data.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#data-table tbody');
            data.forEach(row => {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${row.username}</td>
                    <td>${row.value}</td>
                    <td>${row.fir_ans}</td>
                    <td>${row.sec_ans}</td>
                    <td>${row.fir_cor}</td>
                    <td>${row.sec_cor}</td>
                    <td>${row.score}</td>
                `;
                tableBody.appendChild(tr);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
