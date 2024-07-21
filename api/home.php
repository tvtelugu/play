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
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }

        .video-popup .loading-overlay img {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }

        .video-popup .loading-overlay .loader {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="loader-container" id="loader-container">
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
    <h1>
        <img src="https://raw.githubusercontent.com/tvtelugu/play/main/images/TVTELUGU-B.png" alt="Title Logo" class="title-logo">
        🕊 𝐓𝐀𝐓𝐀𝐏𝐋𝐀𝐘
    </h1>
    <div class="controls">
        <div class="select-container">
            <i class="material-icons">category</i>
            <select id="genre-select">
                <option value="">All Genres</option>
            </select>
        </div>
        <div class="search-container">
            <i class="material-icons">search</i>
            <input type="text" id="search-bar" placeholder="Search channels...">
        </div>
    </div>
    <div class="grid-container" id="grid-container">
        <!-- Channel cards will be dynamically inserted here -->
    </div>
    <footer>
        <p class="footer-text">© 2024 🕊𝐓𝐕𝐓𝐞𝐥𝐮𝐠𝐮™. All rights reserved.</p>
    </footer>

    <!-- Video Popup -->
    <div class="video-popup" id="video-popup">
        <div class="video-container">
            <button class="close-btn" id="close-popup">✖</button>
            <div class="loading-overlay" id="loading-overlay">
                <img src="https://raw.githubusercontent.com/tvtelugu/play/main/images/TVtelugu.ico" alt="Site Logo">
                <div class="loader">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>
            <iframe id="video-frame" src="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>

   <script>
    const loaderContainer = document.getElementById('loader-container');
    const videoPopup = document.getElementById('video-popup');
    const videoFrame = document.getElementById('video-frame');
    const closePopupButton = document.getElementById('close-popup');
    const loadingOverlay = document.getElementById('loading-overlay');
    const genreSelect = document.getElementById('genre-select');
    const searchBar = document.getElementById('search-bar');

    function showLoader() {
        loaderContainer.style.display = 'flex';
    }

    function hideLoader() {
        loaderContainer.style.display = 'none';
    }

    function showVideoPopup(url) {
        videoFrame.src = url;
        loadingOverlay.style.display = 'flex'; // Show loading animation
        videoPopup.classList.add('active');

        // Hide loading animation after 5 seconds
        setTimeout(() => {
            loadingOverlay.style.display = 'none';
        }, 5000);
    }

    function hideVideoPopup() {
        videoPopup.classList.remove('active');
        videoFrame.src = '';
        loadingOverlay.style.display = 'none'; // Hide loading animation
    }

    closePopupButton.addEventListener('click', hideVideoPopup);

    showLoader();

    // Function to save the state to local storage
    function saveState() {
        localStorage.setItem('selectedGenre', genreSelect.value);
        localStorage.setItem('searchQuery', searchBar.value);
    }

    // Function to load the state from local storage
    function loadState() {
        const savedGenre = localStorage.getItem('selectedGenre');
        const savedQuery = localStorage.getItem('searchQuery');

        if (savedGenre) {
            genreSelect.value = savedGenre;
        }

        if (savedQuery) {
            searchBar.value = savedQuery;
        }
    }

    // Fetch channels and initialize
    fetch('/channel.json')
        .then(response => response.json())
        .then(channelsData => {
            const gridContainer = document.getElementById('grid-container');

            const genres = [...new Set(channelsData.map(channel => channel.channel_genre))];
            genres.forEach(genre => {
                const option = document.createElement('option');
                option.value = genre;
                option.textContent = genre;
                genreSelect.appendChild(option);
            });

            function renderChannels() {
                gridContainer.innerHTML = '';
                const searchQuery = searchBar.value.toLowerCase();
                const selectedGenre = genreSelect.value;
                const filteredChannels = channelsData.filter(channel => {
                    const matchesGenre = selectedGenre === '' || channel.channel_genre === selectedGenre;
                    const matchesSearch = channel.channel_name.toLowerCase().includes(searchQuery);
                    return matchesGenre && matchesSearch;
                });

                filteredChannels.forEach(channel => {
                    const channelCard = document.createElement('div');
                    channelCard.classList.add('channel-card');

                    const channelLink = document.createElement('a');
                    channelLink.href = `#`;

                    const channelLogo = document.createElement('img');
                    channelLogo.src = channel.channel_logo;
                    channelLogo.alt = `${channel.channel_name} Logo`;
                    channelLogo.classList.add('channel-logo');

                    const channelName = document.createElement('div');
                    channelName.classList.add('channel-name');
                    channelName.textContent = channel.channel_name;

                    const channelGenre = document.createElement('div');
                    channelGenre.classList.add('channel-genre');
                    channelGenre.textContent = channel.channel_genre;

                    const source1Button = document.createElement('button');
                    source1Button.classList.add('source-button');
                    source1Button.addEventListener('click', () => {
                        showVideoPopup(`play.php?id=${channel.channel_id}`);
                    });

                    const source2Button = document.createElement('button');
                    source2Button.classList.add('source-button');
                    source2Button.addEventListener('click', () => {
                        showVideoPopup(`https://tvtelugu.vercel.app/yt.html?channel=${channel.channel_id}`);
                    });

                    const sourceButtonsContainer = document.createElement('div');
                    sourceButtonsContainer.classList.add('source-buttons');
                    sourceButtonsContainer.appendChild(source1Button);
                    sourceButtonsContainer.appendChild(source2Button);

                    channelLink.appendChild(channelLogo);
                    channelCard.appendChild(channelLink);
                    channelCard.appendChild(channelName);
                    channelCard.appendChild(channelGenre);
                    channelCard.appendChild(sourceButtonsContainer);
                    gridContainer.appendChild(channelCard);
                });

                hideLoader();
            }

            genreSelect.addEventListener('change', () => {
                renderChannels();
                saveState();
            });

            searchBar.addEventListener('input', () => {
                renderChannels();
                saveState();
            });

            loadState();
            renderChannels();
        })
        .catch(error => {
            console.error('Error loading channels:', error);
            hideLoader(); // Ensure the loader is hidden even if there's an error
        });
</script>
</body>
</html>
