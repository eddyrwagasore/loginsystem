    <?php

    require_once('initialize.php');

    // require_login();

    $admin_set = find_all_admins();

    echo display_errors($errors);
    ?>
    <html>
        <head>
        <script src="../assets/sweetalert2/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="../assets/sweetalert2/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/table.css">
        <style>
            .dnone{
                display: none;
            }
            .imgc{
            width: 60px;
            display:inline-block;
            border: 1px solid;
        height: 60px;
            overflow: hidden;
            border-radius: 50%;
        }
            
        </style>
        </head>
        <body>
            <div style="position:absolute; right:100px;">
                <div class='imgc'><img src="../assets/images/theo.jpg" style="width:100%; "></div><span style="font-weight:bold; color:#fff;">User : <?php echo $_SESSION['username'];?></span>
            </div>
            <p ><a href="logout.php"> <button class="bg-warning">Logout</button></a></p>
            <center><div class="content">
                <div class="container">
                    <h2 class="mb-5">Table #6</h2>
                    <div class="table-responsive">

                        <table class="table table-striped custom-table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="">
                                <?php while($admin = mysqli_fetch_assoc($admin_set)) { ?>
                                    <tr scope="row" class="<?php echo "Row_".htmlspecialchars($admin['id']);?>">
                                    <td>
                                    <?php echo htmlspecialchars($admin['id']); ?>
                                </td>
                                <td>
                                    <a href="#"><?php echo htmlspecialchars($admin['first_name']); ?></a>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($admin['last_name']); ?>
                                    <small class="d-block">SmallDesc</small>
                                </td>
                                <td>  <a href="#"><?php echo htmlspecialchars($admin['email']); ?> </a></td>
                                <td><?php echo htmlspecialchars($admin['username']); ?></td>
                                <td>
                                <button class="btn-danger delete badge " value="<?php echo htmlspecialchars($admin['id']); ?>">Delete</button>
                                </td>
                                </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>


                </div>

            </div></center>
            <script>
            function delete_row(id){

                        Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        position: 'top-end',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            // Swal.fire(
                            // 'Deleted!',
                            // 'Your file has been deleted.',
                            // 'success'
                            // )
                        let action="delete_admin.php";
                        var parent = document.querySelector(".Row_"+id);
                        console.log("Parent is: "+parent)
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', action, true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                        xhr.onreadystatechange = function () {
                        if(xhr.readyState == 4 && xhr.status == 200) {
                            let result = xhr.responseText;
                            console.log('Result: ' + result);
                            let json = JSON.parse(result);
                            if(json.hasOwnProperty('errors') && json.errors.length > 0) {
                                Swal.fire(
                                'Eroor!',
                                'Please Try Again Later.',
                                'error'
                                )
                            } else {
                                parent.classList.add("dnone");

                                Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Record Deleted Successfully',
                            showConfirmButton: false,
                            timer: 1500
                            });     
                            
                        }
                        }
                        };
                        xhr.send("id=" + id);
                        }
                        })
            }
            
        var btn_delete=document.querySelectorAll("body table .delete");
            for(i=0; i < btn_delete.length; i++) {
            let button = btn_delete[i];
            let btn_value=button.value;
            button.addEventListener("click",function(){ delete_row(btn_value);}, false);
            }
    </script>                     

            </body>
        
            </html>

            <?php
            mysqli_free_result($admin_set);
            ?>

