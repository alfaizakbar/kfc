<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $searchDate = $_POST['search_date'];

    $sql = "SELECT * FROM user WHERE DATE(tanggal_tambah) = '$searchDate'";
    $result = $conn->query($sql);

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    // Default query without search
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

$adminNamalengkap = isset($_SESSION['admin_namalengkap']) ? $_SESSION['admin_namalengkap'] : '';

$conn->close();
?>

<?php include 'navbar.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
          <h1>Dashboard</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item ">Data User</li>
              <li class="breadcrumb-item active ">Harian</li>
              
            </ol>
          </nav>
        </div><!-- End Page Title -->
        <hr>
        <div class="container mb-5 mt-4">
        <div class="row justify-content-start">
            <div class="col-md-4">
                <form method="post" class="form-inline">
                    <div class="form-group d-flex mb-4">
                        <label for="search_date" class="mr-2 w-100 " style="margin-bottom: -30px;">Search by Date:</label>
                        <input type="date" name="search_date" id="search_date" class="form-control">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>  
                    </div>
                </form>
            </div>
        </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data user </h5>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable table-responsive">
                                <thead>
                                    <tr>
                                        <th>UserID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat</th>
                                        <!-- <th>Tanggal Registrasi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Menampilkan data pengguna ke dalam tabel
                                    $i = 1;
                                    foreach ($users as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $row["username"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["namalengkap"] . "</td>";
                                        echo "<td>" . $row["alamat"] . "</td>";
                                        // echo "<td>" . $row["tanggal_tambah"] . "</td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
              <!-- Your existing HTML content -->

              <div class="row mt-3">
            <div class="col-md-12 text-right">
                <button class="btn btn-success" onclick="printData()">Cetak Data</button>
            </div>
            <script>
        function printData() {
            window.print();
        }
    </script>
        </div>

<!-- <script>
    function exportToPDF() {
        // Post the form data to the generate_pdf.php script
        var form = document.createElement('form');
        form.method = 'post';
        form.action = 'generate_pdf.php';
        
        // Add the search_date parameter if needed
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'search_date';
        input.value = document.getElementById('search_date').value; // Adjust the element ID if needed
        form.appendChild(input);
        
        document.body.appendChild(form);
        form.submit();
        document.body.removeChild(form);
    }
</script> -->

<!-- Your existing scripts and footer content -->


   
</div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>AMIRULLAH</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="path/to/html2pdf.bundle.js"></script>
<!-- jspdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<!-- html2canvas -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<!-- <script>
    function exportToPDF() {
        var element = document.getElementById('main'); // ID of the element to be converted

        // Use html2canvas to capture the content as an image
        html2canvas(element).then(function(canvas) {
            var imgData = canvas.toDataURL('image/png');

            // Initialize jsPDF
            var pdf = new jsPDF();
            
            // Add the captured image to the PDF
            pdf.addImage(imgData, 'PNG', 0, 0);

            // Save the PDF
            pdf.save('document.pdf');
        });
    }
</script> -->


 
