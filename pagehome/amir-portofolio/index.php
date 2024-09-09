<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="header.css">
    <script src="https://kit.fontawesome.com/aa9a0b170b.js" crossorigin="anonymous"></script>
</head>
<style>
        <?php
        include 'header.css';
        ?>
    </style>
<body>
    <nav class="navbar">
        <div class="content">
            <div class="logo"><a href="#">AMIRULLAH</a></div>
            <ul class="menu-list">
                <div class="icon cancel-btn">
                    <i class="fa-solid fa-times"></i>
                </div>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Hobi dan cita cita</a></li>
                <li><a href="portofolio.php">Jenjang Pendidikan</a></li>
                <li><a href="blog.php">Prestasi</a></li>
                <li><a href="store.php">Kontak</a></li>
            </ul>
            <div class="icon menu-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
            
        </div>
    </nav>
    <script>
        const navbar = document.querySelector(".navbar");
        const menu = document.querySelector(".menu-list");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");

        menuBtn.onclick = ()=>{
            menu.classList.add("active");
            menuBtn.classList.add("hide");
        }
        cancelBtn.onclick = ()=>{
            menu.classList.remove("active");
            menuBtn.classList.remove("hide");
        }
        // window.onscroll = ()=>{
        //    this.scrollY > 20 ?  navbar.classList.add("sticky") :  navbar.classList.remove("sticky") ;
        // }
    </script>
</body>
</html>