$(function(){
    const $btnStartRecording = $('[data-action="start-recording"]');
    const $btnStopRecording = $('[data-action="stop-recording"]');
    const $btnDownloadVideo = $('[data-action="download-video"]');
    var ctx;
    var recorder;

    $btnStartRecording.on('click', function(){
        console.log('=-=-=-= Start Recording');
        const canvas = document.getElementById('cont-canvas');
        ctx = canvas.getContext('2d');

        const stream = canvas.captureStream();
        recorder = new MediaRecorder(
            stream,
            {
                mimeType: 'video/webm',
            }
        );

        //録画終了時に動画ファイルのダウンロードリンクを生成する処理
        recorder.ondataavailable = function(e) {
            console.log('--- recorder.ondataavailable():');
            var videoBlob = new Blob(
                [e.data],
                {
                    type: e.data.type,
                }
            );
            var blobUrl = window.URL.createObjectURL(videoBlob);
            $btnDownloadVideo.attr({
                download: 'video-file.webm',
                href: blobUrl,
            });
        }

        //録画開始
        recorder.start();
    });

    $btnStopRecording.on('click', function(){
        console.log('Stop Recording =-=-=-=');
        recorder.stop();
    });

    console.log('Standby OK.');
});
