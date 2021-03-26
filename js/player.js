document.addEventListener("DOMContentLoaded", function() { startplayer(); }, false);
var player;
var startButton;
var pauseButton;
var i = 0;
var oldValue = 100;
var files1Ids = [1001, 1002, 1003, 1004, 1005, 1006, 1007, 1008];
var files1 = {
    1001: {
        src: "/media/audio/b/i/billie_eilish_bad_guy.mp3",
        image: "/media/image/billie.jpg",
        title: "Bad Guy",
        singer: "Billie Eilish",
        album: "When we all fall asleep, where do we",
        year: "",
    },
    1002: {
        src: "/media/audio/t/w/twenty_one_pilots_chlorine.mp3",
        image: "/media/image/t/w/Twenty_One_Pilots_Trench.png",
        title: "Chlorine",
        singer: "Twenty One Pilots",
        album: "Trench",
        year: "2018",
    },
    1003: {
        src: "/media/audio/m/a/maroon_5_moves_like_jagger.mp3",
        image: "/media/image/m/a/maroon_5_moves_like_jagger.jpg",
        title: "Mover Like Jagger",
        singer: "Maroon 5",
        album: "Hands All Over",
        year: "2010",
    },
    1004: {
        src: "/media/audio/n/i/niletto_lyubimka",
        image: "/media/image/n/i/niletto_lyubimka.jpg",
        title: "Любимка",
        singer: "Niletto",
        year: "2019",
    },
    1005: {
        src: "/media/audio/p/h/pharrell_williams_freedom.mp3",
        image: "/media/image/f/r/Freedom_by_Pharrell_Williams.png",
        title: "Freedom",
        singer: "Pharrell Williams",
        year: "2015",
    },
    1006: {
        src: "/media/audio/j/o/john_newman_love_me_again.mp3",
        image: "/media/image/j/o/john_newman_love_me_again.jpg",
        title: "Love Me Again",
        singer: "John Newman",
        album: "Tribute",
        year: "2013",
    },
    1007: {
        src: "/media/audio/i/m/imagine_dragons_beliver.mp3",
        image: "/media/image/i/m/imagine_dragons_evolve.jpeg",
        title: "Believer",
        singer: "Imagine Dragons",
        album: "Evolve",
        year: "2018",
    },
    1008: {
        src: "/media/audio/t/w/twenty_one_pilotes_the_judge.mp3",
        image: "/media/image/t/w/Twenty_One_Pilots_Trench.png",
        title: "The Judge",
        singer: "Twenty One Pilots",
        album: "Trench",
        year: "2018",
    }
};
var files = [
    '/media/audio/QFq2hf9hQF@ks.mp3',
    '/media/audio/hwehrh32w323.mp3',
    '/media/audio/gwfwegqwqw.mp3'
];

function changePlaylist() {
    let audioPlaylistElement = document.getElementById("playlist_items");
    let content = "";
    for (let inc = 0; inc < files1Ids.length; inc++) {
        let currentAddSong = files1[files1Ids[inc]];
        content += '<div class="playlist_item song_item_'+ files1Ids[inc] +'" id="'+ files1Ids[inc] +'">' +
            '<div class="song_poster" onclick="play_aud_id('+inc+')">' +
            '<img src="'+ currentAddSong.image +'" alt="Poster" />' +
            '<div class="play_playlist">' +
            '<div class="play_button">' +
            '<input type="image" src="/media/image/p/l/play.PNG" id="play_button">' +
            '</div></div></div>' +
            '<div class="song_info">' +
            '<div class="song_title">'+ currentAddSong.title + '</div>' +
            '<div class="singer"><a href="#">'+ currentAddSong.singer + '</a></div></div></div>';
    }

    audioPlaylistElement.innerHTML = content;
}

function setPlayerMainSong() {
    let currentSong = files1[files1Ids[i]];
    let content = "";
    content += '<div class="center_song_block_poster">' +
        '<img src="'+currentSong.image+'" alt="Poster" />' +
        '</div>' +
        '<div class="center_song_block_info">' +
        '<div class="center_song_block_song_name">' + currentSong.title + '</div>' +
        '<div class="center_song_block_artist"><a href="#">' + currentSong.singer + '</a></div>' +
        '<div class="center_song_block_year">' + currentSong.year + '</div>';

    if (currentSong.album !== null && currentSong.album !== '' && currentSong.album !== undefined) {
        content += '<div class="center_song_block_album">Album: ' + currentSong.album + '</div>';
    }
    content += "</div>";
    document.getElementById("center_song_block").innerHTML = content;
}

function startplayer()
{
    changePlaylist();
    setPlayerMainSong();
    startButton = document.getElementById("play_music_button");
    pauseButton = document.getElementById("pause_music_button");
    player = document.getElementById('music_player');
    player.controls = false;
    player.src = files1[files1Ids[i]].src;
    $('.playlist_item').removeClass("active");
    document.getElementById("" + files1Ids[i]).classList.add("active");
    player.addEventListener('ended', next, false);
    startButton.hidden = true;
    pauseButton.hidden = false;

    player.addEventListener('loadedmetadata', function() {
        document.getElementById("music_fill_time").innerHTML = secondsToTime(player.duration);
    });

    player.addEventListener('timeupdate', function() {
        document.getElementById("aud_change_time").value = player.currentTime/player.duration;
        document.getElementById("music_current_time").innerHTML = secondsToTime(player.currentTime);
    });
}

function secondsToTime(time) {
    let hours = time/3600;
    time %= 3600;
    let minutes = Math.trunc(time/60);
    let audioTime = "";
    let seconds = 0;

    if (hours >= 1) {
        audioTime += Math.trunc(hours) + ":"
    }

    if (minutes < 10 && hours >= 1) {
        minutes = "0" + minutes;
    }

    if (time % 60 < 10) {
        seconds = "0" + Math.trunc(time % 60);
    } else {
        seconds = Math.trunc(time % 60);
    }

    audioTime += minutes + ":" + seconds;

    return audioTime;
}

function sound_aud() {
    let audioVolumeElement = document.getElementById("change_vol");
    if (player.volume > 0) {
        oldValue = player.volume;
        audioVolumeElement.value = 0;
        player.volume = 0;
    } else {
        audioVolumeElement.value = oldValue;
        player.volume = oldValue;
    }
}

function repeat_aud()
{
    player.loop = player.loop !== true;


    var repeat_music = document.getElementById("repeat_music");

    if (player.loop === true) {
        repeat_music.style.opacity = 1;
    } else {
        repeat_music.style.opacity = 0.4;
    }
}

function play_aud_id(increment_id) {
    i = increment_id;
    setPlayerMainSong();
    player.src = files1[files1Ids[i]].src;
    $('.playlist_item').removeClass("active");
    document.getElementById("" + files1Ids[i]).classList.add("active");
    startButton.hidden = true;
    pauseButton.hidden = false;
    play_aud();
}

function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

function mix_aud() {
    shuffle(files1Ids)
    changePlaylist();
    document.getElementById("" + files1Ids[i]).classList.add("active");
}

function play_aud()
{
    startButton.hidden = true;
    pauseButton.hidden = false;
    player.play();
}
function pause_aud()
{
    startButton.hidden = false;
    pauseButton.hidden = true;
    player.pause();
}

function change_vol()
{
    player.volume=document.getElementById("change_vol").value;
}

function change_time() {
    player.currentTime = document.getElementById("aud_change_time").value * player.duration;
}

// function for moving to next audio file
function next() {
    // Check for last audio file in the playlist
    if (i === files1Ids.length - 1) {
        i = 0;
    } else {
        i++;
    }

    setPlayerMainSong();
    // Change the audio element source
    player.src = files1[files1Ids[i]].src;
    $('.playlist_item').removeClass("active");
    document.getElementById("" + files1Ids[i]).classList.add("active");
    startButton.hidden = true;
    pauseButton.hidden = false;
    play_aud()
}

// function for moving to next audio file
function previous() {
    // Check for last audio file in the playlist
    if (i === 0) {
        i = files1Ids.length - 1;
    } else {
        i--;
    }

    setPlayerMainSong();
    // Change the audio element source
    player.src = files1[files1Ids[i]].src;
    $('.playlist_item').removeClass("active");
    document.getElementById("" + files1Ids[i]).classList.add("active");
    startButton.hidden = true;
    pauseButton.hidden = false;
    play_aud()
}




