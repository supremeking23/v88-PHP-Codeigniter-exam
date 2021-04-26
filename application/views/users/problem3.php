<?php
$gender = $this->session->userdata("gender");
$country_session =  (!is_null($this->session->has_userdata("country"))? $this->session->userdata("country"): "");

// var_dump( $this->session->userdata());
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Codeigniter Exam</title>

    <style>
        label{
            font-size:1.2rem;
            margin-right:10px
        }

        label input[type="checkbox"]{
            margin-right:10px;
            transform: scale(2);
        }

        select.form-control{
            display: inline-block;
            width: auto;
            height: calc(1.5em + .75rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.user-list').html(`<tr><td colspan="5" style="text-align:center"><img src='<?= base_url()?>assets/img/loading.gif'></td></tr>`);
            $.get(`users/users_json`,function(response){
                let html = ``;
                for(let i = 0; i < response.users.length; i++){
                    console.log(response.users[i].full_name);
                    html += `<tr>`;
                    html += `   <td>${response.users[i].full_name}</td>`;
                    html += `   <td>${response.users[i].age}</td>`;
                    html += `   <td>${response.users[i].gender}</td>`;
                    html += `   <td>${response.users[i].country}</td>`;
                    html += `</tr>`;
                }
                $(".user-list").html(html);
                $(".total-count").html(response.count.total_count);
                console.log(`total ${response.count.total_count}`);
            },'json');

            $(this).on("change","#countries",function(){
                
                let serialize = $('form').serialize();
                // console.log(serialize);
                $('.user-list').html(`<tr><td colspan="5" style="text-align:center"><img src='<?= base_url()?>assets/img/loading.gif'></td></tr>`);
                $.post($(`form`).attr('action'),serialize,function(response){
                    let html = ``;
                    for(let i = 0; i < response.users.length; i++){
                        console.log(response.users[i].full_name);
                        html += `<tr>`;
                        html += `   <td>${response.users[i].full_name}</td>`;
                        html += `   <td>${response.users[i].age}</td>`;
                        html += `   <td>${response.users[i].gender}</td>`;
                        html += `   <td>${response.users[i].country}</td>`;
                        html += `</tr>`;
                    }
                    $(".user-list").html(html);
                    console.log(`total ${response.count.total_count}`);
                    $(".total-count").html(response.count.total_count);
                },'json');
            });

            $(this).on('change','.gender',function(){
                // let checkbox = $('.gender').val();
                $('.user-list').html(`<tr><td colspan="5" style="text-align:center"><img src='<?= base_url()?>assets/img/loading.gif'></td></tr>`);
                let serialize = $('form').serialize();
                console.log(serialize);
                $.post($(`form`).attr('action'),serialize,function(response){
                    let html = ``;
                    for(let i = 0; i < response.users.length; i++){
                        console.log(response.users[i].full_name);
                        html += `<tr>`;
                        html += `   <td>${response.users[i].full_name}</td>`;
                        html += `   <td>${response.users[i].age}</td>`;
                        html += `   <td>${response.users[i].gender}</td>`;
                        html += `   <td>${response.users[i].country}</td>`;
                        html += `</tr>`;
                    }
                    $(".user-list").html(html);
                    console.log(`total ${response.count.total_count}`);
                    $(".total-count").html(response.count.total_count);
                },'json');
            })

        });
    </script>
  </head>
  <body>

    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-primary">
        <span class="navbar-brand mb-0 h1">Users</span>
    </nav>

    <div class="container mt-5">
        <div class="row">
           
        </div>
        <div class="row  mt-4">
            <div class="col-md-3">
                <h2>All Users: <span class="total-count">100</span></h2>
            </div>
            <div class="col-md-9">
            <!-- filter_user_by_gender  filter_user_by_country-->
                <form action="<?= base_url(); ?>users/ajax_filter" method="POST">
                   
                    <label for="female">
                        <input type="checkbox" name="gender[]" class="gender" value="F">Female
                    </label>
                    <label for="male">
                        <input type="checkbox" name="gender[]" class="gender"   value="M">Male
                    </label>

                    <label for="countries">
                        Show users in:
                        <select class="form-control" name="country" id="countries">
                            <option value="">All countries</option>
<?php foreach($countries as $country):?>
                            <option  <?= (($country_session == $country["country"] )? "selected" : "");?> value="<?= $country["country"]?>"><?= $country["country"]?> </option>
<?php endforeach;?>
                        </select>
                    </label>
                    
                </form>
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
                    <tbody class="user-list">

                    </tbody>
                </table>
            </div>
        </div>
       
    </div>

  </body>
</html>