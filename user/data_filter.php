<?php
// Use users.json as data source
$dataFile = 'users.json';
$data = [];
if (file_exists($dataFile)) {
    $json = file_get_contents($dataFile);
    $data = json_decode($json, true) ?: [];
}

// If AJAX request, return filtered data as JSON
if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
    $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
    $filteredData = [];
    foreach ($data as $row) {
        // Adjust keys as per your users.json structure
        if (
            (isset($row['username']) && strpos(strtolower($row['username']), $search) !== false) ||
            (isset($row['role']) && strpos(strtolower($row['role']), $search) !== false)
        ) {
            $filteredData[] = $row;
        }
    }
    header('Content-Type: application/json');
    echo json_encode($filteredData);
    exit;
}

// Get current time
$currentTime = (new DateTime('now', new DateTimeZone('Asia/Kolkata')))->format('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Data Filter</title>
    <script>
    function realtimeSearch() {
        const search = document.getElementById('search').value;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'data_filter.php?ajax=1&search=' + encodeURIComponent(search), true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
                let html = '';
                if (data.length > 0) {
                    data.forEach(function(row) {
                        html += '<tr><td>' + (row.username || '') + '</td><td>' + (row.role || '') + '</td></tr>';
                    });
                } else {
                    html = '<tr><td colspan="2">No results found.</td></tr>';
                }
                document.getElementById('table-body').innerHTML = html;
            }
        };
        xhr.send();
    }
    </script>
</head>
<body>
    <h2>Data Filter </h2>
    <form onsubmit="return false;">
        <input type="text" id="search" name="search" placeholder="Search by username or role" onkeyup="realtimeSearch()">
    </form>
    <hr>
    <table border="1" cellpadding="5">
        <tr>
            <th>Username</th>
            <th>Role</th>
        </tr>
        <tbody id="table-body">
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['username'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($row['user'] ?? ''); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>