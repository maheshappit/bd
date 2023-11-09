<head>
    <style>
        #topRightButton {
            /* Adjust the right position as needed for spacing from the right */
            position: absolute;
            top: 74px;
            right: 70px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 50%;
            height: 20%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        .upload-modal-content {
            background-color: #fff;
            position: absolute;
            top: 20%;
            left: 50%;
            width: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        


    </style>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>


<div class="container">
    <button class="btn btn-success" id="topRightButton">Upload</button>
</div>

<div id="myModal" class="modal">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card upload-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    File Upload
                    <button type="button" class="close" aria-label="Close" onclick="closeCard()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                <form action="{{ route('upload') }}"  method="POST" enctype="multipart/form-data">      
                    @csrf                  <div class="form-group">
                            <label for="file">Choose a file:</label>
                            <input type="file" class="form-control-file @error('file') is-invalid @enderror" accept=".csv,.xlsx" id="file" name="file" >
                        </div>
                        <button type="submit" class="btn btn-primary" type="submit">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



    
    
</div>



<script>
    const topRightButton = document.getElementById("topRightButton");
    const modal = document.getElementById("myModal");
    const closeModal = document.querySelector(".close");

    topRightButton.addEventListener("click", function() {
        modal.style.display = "block";
    });

    closeModal.addEventListener("click", function() {
        modal.style.display = "none";
    });

    window.addEventListener("click", function(e) {
        if (e.target == modal) {
            modal.style.display = "none";
        }
    });

    const uploadFormElement = document.getElementById("uploadForm");
    uploadFormElement.addEventListener("submit", function(e) {
        e.preventDefault();
        // Handle the form submission here or close the modal
        // modal.style.display = "none";
    });
</script>

<!-- <script>
    $(document).ready(function () {
        $('#uploadForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ route('upload') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        $('#response').html(response.message);
                    } else {
                        $('#response').html('File upload failed.');
                    }
                }
            });
        });
    });
</script> -->