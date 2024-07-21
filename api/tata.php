<?php
// Define the path to the JSON file
$filePath = 'channel.json';

// Attempt to read the JSON file
$jsonData = @file_get_contents($filePath);

// Check if file_get_contents was successful
if ($jsonData === false) {
    die('Error: Unable to read JSON file.');
}

// Decode the JSON data
$channels = json_decode($jsonData, true);

// Check if json_decode was successful
if ($channels === null) {
    die('Error: Unable to decode JSON data.');
}

// Get unique genres for dropdown
$genres = array_unique(array_column($channels, 'channel_genre'));

// Filter channels based on selected genre
$selectedGenre = isset($_GET['genre']) ? $_GET['genre'] : '';
$filteredChannels = array_filter($channels, function($channel) use ($selectedGenre) {
    return !$selectedGenre || $channel['channel_genre'] === $selectedGenre;
});

// Filter channels based on search query
$searchQuery = isset($_GET['search']) ? strtolower($_GET['search']) : '';
if ($searchQuery) {
    $filteredChannels = array_filter($filteredChannels, function($channel) use ($searchQuery) {
        return strpos(strtolower($channel['channel_name']), $searchQuery) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Channel Grid</title>
    <style>
        .channel-grid { display: flex; flex-wrap: wrap; gap: 20px; }
        .channel { border: 1px solid #ddd; padding: 10px; text-align: center; width: 200px; }
        .channel img { max-width: 100%; height: auto; }
        #video-player { display: none; position: fixed; top: 20%; left: 50%; transform: translate(-50%, -20%); z-index: 1000; background: #000; padding: 20px; border-radius: 10px; }
        #video-player iframe { width: 100%; height: 300px; }
        #overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 999; }
    </style>
</head>
<body>
    <h1>Channel Grid</h1>
    <form method="GET">
        <input type="text" name="search" placeholder="Search channels" value="<?php echo htmlspecialchars($searchQuery); ?>">
        <select name="genre" onchange="this.form.submit()">
            <option value="">All Genres</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?php echo htmlspecialchars($genre); ?>" <?php echo $selectedGenre === $genre ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($genre); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <div class="channel-grid">
        <?php foreach ($filteredChannels as $channel): ?>
            <div class="channel" onclick="showVideo('<?php echo htmlspecialchars($channel['channel_id']); ?>')">
                <img src="<?php echo htmlspecialchars($channel['channel_logo']); ?>" alt="<?php echo htmlspecialchars($channel['channel_name']); ?>">
                <h3><?php echo htmlspecialchars($channel['channel_name']); ?></h3>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Overlay and Video Player -->
    <div id="overlay"></div>
    <div id="video-player">
        <iframe id="video-frame" src="" frameborder="0" allowfullscreen></iframe>
        <button onclick="closeVideo()">Close</button>
    </div>

    <script>
        function showVideo(channelId) {
            var iframe = document.getElementById('video-frame');
            iframe.src = 'https://tvtelugu.vercel.app/api/tplay.php?id=' + channelId;
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('video-player').style.display = 'block';
        }

        function closeVideo() {
            var iframe = document.getElementById('video-frame');
            iframe.src = '';
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('video-player').style.display = 'none';
        }
    </script>
</body>
</html>
