<?php
$isEditMode = isset($data_to_edit);
$formAction = $isEditMode ? 'index.php?controller=publication&action=update' : 'index.php?controller=publication&action=store';
?>

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title"><?php echo $isEditMode ? 'Edit Publikasi' : 'Tambah Publikasi Baru'; ?></h3>
    </div>
    <div class="card-body">
        <form action="<?php echo $formAction; ?>" method="POST">
            
            <?php if ($isEditMode): ?>
                <input type="hidden" name="id" value="<?php echo $data_to_edit['id']; ?>">
            <?php endif; ?>
            
            <div class="mb-3">
                <label for="title" class="form-label">Judul Publikasi</label>
                <textarea class="form-control" id="title" name="title" rows="3" required><?php echo $isEditMode ? htmlspecialchars($data_to_edit['title']) : ''; ?></textarea>
            </div>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="journal_name" class="form-label">Nama Jurnal</label>
                        <input type="text" class="form-control" id="journal_name" name="journal_name" value="<?php echo $isEditMode ? htmlspecialchars($data_to_edit['journal_name']) : ''; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="publication_year" class="form-label">Tahun</label>
                        <input type="number" class="form-control" id="publication_year" name="publication_year" min="1900" max="2099" step="1" value="<?php echo $isEditMode ? htmlspecialchars($data_to_edit['publication_year']) : ''; ?>" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="lecturer_id" class="form-label">Penulis (Dosen)</label>
                <select name="lecturer_id" id="lecturer_id" class="form-select" required>
                    <option value="">-- Pilih Dosen --</option>
                    <?php foreach ($lecturers as $lecturer): ?>
                        <option value="<?php echo $lecturer['id']; ?>" <?php echo ($isEditMode && $lecturer['id'] == $data_to_edit['lecturer_id']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($lecturer['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary"><?php echo $isEditMode ? 'Update' : 'Simpan'; ?></button>
            <?php if ($isEditMode): ?>
                <a href="index.php?controller=publication" class="btn btn-secondary">Batal</a>
            <?php endif; ?>
        </form>
    </div>
</div>

<hr class="my-4">

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Daftar Publikasi</h3>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Jurnal</th>
                    <th>Tahun</th>
                    <th>Penulis (Dosen)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($data_list as $row): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['journal_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['publication_year']); ?></td>
                    <td><?php echo htmlspecialchars($row['lecturer_name'] ?? 'N/A'); ?></td>
                    <td>
                        <a href="index.php?controller=publication&edit_id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?controller=publication&action=delete&id=<?php echo $row['id']; ?>" 
                           onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" 
                           class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>