<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Electro Shop :: Administrative Panel</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Create Product</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="/products" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="container-fluid">
                    <form id="addForm" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" cols="30" rows="10" value="" class=" summernote"
                                                placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <h2 class="h5 mb-3"><b>Image</b></h2>
                                            <div id="" class="dropzone dz-clickable">
                                                <input type="file" name="image" id="image"
                                                    class=" form-control form-control-lg " value="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pb-5 pt-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
                            </div>
                        </div>
                    </form>
                    <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">


        </footer>

    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js"></script>
</body>

<script>
	// var addform = document.querySelector("#addForm");

	// addform.onsubmit = function(e){
    //     e.preventDefault();
		
	// 	const token = localStorage.getItem('api_token');
	// 	const title = document.querySelector("#title").value;
	// 	const description = document.querySelector("#description").value;
	// 	const image = document.querySelector("#image").value;

	// 	var formData = new FormData();
	// 	formData.append('title',title);
	// 	formData.append('description',description);
	// 	formData.append('image',image);

	// 	let response = await  fetch('/api/store', {
    //             method: 'POST',
	// 			body : formData
    //             headers: {
    //                 'Authorization': `Bearer ${token}`
    //             }
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log(data);
    //             // window.location.href = "/products";

    //         })


	// }


    document.addEventListener('DOMContentLoaded', function () {
        var addForm = document.querySelector("#addForm");

        addForm.onsubmit = async function (e) {
            e.preventDefault();

            const token = localStorage.getItem('api_token');
            const title = document.querySelector("#title").value;
            const description = document.querySelector("#description").value;
            const image = document.querySelector("#image").files[0]; // handle file input correctly

            // Prepare form data
            var formData = new FormData();
            formData.append('title', title);
            formData.append('description', description);
            formData.append('image', image);

            try {
                const response = await fetch('/api/store', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });

                if (!response.ok) {
                    throw new Error('Failed to submit form');
                }

                const data = await response.json();
                console.log(data);
                window.location.href = "/products";
            } catch (error) {
                console.error('Error:', error);
            }
        };
    });
</script>

</html>
