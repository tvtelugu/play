document.addEventListener('DOMContentLoaded', function() {
    const channelGrid = document.getElementById('channel-grid');
    const categoryDropdown = document.getElementById('category-dropdown');
    const searchBar = document.getElementById('search-bar');
    const videoPopup = document.getElementById('video-popup');
    const videoPlayer = document.getElementById('video-player');
    const closePopup = document.getElementById('close-popup');

    let channels = [];

    // Fetch data from the JSON file
    fetch('channels.json')
        .then(response => response.json())
        .then(data => {
            channels = data;
            populateCategoryDropdown(channels);
            populateChannels(channels);
        })
        .catch(error => console.error('Error loading channels data:', error));

    function populateChannels(channels) {
        channelGrid.innerHTML = '';
        channels.forEach(channel => {
            const card = document.createElement('div');
            card.className = 'channel-card';
            card.innerHTML = `
                <img src="${channel.channel_logo}" alt="${channel.channel_name}">
                <h2>${channel.channel_name}</h2>
                <button onclick="playVideo(${channel.channel_id})">Watch</button>
            `;
            channelGrid.appendChild(card);
        });
    }

    function populateCategoryDropdown(channels) {
        const genres = [...new Set(channels.map(channel => channel.channel_genre))];
        genres.forEach(genre => {
            const option = document.createElement('option');
            option.value = genre;
            option.textContent = genre;
            categoryDropdown.appendChild(option);
        });
    }

    function filterChannels() {
        const searchQuery = searchBar.value.toLowerCase();
        const selectedGenre = categoryDropdown.value;
        const filteredChannels = channels.filter(channel => 
            (channel.channel_name.toLowerCase().includes(searchQuery) || searchQuery === '') &&
            (channel.channel_genre === selectedGenre || selectedGenre === '')
        );
        populateChannels(filteredChannels);
    }

    window.playVideo = function(channelId) {
        videoPlayer.src = `https://tvtelugu.vercel.app/api/tplay.php?id=${channelId}`;
        videoPopup.style.display = 'flex';
    };

    searchBar.addEventListener('input', filterChannels);
    categoryDropdown.addEventListener('change', filterChannels);
    closePopup.addEventListener('click', () => {
        videoPopup.style.display = 'none';
    });
});
