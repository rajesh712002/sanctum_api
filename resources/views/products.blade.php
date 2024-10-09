<!DOCTYPE html>
<html lang="en">


<head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

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

<body class="hold-transition sidebarmini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Products</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="/create-product" class="btn btn-primary">New Product</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="input-group input-group" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="ProductData">

                        </div>
                        <div class="card-footer clearfix">
                            <div class="col-sm-6 text-right">
                                <button type="submit" name="logoutBtn" class="btn btn-primary"
                                    id="logoutBtn">LogOut</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">


        </footer>

    </div>
    {{-- View Single Post Modal --}}
    <div class="modal fade" id="SingleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="SingleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="SingleModalLabel">Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                </div>
            </div>
        </div>
    </div>


    {{-- Update Single Post Modal --}}
    <div class="modal fade" id="UpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="UpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="UpdateModalLabel">Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="UpdateForm" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="postId" class="form-control" value="">
                        <b>Title</b><input type="text" id="postTitle" class="form-control" value="">
                        <b>Description</b>
                        <textarea id="postDescription" class="form-control" value=""></textarea>
                        <img id="showImage" width="150px"><br>
                        <b>image</b><input type="file" id="postImage" class="form-control" value=""
                            src="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Save Changes" class="btn btn-primary">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    document.querySelector("#logoutBtn").addEventListener('click', function(e) {
        e.preventDefault();
        const token = localStorage.getItem('api_token');

        fetch('/api/logout', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                window.location.href = "/log";

            })
    });

    // Show All Data
    function loadData() {
        const token = localStorage.getItem('api_token');

        fetch('/api/index', {
                method: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(response => response.json())
            .then(data => {
                // console.log(data.data.post);
                // window.location.href = "/log";
                var allpost = data.data.post;
                const ProductData = document.querySelector('#ProductData');

                var tabledata = `	<table class="table table-hover text-nowrap" border="2">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>

                                    <th>Action</th>
                                </tr>`;

                allpost.forEach(post => {
                    tabledata += `<tr>
											<td>${post.id}</td>
											<td>${post.title}</td>
											<td>${post.description}</td>
											<td>
												<img src="/uploads/${post.image}" width="150x" />
											</td>
											<td>
												
													<svg xmlns="http://www.w3.org/2000/svg" data-bs-post="${post.id}" data-bs-toggle="modal" data-bs-target="#SingleModal" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
													<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
													<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
													</svg>
												<br>
												
													<svg class="filament-link-icon w-4 h-4 mr-1" data-bs-post="${post.id}" data-bs-toggle="modal" data-bs-target="#UpdateModal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
														<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
													</svg>
												<br>
												
													<svg class="text-danger w-4 h-4 mr-1" onclick="deletePost(${post.id})" wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
														<path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
												  	</svg>
												
											</td>
										</tr>`
                });

                tabledata += `</table>`
                ProductData.innerHTML = tabledata;

            })
    }
    loadData();


    // Show Single Record
    var SingleModal = document.querySelector("#SingleModal");
    if (SingleModal) {
        SingleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const id = button.getAttribute('data-bs-post')
            const token = localStorage.getItem('api_token');

            fetch(`/api/show/${id}`, {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'contentType': 'application/json',

                    }
                })
                .then(response => response.json())
                .then(data => {
                    const post = data.data;
                    // console.log(post);
                    const modalBody = document.querySelector("#SingleModal .modal-body");
                    modalBody.innerHTML = "";

                    modalBody.innerHTML = `
						<b>Id</b> :  ${post.id}
						<br>
						<b>Title</b> :  ${post.title}
						<br>
						<b>Description</b> :  ${post.description}
						<br>
						<b>Image</b>:  <img src="/uploads/${post.image}" width="150x" />

						<br>
					`;

                })
        })
    }


    // Update Record
    var UpdateModal = document.querySelector("#UpdateModal");
    if (UpdateModal) {
        UpdateModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const id = button.getAttribute('data-bs-post')
            console.log(id);

            const token = localStorage.getItem('api_token');

            fetch(`/api/show/${id}`, {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',

                    }
                })
                .then(response => response.json())
                .then(data => {
                    const post = data.data;
                    console.log(post);
                    document.querySelector("#postId").value = post.id;
                    document.querySelector("#postTitle").value = post.title;
                    document.querySelector("#postDescription").value = post.description;
                    document.querySelector("#showImage").src = `/uploads/${post.image}`;


                    // const modalBody = document.querySelector("#UpdateModal .modal-body");

                })
        })
    }


    // UpdateModal
    document.addEventListener('DOMContentLoaded', function() {
        var UpdateForm = document.querySelector("#UpdateForm");

        UpdateForm.onsubmit = async function(e) {
            e.preventDefault();

            const token = localStorage.getItem('api_token');
            const postId = document.querySelector("#postId").value;
            const title = document.querySelector("#postTitle").value;
            const description = document.querySelector("#postDescription").value;

            var formData = new FormData();
            formData.append('id', postId);
            formData.append('title', title);
            formData.append('description', description);

            if (!document.querySelector("#postImage").files[0] == "") {
                const image = document.querySelector("#postImage").files[0];
                formData.append('image', image);
            }


            try {
                const response = await fetch(`/api/update/${postId}`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'X-HTTP-Method-Override': 'PUT'
                    }
                });

                if (!response.ok) {
                    throw new Error('Failed to submit form');
                }

                const data = await response.json();
                console.log(data);
                loadData();
                var modalInstance = bootstrap.Modal.getInstance(document.querySelector("#UpdateModal"));
                modalInstance.hide();
                // window.location.href = "/products";
            } catch (error) {
                console.error('Error:', error);
            }
        };
    });


    // Delete
    async function deletePost(postId) {
        const token = localStorage.getItem('api_token');

        try {
            const response = await fetch(`/api/destroy/${postId}`, {
                method: 'DELETE',
                headers: {
                    'Authorization': `Bearer ${token}`,
                }
            });

            if (!response.ok) {
                throw new Error('Failed to submit form');
            }

            const data = await response.json();
            console.log(data);
            loadData();
          
            // window.location.href = "/products";
        } catch (error) {
            console.error('Error:', error);
        }
    }
</script>

</html>
