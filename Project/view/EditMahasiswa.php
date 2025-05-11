<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Data Mahasiswa</h2>
    <form action="index.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="<?= $data['nim'] ?>" required>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat" class="form-control" value="<?= $data['tempat'] ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tl" class="form-control" value="<?= $data['tl'] ?>" required>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
                <option value="Laki-Laki" <?= $data['gender'] == 'Laki-Laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $data['gender'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>">
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input type="text" name="telp" class="form-control" value="<?= $data['telp'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
