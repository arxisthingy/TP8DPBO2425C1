<?php
// lecturer view
$isEditMode = isset($data_to_edit);
$formAction = $isEditMode ? 'index.php?controller=lecturer&action=update' : 'index.php?controller=lecturer&action=store';
?>

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title"><?php echo $isEditMode ? 'Edit Data Dosen' : 'Tambah Dosen Baru'; ?></h3>
    </div>
    <div class="card-body">
        <form action="<?php echo $formAction; ?>" method="POST">
            
            <?php if ($isEditMode): ?>
                <input type="hidden" name="id" value="<?php echo $data_to_edit['id']; ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $isEditMode ? htmlspecialchars($data_to_edit['name']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nidn" class="form-label">NIDN</label>
                <input type="text" class="form-control" id="nidn" name="nidn" value="<?php echo $isEditMode ? htmlspecialchars($data_to_edit['nidn']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $isEditMode ? htmlspecialchars($data_to_edit['phone']) : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="join_date" class="form-label">Tanggal Bergabung</label>
                <input type="date" class="form-control" id="join_date" name="join_date" value="<?php echo $isEditMode ? htmlspecialchars($data_to_edit['join_date']) : ''; ?>">
            </div>
            
            <button type="submit" class="btn btn-primary"><?php echo $isEditMode ? 'Update' : 'Simpan'; ?></button>
            <?php if ($isEditMode): ?>
                <a href="index.php?controller=lecturer" class="btn btn-secondary">Batal</a>
            <?php endif; ?>
        </form>
    </div>
</div>

<hr class="my-4">

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Daftar Dosen</h3>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIDN</th>
                    <th>Telepon</th>
                    <th>Tgl. Bergabung</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($data_list as $row): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['nidn']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['join_date']); ?></td>
                    <td>
                        <a href="index.php?controller=lecturer&edit_id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?controller=lecturer&action=delete&id=<?php echo $row['id']; ?>" 
                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" 
                           class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>