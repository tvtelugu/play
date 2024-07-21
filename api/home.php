<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🕊𝐓𝐕𝐓𝐞𝐥𝐮𝐠𝐮™ || 𝐓𝐀𝐓𝐀𝐏𝐋𝐀𝐘 </title>
    <link rel="shortcut icon" href="https://raw.githubusercontent.com/tvtelugu/play/main/images/TVtelugu.ico">
    <link href="https://fonts.googleapis.com/css2?family=Wittgenstein:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: 'Wittgenstein', serif;
            background: url('https://images.pexels.com/photos/4840134/pexels-photo-4840134.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center fixed;
            background-size: cover;
            color: #2c3e50;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
            overflow: auto;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            z-index: -1;
        }

        h1 {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            color: #fff;
            font-size: 2.5em;
            background: linear-gradient(90deg, #ff007a, #ff5e00, #f9c81f, #00b2ff, #8e2de2);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: gradientShift 3s linear infinite;
        }
        
        img[src="https://www.000webhost.com/static/default.000webhost.com/images/powered-by-000webhost.png"] {
            display: none;
        }

        .title-logo {
            width: 100px;
            height: 100px;
            margin-right: 10px;
        }

        .controls {
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            width: 100%;
            max-width: 600px;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .select-container, .search-container {
            position: relative;
            width: 49%;
        }

        .material-icons {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #2c3e50;
        }

        select, input {
            width: 100%;
            padding: 10px 10px 10px 40px;
            border: 1px solid #3498db;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
            background-color: #ffffff;
            color: #2c3e50;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #ffffff;
        }

        .select-container::after {
            content: 'arrow_drop_down';
            font-family: 'Material Icons';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #2c3e50;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 1200px;
        }

        .channel-card {
            background-color: #ffffff;
            border-radius: 5px;
            overflow: hidden;
            text-align: center;
            position: relative;
        }

        .channel-logo {
            height: 90px;
            width: 90px;
            object-fit: contain;
            margin: 20px auto;
        }

        .channel-name {
            font-size: 16px;
            font-weight: bold;
            color: #2c3e50;
            margin: 10px 0;
        }

        .channel-genre {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 10px;
        }

        .source-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-bottom: 10px;
        }

        .source-button {
            width: 30px;
            height: 30px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .source-button:nth-child(2) {
            background-color: #e74c3c;
        }

        .source-button:hover {
            background-color: #2980b9;
        }

        .source-button:nth-child(2):hover {
            background-color: #c0392b;
        }

        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            flex-direction: column;
        }

        .loader {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loader .dot {
            width: 15px;
            height: 15px;
            background-color: #e50914;
            border-radius: 50%;
            animation: bounce 0.6s infinite alternate;
        }

        .loader .dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .loader .dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes bounce {
            from {
                transform: translateY(0);
                opacity: 1;
            }
            to {
                transform: translateY(-20px);
                opacity: 0.7;
            }
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 0%;
            }
            100% {
                background-position: 0% 100%;
            }
        }

        footer {
            margin-top: 40px;
            padding: 10px;
            background-color: #2c3e50;
            color: #ffffff;
            text-align: center;
            border-radius: 5px;
            width: 100%;
            max-width: 600px;
        }

        .footer-text {
            margin: 0;
            font-size: 14px;
        }

        /* Video Popup */
        .video-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 10000;
            justify-content: center;
            align-items: center;
        }

        .video-popup.active {
            display: flex;
        }

        .video-popup .video-container {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            width: 80%;
            max-width: 800px;
            padding: 10px;
        }

        .video-popup .video-container iframe {
            width: 100%;
            height: 450px;
        }

        .video-popup .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #e74c3c;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        /* New Loading Animation */
        .video-popup .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            color: #3498db;
            font-weight: bold;
            opacity: 1;
            transition: opacity 0.3s;
            z-index: 10;
        }

        .video-popup .loading-overlay.hidden {
            opacity: 0;
            visibility: hidden;
        }

    </style>
</head>
<body>
    <header>
        <h1><img class="title-logo" src="https://raw.githubusercontent.com/tvtelugu/play/main/images/TVtelugu.ico" alt="Logo">🕊𝐓𝐕𝐓𝐞𝐥𝐮𝐠𝐮™ || 𝐓𝐀𝐓𝐀𝐏𝐋𝐀𝐘 </h1>
    </header>
    <div class="controls">
        <div class="select-container">
            <span class="material-icons">category</span>
            <select id="genreFilter">
                <option value="All">All</option>
                <option value="Entertainment">Entertainment</option>
                <option value="News">News</option>
                <option value="Movies">Movies</option>
                <option value="Music">Music</option>
                <option value="Sports">Sports</option>
                <option value="Kids">Kids</option>
            </select>
        </div>
        <div class="search-container">
            <span class="material-icons">search</span>
            <input type="text" id="searchBox" placeholder="Search...">
        </div>
    </div>
    <div class="grid-container"></div>
    <div class="loader-container">
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        <p class="footer-text">Loading content, please wait...</p>
    </div>
    <div class="video-popup">
        <div class="video-container">
            <button class="close-btn">×</button>
            <div class="loading-overlay">Loading...</div>
            <iframe src="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
    <footer>
        <p class="footer-text">© 2023 🕊𝐓𝐕𝐓𝐞𝐥𝐮𝐠𝐮™. All rights reserved.</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const genreFilter = document.getElementById('genreFilter');
            const searchBox = document.getElementById('searchBox');
            const gridContainer = document.querySelector('.grid-container');
            const loaderContainer = document.querySelector('.loader-container');
            const videoPopup = document.querySelector('.video-popup');
            const videoContainer = document.querySelector('.video-container');
            const closeBtn = document.querySelector('.close-btn');
            const iframe = videoContainer.querySelector('iframe');
            const loadingOverlay = videoContainer.querySelector('.loading-overlay');

            genreFilter.addEventListener('change', filterChannels);
            searchBox.addEventListener('input', filterChannels);
            closeBtn.addEventListener('click', closeVideoPopup);

            const channels = [
                { id: 1, name: 'Star Sports 1 Telugu', genre: 'Sports', logo: 'https://upload.wikimedia.org/wikipedia/commons/5/56/Star_Sports_Logo.png', sources: ['https://www.youtube.com/watch?v=dQw4w9WgXcQ'] },
                { id: 2, name: 'Gemini TV', genre: 'Entertainment', logo: 'https://upload.wikimedia.org/wikipedia/en/f/f0/Sun_Network_-_Gemini_TV.jpg', sources: ['https://www.youtube.com/watch?v=dQw4w9WgXcQ'] },
                { id: 3, name: 'ETV Telugu', genre: 'Entertainment', logo: 'https://upload.wikimedia.org/wikipedia/commons/8/83/ETV_Telugu.jpg', sources: ['https://www.youtube.com/watch?v=dQw4w9WgXcQ'] },
                { id: 4, name: 'TV9 Telugu', genre: 'News', logo: 'https://upload.wikimedia.org/wikipedia/commons/c/cc/Tv9telugu.png', sources: ['https://www.youtube.com/watch?v=dQw4w9WgXcQ'] },
                { id: 5, name: 'Disney Channel', genre: 'Kids', logo: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Disney_Channel_logo.png/800px-Disney_Channel_logo.png', sources: ['https://www.youtube.com/watch?v=dQw4w9WgXcQ'] },
                { id: 6, name: 'Gemini Movies', genre: 'Movies', logo: 'https://upload.wikimedia.org/wikipedia/en/c/cf/Gemini_Movies.jpg', sources: ['https://www.youtube.com/watch?v=dQw4w9WgXcQ'] },
                { id: 7, name: 'Maa Music', genre: 'Music', logo: 'https://upload.wikimedia.org/wikipedia/en/9/9c/Star_Maa_Music.jpg', sources: ['https://www.youtube.com/watch?v=dQw4w9WgXcQ'] },
                { id: 8, name: 'Sonic Nickelodeon', genre: 'Kids', logo: 'https://upload.wikimedia.org/wikipedia/commons/e/eb/Sonic_Nickelodeon_Logo.png', sources: ['https://www.youtube.com/watch?v=dQw4w9WgXcQ'] },
            ];

            function showLoader() {
                loaderContainer.style.display = 'flex';
            }

            function hideLoader() {
                loaderContainer.style.display = 'none';
            }

            function showVideoPopup(source) {
                videoPopup.classList.add('active');
                loadingOverlay.classList.remove('hidden');
                iframe.src = source;
                iframe.onload = () => loadingOverlay.classList.add('hidden');
            }

            function closeVideoPopup() {
                videoPopup.classList.remove('active');
                iframe.src = '';
            }

            function filterChannels() {
                const searchQuery = searchBox.value.toLowerCase();
                const selectedGenre = genreFilter.value;
                const filteredChannels = channels.filter(channel => {
                    const matchesGenre = selectedGenre === 'All' || channel.genre === selectedGenre;
                    const matchesSearch = channel.name.toLowerCase().includes(searchQuery);
                    return matchesGenre && matchesSearch;
                });
                displayChannels(filteredChannels);
            }

            function displayChannels(channels) {
                gridContainer.innerHTML = '';
                channels.forEach(channel => {
                    const card = document.createElement('div');
                    card.classList.add('channel-card');
                    card.innerHTML = `
                        <img class="channel-logo" src="${channel.logo}" alt="${channel.name}">
                        <div class="channel-name">${channel.name}</div>
                        <div class="channel-genre">${channel.genre}</div>
                        <div class="source-buttons">
                            ${channel.sources.map(source => `<button class="source-button" data-source="${source}">▶</button>`).join('')}
                        </div>
                    `;
                    gridContainer.appendChild(card);
                });

                document.querySelectorAll('.source-button').forEach(button => {
                    button.addEventListener('click', function() {
                        const source = this.getAttribute('data-source');
                        showVideoPopup(source);
                    });
                });
            }

            showLoader();
            setTimeout(() => {
                hideLoader();
                filterChannels();
            }, 2000);
        });
    </script>
</body>
</html>
