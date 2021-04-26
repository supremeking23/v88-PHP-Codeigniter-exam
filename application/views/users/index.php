<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Codeigniter Exam</title>
  </head>
  <body>

    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-primary">
        <span class="navbar-brand mb-0 h1">Users</span>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>All Users</h2>
            </div>
        </div>
        
        <div class="row mt-2">
            <div class="col-md-12">
                <table class="table">
                    <thead class="bg-primary text-white">
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Country</th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach($users as $user):?>
                        <tr>
                            <th scope="row"><?= $user["full_name"]?></th>
                            <td><?= $user["age"]?></td>
                            <td><?= $user["gender"]?></td>
                            <td><?= $user["country"]?></td>
                        </tr>
<?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <form action="<?= base_url(); ?>users/retrieve_more_users_process" method="POST">
                    <input type="submit" class="btn btn-primary btn-block" value="Show More">
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


  </body>
</html>