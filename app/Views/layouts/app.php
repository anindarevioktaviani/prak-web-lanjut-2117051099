<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"> 
    <title>
        <?php $title = "title"; ?>
    </title>

    <style>
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        body {
            font-family: Arial, sans-serif;
            /* background-image: url('assets/img/bg1.jpg'); */
            background-image: url(/assets/img/bgweb.jpg);
            background-size: cover; /* Menyesuaikan ukuran gambar dengan jendela browser */
            background-position: center; /* Pusatkan gambar di tengah */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .custom-table th, .custom-table td {
            padding: 8px 12px;
            text-align: left;
            border-bottom: 2px solid #ccc;
            
        }

        .custom-button {
            padding: 6px 12px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-right: 5px;
            border-radius: 5px;
        }

        .custom-button:hover {
            background-color: #0056b3;
        }

        .container-box {
            background-color:pink; 
            border: 2px solid #007BFF;
            padding: auto;
            width: auto;
            margin: 0 auto;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            width: 60%;
        }


        .custom-button.detail-button {
            background-color: green;
            color: white;
        }

        .custom-button.edit-button {
            background-color: yellow;
            color: black;
        }

        .custom-button.delete-button {
            background-color: red;
            color: white;
        }

        .custom-button-add{
            color: white;
            margin-top: 8px;
        }

        .navbar {
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            z-index: 100; 
        }

    </style>
</head>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/user/">List User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kelas/">List Kelas</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="search_dataBuku.php" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
<body>

    <?= $this->renderSection('content') ?>
    <script>
        
    </script>
</body>
</html>