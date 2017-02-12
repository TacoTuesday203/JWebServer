function insertVideo() {
    var video_address = document.getElementById('address').value; 
    
    if (video_address == "") {
        document.getElementById('video').innerHTML = "<span id=invalid_id>Please enter a valid video ID!</span>";
        return;
    }
    
    document.getElementById('videoKill').innerHTML = "<button type=button id=kill onClick=killVideo()>X</button>";
    document.getElementById('video').innerHTML = "<iframe width=560 height=315 src=https://www.youtube.com/embed/" + video_address + " frameborder=0 allowfullscreen></iframe>";
}

function help() {
    window.open("help.html", "Help!", "width = 700, height = 500");
}

function killVideo() {
    document.getElementById('videoKill').innerHTML = "";
    document.getElementById('video').innerHTML = "";
}

/*function useBookmark() {
    var video_addressByBookmark = location.href;
    
    if (video_addressByBookmark.search("https://www.youtube.com/watch?v=") != -1) {
        document.write("<center><h1>FreeVideo Bookmark Feature</h1><iframe width=560 height=315 src=https://www.youtube.com/embed/" + video_addressByBookmark.replace("https://www.youtube.com/watch?v=", '') + " frameborder=0 allowfullscreen></iframe></center>");
    } else {
        document.write("<center><h1>Could not process video!</h1></center>");
    }
}*/