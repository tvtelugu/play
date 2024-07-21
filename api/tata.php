<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Channel Grid</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .header {
            position: relative;
            background-image: url('header-background.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 20px;
            text-align: center;
            opacity: 0.8;
        }
        .header h1 {
            margin: 0;
            font-size: 2em;
        }
        .search-bar {
            margin-top: 20px;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            width: 80%;
            font-size: 1em;
        }
        .category-dropdown {
            margin-top: 10px;
        }
        .category-dropdown select {
            padding: 10px;
            font-size: 1em;
        }
        .channel-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 10px;
            padding: 20px;
        }
        .channel {
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .channel img {
            width: 100%;
            height: auto;
        }
        .channel button {
            padding: 10px;
            background-color: #f00;
            color: #fff;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Channel Grid</h1>
        <div class="search-bar">
            <input type="text" id="search" placeholder="Search Channels...">
        </div>
        <div class="category-dropdown">
            <select id="genre">
                <option value="All">All Categories</option>
                <option value="News">News</option>
                <option value="Lifestyle">Lifestyle</option>
            </select>
        </div>
    </div>
    <div class="channel-grid" id="channel-grid">
        <!-- Channel items will be dynamically added here -->
    </div>
    <script>
        async function fetchChannels() {
            const response = await fetch('https://toxicify-tpkeys.vercel.app/data/tplay.json');
            const data = await response.json();
            const channelGrid = document.getElementById('channel-grid');
            
            data.data.forEach(channel => {
                const channelDiv = document.createElement('div');
                channelDiv.classList.add('channel');
                
                channelDiv.innerHTML = `
                    <img src="${channel.logo}" alt="${channel.name}">
                    <h3>${channel.name}</h3>
                    <button onclick="playVideo('${channel.id}')">Watch</button>
                `;
                
                channelGrid.appendChild(channelDiv);
            });
        }

        function playVideo(id) {
            const url = `https://tvtelugu.vercel.app/api/tplay.php?id=${id}`;
            window.open(url, '_blank');
        }

        fetchChannels();
    </script>
</body>
</html>
