<!DOCTYPE html>
<html>

<head>
    <title>Data Dosen</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        @page {
            size: landscape;
        }
    </style>
</head>

<body>
    <h1>Data Dosen</h1>
    <table border="1" id="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIDN</th>
                <th>Status</th>
                <th>Nama Dosen</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
            </tr>
        </thead>
        <tbody>
            <!-- Your PHP loop to populate the table -->
            <!-- Assuming $dosens is an array containing data -->
            <?php foreach ($dosens as $dosen): ?>
                <tr>
                    <td><?= $dosen->id ?></td>
                    <td><?= $dosen->nid ?></td>
                    <td><?= $dosen->status->status ?></td>
                    <td><?= $dosen->nama_dosen ?></td>
                    <td><?= $dosen->tempat_lahir ?></td>
                    <td><?= $dosen->tanggal_lahir ?></td>
                    <td><?= $dosen->jenis_kelamin ?></td>
                    <td><?= $dosen->alamat_dosen ?></td>
                    <td><?= $dosen->email_dosen ?></td>
                    <td><?= $dosen->nomor_telepon ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



    <script>
        document.getElementById('downloadPDF').addEventListener('click', function () {
            const doc = new jsPDF();
            doc.text(10, 10, 'Data Dosen');
            const table = document.getElementById('data-table');
            doc.autoTable({ html: table });

            // Get current date and time in Asia/Jakarta timezone
            const now = new Date();
            const options = {
                timeZone: 'Asia/Jakarta',
                year: 'numeric', month: 'numeric', day: 'numeric',
                hour: 'numeric', minute: 'numeric', second: 'numeric'
            };
            const timestamp = now.toLocaleString('en-US', options);

            // Add timestamp to PDF
            doc.text(`Downloaded at WIB time: ${timestamp}`, 10, doc.autoTable.previous.finalY + 10);

            // Save PDF
            doc.save('data_dosen.pdf');
        });
    </script>
</body>

</html>
