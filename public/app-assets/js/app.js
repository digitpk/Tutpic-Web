//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording

jQuery.noConflict();
// shim for AudioContext when it's not avb.
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record
//recordButton



//add events to those 2 buttons
// jQuery('#recordButton')
//     .keyup(startRecording())
//     .keypress(stopRecording())

jQuery("#recordButton").keyup(function(event) {
    if (event.which == 13) {
        startRecord()
    }
    stopRecord()
})


var flag = true;

function startRecord() {
    var constraints = {
        audio: true,
        video: false
    }

	console.log("recording start");

	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

		audioContext = new AudioContext();

		//update the format
		//document.getElementById("formats").innerHTML="Format: 1 channel pcm @ "+audioContext.sampleRate/1000+"kHz";

		gumStream = stream;

		/* use the stream */
		input = audioContext.createMediaStreamSource(stream);

		rec = new Recorder(input,{numChannels:1})

		rec.record()

		console.log("Recording started");


	}).catch(function(err) {
	  	//enable the record button if getUserMedia() fails
    	recordButton.disabled = false;

	});
}

// var xTriggered = 0;
// $( "#recordButton" ).keyup(function( event ) {
//     xTriggered++;
//     event.preventDefault();
//
//     startRecording()
//     $.print( event );
// }).keydown(function( event ) {
//     if ( event.which == 13 ) {
//         event.preventDefault();
//         stopRecording()
//     }
// });





function stopRecord() {
	console.log("stopButton clicked");

    //tell the recorder to stop the recording
    rec.stop(); //stop microphone access
    gumStream.getAudioTracks()[0].stop();
    //create the wav blob and pass it on to createDownloadLink
    rec.exportWAV(createDownloadLink);

}

function createDownloadLink(blob) {

	var url = URL.createObjectURL(blob);
	var au = document.createElement('audio');


	//name of .wav file to use during upload and download (without extendion)
	var filename = new Date().toISOString();

	//add controls to the <audio> element
	au.controls = true;
	au.src = url;

	//save to disk link
	link.href = url;
	link.download = filename+".wav";
	link.innerHTML = "Save to disk";

	//add the new audio element to li
	li.appendChild(au);

	//add the filename to the li
	li.appendChild(document.createTextNode(filename+".wav "))

	//add the save to disk link to li
	li.appendChild(link);

	//upload link
	var upload = document.createElement('a');
	upload.href="#";
	upload.innerHTML = "Upload";
	upload.addEventListener("click", function(event){
		  var xhr=new XMLHttpRequest();
		  xhr.onload=function(e) {
		      if(this.readyState === 4) {
		          console.log("Server returned: ",e.target.responseText);
		      }
		  };
		  var fd=new FormData();
		  fd.append("audio_data",blob, filename);
		  xhr.open("POST","upload.php",true);
		  xhr.send(fd);
	})
	li.appendChild(document.createTextNode (" "))//add a space in between
	li.appendChild(upload)//add the upload link to li

	//add the li element to the ol
	recordingsList.appendChild(li);
}
