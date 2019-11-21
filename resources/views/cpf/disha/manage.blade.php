<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PDFTron</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src='/lib/webviewer.min.js'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        .app {
            width: 100vw;
            height: 100vh;
            display: flex;
        }
        .sidebar {
            width: 270px;
            height: 100vh;
        }
        .content {
            width: 100%;
        }
        #viewer {
            height: 100vh;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
            height: 100%;
            overflow: auto;
            z-index: 99;
        }

        .content {
            width: 100%;
        }

    </style>

</head>
<body style="margin:0">

    <div id="app"></div>

    <div class="app">
        <div class="sidebar shadow">
            <div class="p-4">
                <h5 class="mt-2">Rotate</h5>
                <div style="display:flex">
                    <input type="text" class="form-control mr-1" placeholder="Page No" id="pageno_rotate" value="1">
                    <button class="btn btn-sm btn-outline-primary mr-1" id="page_rotate_ccw">
                        <i data-feather="rotate-ccw"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-primary" id="page_rotate_cw">
                        <i data-feather="rotate-cw"></i>
                    </button>
                </div>

                <h5 class="mt-4">Delete</h5>
                <div style="display:flex">
                    <input type="text" class="form-control mr-2" placeholder="Page No" id="pageno_delete" value="1">
                    <button class="btn btn-sm btn-outline-danger" id="page_delete" >
                        <i data-feather="trash"></i>
                    </button>
                </div>
                
                <button class="btn btn-primary mt-4 w-100" id="save">Finish Editing</button>

            </div>
        </div>
        <div class="content">
            <div id='viewer'></div>
        </div>
    </div>
    
    <script>

    var viewerElement = document.getElementById('viewer');

    var myWebViewer = new PDFTron.WebViewer({
        path: '/lib',
        //l: 'demo:h_martoliya@ongc.co.in:75b57e3d01b1a88d02ba51aa6f5dd35310830fc307b1c812f0',
        l: 'OIL AND NATURAL GAS CORPORATION:ENTERP:ONGC Paperless Meetings::B+:AMS(20200620):4785AA300427080A3360B13AC982537820612FCD7EE3F5B21ED5DEC6DF95D377D969BEF5C7',
        initialDoc: "/storage/{{ $agenda->merged_url }}", 
    }, viewerElement);

    viewerElement.addEventListener('ready', function() {
        var viewerInstance = myWebViewer.getInstance(); // instance is ready here
        viewerInstance.disableElement('menuButton');
        viewerInstance.disablePrint();
        // viewerInstance.setHeaderItems(function(header) {
        //     header.push({
        //     type: 'actionButton',
        //     img: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 12v7H5v-7H3v7c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-7h-2zm-6 .67l2.59-2.58L17 11.5l-5 5-5-5 1.41-1.41L11 12.67V3h2z"></path><path fill="none" d="M0 0h24v24H0z"></path></svg>',
        //         onClick: function() {
        //             window.open("/storage/{{ $agenda->merged_url }}", '_blank');
        //         }
        //     });
        // });

    });

    viewerElement.addEventListener('documentLoaded', function() {   
        var docViewer = myWebViewer.getInstance().docViewer;
        var doc = docViewer.getDocument();
        var rotation = viewerElement.querySelector('iframe').contentWindow.CoreControls.PageRotation;

        $('#save').click(function(){
            store();
        });

        $('#page_delete').click(function(){
            var page = Number( $("#pageno_delete").val() );
            doc.removePages([ page ]).then(function(pagesArray) {
                docViewer.getPageCount();
            });
        });

        $("#page_rotate_cw").click(function(){
            var page = Number($("#pageno_rotate").val());
            doc.rotatePages( [ page ], rotation.e_90 ).then(function(pagesArray) {
                console.log(docViewer.getCompleteRotation(1));
            });
        });

        $("#page_rotate_ccw").click(function(){
            // docViewer.rotateCounterClockwise( $("#pageno_rotate").val() );
            var page = Number($("#pageno_rotate").val());
            doc.rotatePages( [ page ], rotation.e_270 ).then(function(pagesArray) {
                console.log(docViewer.getCompleteRotation(1));
            });
        });

        function store() {

            doc.getFileData().then(function(data) {
                var arr = new Uint8Array(data);
                var blob = new Blob([arr], { type: 'application/pdf' });
                
                let formData = new FormData()
                formData.append('name', 'app.pdf')
                formData.append('file', blob )

                let config = {
                    header : {
                        'Content-Type' : 'multipart/form-data'
                    }
                }

                axios.post( "/ec/disha/{{ $agenda->id }}/upload" , formData, config).then(response => {
                    swal('Edit Successful', 'Edited file saved in the server', 'success' )
                    .then((value) => {
                        window.location.href = "/ec/disha/{{ $agenda->id }}/create";
                    });
                }).catch(error => {
                    swal('Edit Failed', 'Server thrown 500 error', 'error' );
                });

            });
        }
        
    });

    </script>

    <script>
        feather.replace()
    </script>
    
</body>
</html>